<?php
session_start();
require_once 'pdo_connection.php';


if (!isset($_POST['email_registrado']) || empty($_POST['email_registrado'])) {
    $_SESSION['error_email'] = 'Por favor, ingresa tu email.';
    header('Location: crear_cuenta.php?formulario=recuperar_contraseña');
    exit();
}

$email_recuperacion = trim($_POST['email_registrado']);


if (!filter_var($email_recuperacion, FILTER_VALIDATE_EMAIL)) {
    $_SESSION['error_email'] = 'El formato del email no es válido.';
    header('Location: crear_cuenta.php?formulario=recuperar_contraseña');
    exit();
}

try {
    // Buscar si el email en bd
    $stmt = $pdo->prepare("SELECT * FROM usuarios WHERE email = :email");
    $stmt->bindParam(':email', $email_recuperacion, PDO::PARAM_STR);
    $stmt->execute();
    $usuarioExistente = $stmt->fetch(PDO::FETCH_ASSOC);

    // Si el email no existe
    if (!$usuarioExistente) {
        $_SESSION['error_email'] = 'Este email no está registrado en nuestro sistema.';
        header('Location: crear_cuenta.php?formulario=recuperar_contraseña');
        exit();
    }

    // limpieza tabla recupuerade contraseña
    $deleteOld = "DELETE FROM tokens_recuperacion WHERE email_recuperacion = :email";
    $stmtDelete = $pdo->prepare($deleteOld);
    $stmtDelete->bindParam(':email', $email_recuperacion, PDO::PARAM_STR);
    $stmtDelete->execute();

    // Generar nuevo token de recuperación
    $token_recuperacion = bin2hex(random_bytes(64));

    // Fecha de caducidad (2 horas desde ahora)
    $caducidad_recuperacion = new DateTime();
    $caducidad_recuperacion->add(new DateInterval('PT2H'));
    $caducidad_recuperacion = $caducidad_recuperacion->format('Y-m-d H:i:s');

    // Insertar nuevo token de recuperación
    $insert = "INSERT INTO tokens_recuperacion (email_recuperacion, token_recuperacion, caducidad_recuperacion) 
               VALUES (:email, :token, :caducidad)";
    $stmtInsert = $pdo->prepare($insert);
    $stmtInsert->bindParam(':email', $email_recuperacion, PDO::PARAM_STR);
    $stmtInsert->bindParam(':token', $token_recuperacion, PDO::PARAM_STR);
    $stmtInsert->bindParam(':caducidad', $caducidad_recuperacion, PDO::PARAM_STR);
    $stmtInsert->execute();

    // Preparar variables para el email
    $email = $email_recuperacion;
    $usuario = $usuarioExistente['usuario'];

    // Preparar el cuerpo del email de recuperación
    $body = '
    <!DOCTYPE html>
    <html lang="es">
    <head>
      <meta charset="UTF-8">
      <title>Recupera tu contraseña - Taskin</title>
      <style>
        body {
          font-family: "Segoe UI", Tahoma, Geneva, Verdana, sans-serif;
          background-color: #e0f7fa;
          margin: 0;
          padding: 0;
        }
        .container {
          max-width: 600px;
          margin: 40px auto;
          background-color: #ffffff;
          padding: 30px;
          border-radius: 10px;
          text-align: center;
          box-shadow: 0 2px 8px rgba(0,0,0,0.05);
        }
        img {
          width: 200px;
          margin-bottom: 20px;
        }
        h1 {
          color: #333;
          font-size: 24px;
        }
        p {
          color: #555;
          font-size: 16px;
          line-height: 1.6;
          margin: 20px 0;
        }
        .button {
          display: inline-block;
          background-color: #039be5;
          color: white;
          padding: 14px 24px;
          text-decoration: none;
          border-radius: 8px;
          font-weight: bold;
          font-size: 16px;
          margin-top: 20px;
        }
        .button:hover {
          background-color: #0277bd;
        }
        .footer {
          font-size: 12px;
          color: #999;
          margin-top: 30px;
        }
      </style>
    </head>
    <body>
      <div class="container">
        <img src="https://res.cloudinary.com/di5wkztgw/image/upload/v1748337655/Taskin_400_x_100_px_300_x_100_px_160_x_160_px_1_bbpqve.png" alt="Logo Taskin">
        <h1>Hola ' . htmlspecialchars($usuario) . '</h1>
        <h2>Recuperación de contraseña</h2>
        <p>Hemos recibido una solicitud para restablecer la contraseña de tu cuenta en <strong>Taskin</strong>.</p>
        <p>Haz clic en el siguiente botón para crear una nueva contraseña:</p>
        <a href="http://localhost:20000/verificar_token_recuperacion.php?token_recuperacion=' . $token_recuperacion . '" class="button">Restablecer contraseña</a>
        <p>Si tú no solicitaste este cambio, puedes ignorar este mensaje. Tu contraseña seguirá siendo la misma.</p>
        <p><small>Este enlace expirará en 2 horas por seguridad.</small></p>
        <div class="footer">© ' . date("Y") . ' Taskin. Todos los derechos reservados.</div>
      </div>
    </body>
    </html>';
    
    $subject = 'Recupera tu contraseña - Taskin';

    include './email_config.php';

    // Verificar si el email se envió correctamente
    if (!isset($email_error)) {
        $_SESSION['mensaje_exito'] = 'Te hemos enviado un enlace para restablecer tu contraseña. Revisa tu correo.';
        $_SESSION['email_usuario'] = $email_recuperacion;
        header('Location: crear_cuenta.php?formulario=revisar_correo');
    } else {
        // Si hubo error en el email, eliminar el token
        $deleteToken = $pdo->prepare("DELETE FROM tokens_recuperacion WHERE token_recuperacion = :token");
        $deleteToken->bindParam(':token', $token_recuperacion, PDO::PARAM_STR);
        $deleteToken->execute();

        $_SESSION['error_email'] = 'Error al enviar el correo. Inténtalo de nuevo.';
        header('Location: crear_cuenta.php?formulario=recuperar_contraseña');
    }
} catch (PDOException $e) {
    error_log("Error en procesar_recuperacion.php: " . $e->getMessage());
    $_SESSION['error_email'] = 'Error del sistema. Inténtalo más tarde.';
    header('Location: crear_cuenta.php?formulario=recuperar_contraseña');
    exit();
}
