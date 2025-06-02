<?php
session_start();
require_once 'pdo_connection.php';

// Verificar que existe el token en la URL
if (!isset($_GET['token_recuperacion']) || empty($_GET['token_recuperacion'])) {
    $_SESSION['error_token'] = 'Token no válido o faltante.';
    header('Location: crear_cuenta.php?formulario=token_caducado');
    exit();
}

$token_recuperacion = trim($_GET['token_recuperacion']);

try {
    // Buscar el token en la base de datos
    $select = "SELECT * FROM tokens_recuperacion WHERE token_recuperacion = :token";
    $prep = $pdo->prepare($select);
    $prep->bindParam(':token', $token_recuperacion, PDO::PARAM_STR);
    $prep->execute();
    $tokenData = $prep->fetch(PDO::FETCH_ASSOC);

    // Si no existe el token
    if (!$tokenData) {
        $_SESSION['error_token'] = 'El token no existe o ya fue utilizado.';
        header('Location: crear_cuenta.php?formulario=token_caducado');
        exit();
    }

    // Verificar si el token ha caducado
    $ahora = new DateTime();
    $fechaCaducidad = new DateTime($tokenData['caducidad_recuperacion']);

    if ($fechaCaducidad < $ahora) {
        // Eliminar token caducado
        $deleteExpired = "DELETE FROM tokens_recuperacion WHERE token_recuperacion = :token";
        $prepDelete = $pdo->prepare($deleteExpired);
        $prepDelete->bindParam(':token', $token_recuperacion, PDO::PARAM_STR);
        $prepDelete->execute();
        
        $_SESSION['error_token'] = 'El token ha caducado. Solicita una nueva recuperación.';
        header('Location: crear_cuenta.php?formulario=token_caducado');
        exit();
    }

    // Si el token es válido, guardar en sesión y redirigir al formulario
    $_SESSION['token_recuperacion'] = $token_recuperacion;
    $_SESSION['email_recuperacion'] = $tokenData['email_recuperacion'];
    
    header('Location: crear_cuenta.php?formulario=nueva_contraseña&token=' . $token_recuperacion);
    exit();

} catch (PDOException $e) {
    error_log("Error en verificar_token_recuperacion.php: " . $e->getMessage());
    $_SESSION['error_token'] = 'Error del sistema. Inténtalo más tarde.';
    header('Location: crear_cuenta.php?formulario=token_caducado');
    exit();
}
?>