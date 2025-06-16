<?php

session_start();
require_once 'pdo_connection.php';

// Verificar que existe el token
if (!isset($_GET['token']) || empty($_GET['token'])) {
    $_SESSION['error_token'] = 'Token no válido o faltante.';
    header('Location: crear_cuenta.php?formulario=token_caducado');
    exit();
}

$token = trim($_GET['token']);

// Buscar el usuario temporal con el token
$select = "SELECT * FROM temporal WHERE token_registro = :token";
$prep = $pdo->prepare($select);
$prep->bindParam(':token', $token, PDO::PARAM_STR);
$prep->execute();
$usuario = $prep->fetch(PDO::FETCH_ASSOC);

// Si no existe el usuario con ese token
if (!$usuario) {
    $_SESSION['error_token'] = 'El token no existe o ya fue utilizado.';
    header('Location: crear_cuenta.php?formulario=token_caducado');
    exit();
}

// CORRECCIÓN: Usar DateTime para comparar fechas correctamente
$ahora = new DateTime();
$fechaCaducidad = new DateTime($usuario['token_caducidad']);

// Verificar si el token ha caducado
if ($fechaCaducidad < $ahora) {
    // Eliminar token caducado
    $deleteExpired = "DELETE FROM temporal WHERE token_registro = :token";
    $prepDelete = $pdo->prepare($deleteExpired);
    $prepDelete->bindParam(':token', $token, PDO::PARAM_STR);
    $prepDelete->execute();
    
    $_SESSION['error_token'] = 'El token ha caducado. Solicita un nuevo registro.';
    header('Location: crear_cuenta.php?formulario=token_caducado');
    exit();
}

// Verificar que el usuario/email no existan ya en la tabla definitiva
$checkUser = "SELECT * FROM usuarios WHERE usuario = :usuario OR email = :email";
$prepCheck = $pdo->prepare($checkUser);
$prepCheck->bindParam(':usuario', $usuario['usuario'], PDO::PARAM_STR);
$prepCheck->bindParam(':email', $usuario['email'], PDO::PARAM_STR);
$prepCheck->execute();
$existeUsuario = $prepCheck->fetch(PDO::FETCH_ASSOC);

if ($existeUsuario) {
    // Eliminar el registro temporal
    $deleteTemp = "DELETE FROM temporal WHERE token_registro = :token";
    $prepDeleteTemp = $pdo->prepare($deleteTemp);
    $prepDeleteTemp->bindParam(':token', $token, PDO::PARAM_STR);
    $prepDeleteTemp->execute();
    
    $_SESSION['error_token'] = 'El usuario o email ya existe en el sistema.';
    header('Location: crear_cuenta.php?formulario=token_caducado');
    exit();
}

try {
    // Comenzar transacción para asegurar consistencia
    $pdo->beginTransaction();
    
    // Insertar usuario en la tabla definitiva
    $insert = "INSERT INTO usuarios (usuario, email, telefono, password) 
               VALUES (:usuario, :email, :telefono, :password)";
    $prep = $pdo->prepare($insert);
    $prep->bindParam(':usuario', $usuario['usuario'], PDO::PARAM_STR);
    $prep->bindParam(':email', $usuario['email'], PDO::PARAM_STR);
    $prep->bindParam(':telefono', $usuario['telefono'], PDO::PARAM_STR);
    $prep->bindParam(':password', $usuario['password'], PDO::PARAM_STR);
    $prep->execute();

    // Eliminar el registro temporal usado
    $delete = "DELETE FROM temporal WHERE token_registro = :token";
    $prepDelete = $pdo->prepare($delete);
    $prepDelete->bindParam(':token', $token, PDO::PARAM_STR);
    $prepDelete->execute();

    // Limpiar tokens caducados (mantenimiento)
    $ahoraFormateado = $ahora->format('Y-m-d H:i:s');
    $deleteExpired = "DELETE FROM temporal WHERE token_caducidad < :ahora";
    $prepDeleteExpired = $pdo->prepare($deleteExpired);
    $prepDeleteExpired->bindParam(':ahora', $ahoraFormateado, PDO::PARAM_STR);
    $prepDeleteExpired->execute();

    // Confirmar transacción
    $pdo->commit();

    // Guardar información de éxito en sesión
    $_SESSION['registro_exitoso'] = true;
    $_SESSION['usuario_registrado'] = $usuario['usuario'];
    
    // Limpiar errores previos
    unset($_SESSION['error_token']);
    
    // Redirigir a la página de éxito
    header('Location: crear_cuenta.php?formulario=registro_exitoso');
    
} catch (PDOException $e) {
    // Revertir transacción en caso de error
    $pdo->rollBack();
    
    // Log del error para debugging
    error_log("Error en registro: " . $e->getMessage());
    
    $_SESSION['error_registro'] = 'Error al completar el registro. Inténtalo de nuevo.';
    header('Location: crear_cuenta.php?formulario=token_caducado');
    exit();
}

$prep = null; // Cerrar la consulta
$pdo = null; // Cerrar la conexión
?>