<?php

session_start();

require_once 'pdo_connection.php';

$verificarUsuario = isset($_POST['usuario']) && $_POST['usuario'];
$verificarpassword = isset($_POST['password']) && $_POST['password'];
$verificarpassword2 = isset($_POST['password2']) && $_POST['password2'];

if(!$verificarUsuario || !$verificarpassword || !$verificarpassword2){
    $_SESSION['error_cuenta'] = true;
    header('Location: crear_cuenta.php');
    exit();
}


$usuario = trim($_POST['usuario']);
$password = trim($_POST['password']);
$password2 = trim($_POST['password2']);
$email = trim($_POST['email']);
$telefono = trim($_POST['telefono']);

if (empty($usuario) || empty($password) || empty($password2)) {
    $_SESSION['error_cuenta'] = true;
    header('Location: crear_cuenta.php');
    exit();
}

$usuario = htmlentities($usuario, ENT_QUOTES, 'UTF-8');
$password = htmlentities($password, ENT_QUOTES, 'UTF-8');
$password2 = htmlentities($password2, ENT_QUOTES, 'UTF-8');
$email = htmlentities($email, ENT_QUOTES, 'UTF-8');
$telefono = htmlentities($telefono, ENT_QUOTES, 'UTF-8');

if ($password !== $password2) {
    $_SESSION['error_cuenta'] = true;
    header('Location: crear_cuenta.php');
    exit();
}

$stmt = $pdo->prepare("SELECT * FROM usuarios WHERE usuario = :usuario"); 
$stmt->bindParam(':usuario', $usuario, PDO::PARAM_STR);
$stmt->execute();
$usuarioExistente = $stmt->fetch(PDO::FETCH_ASSOC);

if ($usuarioExistente) {
    $_SESSION['user_repe'] = true;
    header('Location: crear_cuenta.php');
    exit();
} 

// Encriptar la contraseña
$hash = password_hash($password, PASSWORD_DEFAULT);

$stmt = $pdo->prepare("SELECT * FROM usuarios WHERE email = :email");
$stmt->bindParam(':email', $email, PDO::PARAM_STR);
$stmt->execute();
$emailExistente = $stmt->fetch(PDO::FETCH_ASSOC);

if ($emailExistente) {
    $_SESSION['email_repe'] = true;
    header('Location: crear_cuenta.php');
    exit();
}

// Creacion de un token de 128 caracteres 
$token= bin2hex(random_bytes(64));


$caducidad = new DateTime();
$caducidad-> add(new DateInterval('PT2H'));
$caducidad = $caducidad->format('Y-m-d H:i:s');


$insert = "INSERT INTO temporal (usuario, password, email, telefono,token_registro, token_caducidad) VALUES (:usuario, :password, :email, :telefono,:token, :caducidad)";
$stmt = $pdo->prepare($insert);
$stmt->bindParam(':usuario', $usuario, PDO::PARAM_STR);
$stmt->bindParam(':password', $hash, PDO::PARAM_STR);
$stmt->bindParam(':email', $email, PDO::PARAM_STR);
$stmt->bindParam(':telefono', $telefono, PDO::PARAM_STR);
$stmt->bindParam(':token', $token, PDO::PARAM_STR);
$stmt->bindParam(':caducidad', $caducidad, PDO::PARAM_STR);

try {
    $stmt->execute();
    echo "Usuario temporal insertado correctamente<br>";
} catch (PDOException $e) {
    echo "Error al insertar usuario temporal: " . $e->getMessage();
    $_SESSION['error_cuenta'] = true;
    header('Location: crear_cuenta.php');
    exit();
}

// Preparar el cuerpo del email
$body = '
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Confirma tu correo - Taskin</title>
  <style>
    body {
      font-family: "Segoe UI", Tahoma, Geneva, Verdana, sans-serif;
      background-color: ##e0f7fa;
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
      background-color: #00c853;
      color: white;
      padding: 14px 24px;
      text-decoration: none;
      border-radius: 8px;
      font-weight: bold;
      font-size: 16px;
      margin-top: 20px;
    }
    .button:hover {
      background-color: #007b33;
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
    <h1>¡Hola ' . htmlspecialchars($usuario) . '!</h1>
    <h2>Confirma tu correo electrónico</h2>
    <p>Gracias por registrarte en <strong>Taskin</strong>. Solo falta un paso para comenzar a organizar tus tareas.</p>
    <p>Haz clic en el siguiente botón para verificar tu correo:</p>
    <a href="http://localhost:20000/registro.php?token=$token" class="button">Verificar correo</a>
    <p>Si no solicitaste esta cuenta, simplemente puedes ignorar este mensaje.</p>
    <p><small>Este enlace expirará en 2 horas por seguridad.</small></p>
    <div class="footer">© ' . date("Y") . ' Taskin. Todos los derechos reservados.</div>
  </div>
</body>
</html>
';

include './email_config.php';


if (!isset($email_error)) {
    $_SESSION['mensaje_exito'] = 'Te hemos enviado un correo de verificación. Por favor, revisa tu bandeja de entrada.';
    header('Location: login.php');
} else {
    // Si hubo error en el email, eliminar el registro temporal
    $deleteStmt = $pdo->prepare("DELETE FROM temporal WHERE token_registro = :token");
    $deleteStmt->bindParam(':token', $token, PDO::PARAM_STR);
    $deleteStmt->execute();
    
    $_SESSION['error_email'] = 'Error al enviar el correo de verificación. Inténtalo de nuevo.';
    header('Location: crear_cuenta.php');
}
?>