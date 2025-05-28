
<?php

error_reporting(0);
session_start();
require_once 'pdo_bind_connection.php';

// Verificar lo que llega a login.php
$verificarUsuario = isset($_POST['usuario']) && $_POST['usuario'];
$verificarpassword = isset($_POST['password']) && $_POST['password'];

if (!$verificarUsuario || !$verificarpassword) {
    $_SESSION['error_cuenta'] = true;
    header('Location: crear_cuenta.php');
    exit();
}
// Quitar espacios en blanco
$usuario = trim($_POST['usuario']);
$password = trim($_POST['password']);


// Verificar que no senvien datos vacíos
if (empty($usuario) || empty($password)) {
    $_SESSION['error_cuenta'] = true;
    header('Location: crear_cuenta.php');
    exit();
}

$usuario = htmlentities($usuario, ENT_QUOTES, 'UTF-8');
$password = htmlentities($password, ENT_QUOTES, 'UTF-8');

// Verificar si el usuario existe
$stmt = $pdo->prepare("SELECT * FROM usuarios WHERE usuario = :usuario");
$stmt->bindParam(':usuario', $usuario, PDO::PARAM_STR);
$stmt->execute();
$usuarioExistente = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$usuarioExistente) {
    $_SESSION['user_inexistente'] = true;
    header('Location: index.php');
    exit();
}

// Verificar la contraseña
if (!password_verify($password, $usuarioExistente['password'])) {
    $_SESSION['user_inexistente'] = true;
    header('Location: index.php');
    exit();
}

echo "Todo OK";

//sintaxis basica de cookie
setcookie("usuario", $usuarioExistente["usuario"], time() + 60, "/");

//Sintaxis detallada

/* setcookie(
    "usuario",
    $usuarioExistente["usuario"], 
    [
        "expire"=>time() + 3600,
        "httponly" => true, // Esto es para acceso solo del servidor
        "secure" => true, // La cookie solo se puede enviar por https 
        "path" => "/",// la cookie es accesible desde cualquier ruta el proyecto
        "samesite"=> "strict", // Disponer de la cookie solo si llega desde la barra de navegacion("Lax" es para acceder desde cualquier )
    ]); */


$_SESSION['id_usuario'] = $usuarioExistente['id_usuario'];
$_SESSION['usuario'] = $usuarioExistente['usuario'];


header('location:colores/index.php');
