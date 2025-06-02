<?php
session_start();
require_once 'pdo_connection.php';

// Verificar que se enviaron los datos necesarios
if (!isset($_POST['nueva_contraseña']) || !isset($_POST['repetir_contraseña']) || !isset($_POST['token'])) {
    $_SESSION['error_contraseña'] = 'Datos incompletos. Inténtalo de nuevo.';
    header('Location: crear_cuenta.php?formulario=token_caducado');
    exit();
}

$nueva_contraseña = trim($_POST['nueva_contraseña']);
$repetir_contraseña = trim($_POST['repetir_contraseña']);
$token = trim($_POST['token']);

// Validar que las contraseñas no estén vacías
if (empty($nueva_contraseña) || empty($repetir_contraseña)) {
    $_SESSION['error_contraseña'] = 'Por favor, completa ambos campos de contraseña.';
    header('Location: crear_cuenta.php?formulario=nueva_contraseña&token=' . $token);
    exit();
}

// Verificar que las contraseñas coincidan
if ($nueva_contraseña !== $repetir_contraseña) {
    $_SESSION['error_contraseña'] = 'Las contraseñas no coinciden.';
    header('Location: crear_cuenta.php?formulario=nueva_contraseña&token=' . $token);
    exit();
}

// Validar longitud mínima de contraseña
if (strlen($nueva_contraseña) < 6) {
    $_SESSION['error_contraseña'] = 'La contraseña debe tener al menos 6 caracteres.';
    header('Location: crear_cuenta.php?formulario=nueva_contraseña&token=' . $token);
    exit();
}

try {
    // Verificar que el token existe y es válido
    $selectToken = "SELECT * FROM tokens_recuperacion WHERE token_recuperacion = :token";
    $stmtToken = $pdo->prepare($selectToken);
    $stmtToken->bindParam(':token', $token, PDO::PARAM_STR);
    $stmtToken->execute();
    $tokenData = $stmtToken->fetch(PDO::FETCH_ASSOC);

    if (!$tokenData) {
        $_SESSION['error_contraseña'] = 'Token inválido o expirado.';
        header('Location: crear_cuenta.php?formulario=token_caducado');
        exit();
    }

    // Verificar que el token no haya caducado
    $ahora = new DateTime();
    $fechaCaducidad = new DateTime($tokenData['caducidad_recuperacion']);

    if ($fechaCaducidad < $ahora) {
        // Eliminar token caducado
        $deleteExpired = "DELETE FROM tokens_recuperacion WHERE token_recuperacion = :token";
        $prepDelete = $pdo->prepare($deleteExpired);
        $prepDelete->bindParam(':token', $token, PDO::PARAM_STR);
        $prepDelete->execute();

        $_SESSION['error_contraseña'] = 'El token ha caducado.';
        header('Location: crear_cuenta.php?formulario=token_caducado');
        exit();
    }

    // Verificar que el usuario existe
    $email_recuperacion = $tokenData['email_recuperacion'];
    $selectUser = "SELECT * FROM usuarios WHERE email = :email";
    $stmtUser = $pdo->prepare($selectUser);
    $stmtUser->bindParam(':email', $email_recuperacion, PDO::PARAM_STR);
    $stmtUser->execute();
    $usuario = $stmtUser->fetch(PDO::FETCH_ASSOC);

    if (!$usuario) {
        $_SESSION['error_contraseña'] = 'Usuario no encontrado.';
        header('Location: crear_cuenta.php?formulario=token_caducado');
        exit();
    }

    // Iniciar transacción
    $pdo->beginTransaction();

    // Encriptar la nueva contraseña
    $hash_nueva_contraseña = password_hash($nueva_contraseña, PASSWORD_DEFAULT);

    // Actualizar la contraseña del usuario
    $updatePassword = "UPDATE usuarios SET password = :password WHERE email = :email";
    $stmtUpdate = $pdo->prepare($updatePassword);
    $stmtUpdate->bindParam(':password', $hash_nueva_contraseña, PDO::PARAM_STR);
    $stmtUpdate->bindParam(':email', $email_recuperacion, PDO::PARAM_STR);
    $stmtUpdate->execute();

    // Eliminar el token usado (para que no se pueda usar de nuevo)
    $deleteToken = "DELETE FROM tokens_recuperacion WHERE token_recuperacion = :token";
    $stmtDelete = $pdo->prepare($deleteToken);
    $stmtDelete->bindParam(':token', $token, PDO::PARAM_STR);
    $stmtDelete->execute();

    // Limpiar otros tokens caducados del mismo email
    $ahoraFormateado = $ahora->format('Y-m-d H:i:s');
    $deleteExpired = "DELETE FROM tokens_recuperacion WHERE email_recuperacion = :email AND caducidad_recuperacion < :ahora";
    $stmtDeleteExpired = $pdo->prepare($deleteExpired);
    $stmtDeleteExpired->bindParam(':email', $email_recuperacion, PDO::PARAM_STR);
    $stmtDeleteExpired->bindParam(':ahora', $ahoraFormateado, PDO::PARAM_STR);
    $stmtDeleteExpired->execute();

    // Confirmar transacción
    $pdo->commit();

    // Limpiar sesión
    unset($_SESSION['error_contraseña']);
    unset($_SESSION['token_recuperacion']);
    unset($_SESSION['email_recuperacion']);

    // Limpiar mensajes de error
    unset($_SESSION['error_contraseña']);

    // Redirigir al formulario de éxito
    header('Location: crear_cuenta.php?formulario=contraseña_cambiada');
    
} catch (PDOException $e) {
    // Revertir transacción en caso de error
    $pdo->rollBack();

    error_log("Error en cambiar_contraseña.php: " . $e->getMessage());
    $_SESSION['error_contraseña'] = 'Error del sistema. Inténtalo más tarde.';
    header('Location: crear_cuenta.php?formulario=nueva_contraseña&token=' . $token);
    exit();
}
