<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);
echo "Inicio del archivo...<br>";

session_start();
echo "Sesión iniciada...<br>";

require_once 'pdo_connection.php';
echo "Conexión a BD incluida...<br>";

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
    echo "Procesando email: " . $email_recuperacion . "<br>";
    
    // Buscar si el email existe en BD
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

    echo "Usuario encontrado: " . $usuarioExistente['usuario'] . "<br>";

    // Limpiar tabla de recuperación de contraseña
    $deleteOld = "DELETE FROM tokens_recuperacion WHERE email_recuperacion = :email";
    $stmtDelete = $pdo->prepare($deleteOld);
    $stmtDelete->bindParam(':email', $email_recuperacion, PDO::PARAM_STR);
    $stmtDelete->execute();

    echo "Tokens antiguos eliminados<br>";

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

    echo "Token insertado en BD<br>";

    // Preparar variables para el email
    $email = $email_recuperacion;
    $usuario = $usuarioExistente['usuario'];

    // Email temporalmente deshabilitado para debug
    echo "Email que se enviaría a: " . $email_recuperacion . "<br>";
    echo "Token generado: " . substr($token_recuperacion, 0, 20) . "...<br>";

    // Simular envío exitoso
    $_SESSION['mensaje_exito'] = 'Token generado correctamente (email temporalmente deshabilitado)';
    $_SESSION['email_usuario'] = $email_recuperacion;
    
    echo "Redirigiendo...<br>";
    header('Location: crear_cuenta.php?formulario=revisar_correo');
    exit();

} catch (PDOException $e) {
    echo "Error PDO: " . $e->getMessage() . "<br>";
    error_log("Error en procesar_recuperacion.php: " . $e->getMessage());
    $_SESSION['error_email'] = 'Error del sistema. Inténtalo más tarde.';
    header('Location: crear_cuenta.php?formulario=recuperar_contraseña');
    exit();
} catch (Exception $e) {
    echo "Error general: " . $e->getMessage() . "<br>";
    $_SESSION['error_email'] = 'Error del sistema. Inténtalo más tarde.';
    header('Location: crear_cuenta.php?formulario=recuperar_contraseña');
    exit();
}
?>