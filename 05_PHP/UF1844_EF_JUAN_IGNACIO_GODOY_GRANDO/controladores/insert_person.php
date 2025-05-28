<?php
require_once '../connection.php';
session_start();

if (
    isset($_POST['nombre_persona'], $_POST['apellido_persona'], $_POST['password'], $_POST['email'], $_POST['id_departamento']) &&
    !empty($_POST['nombre_persona']) &&
    !empty($_POST['apellido_persona']) &&
    !empty($_POST['password']) &&
    !empty($_POST['email']) &&
    !empty($_POST['id_departamento'])
) {
    $nombre = trim($_POST['nombre_persona']);
    $apellido = trim($_POST['apellido_persona']);
    $password = password_hash(trim($_POST['password']), PASSWORD_DEFAULT);
    $email = trim($_POST['email']);
    $id_departamento = $_POST['id_departamento'];

    $insert = "INSERT INTO personas(nombre_persona, apellido_persona, password, email, id_departamento) VALUES (?, ?, ?, ?, ?)";
    $insert_prepare = $pdo->prepare($insert);
    
    if ($insert_prepare->execute([$nombre, $apellido, $password, $email, $id_departamento])) {
        header('Location: ../index.php');
        exit;
    } else {
        print_r($insert_prepare->errorInfo());
    }

    $insert_prepare = null;
    $pdo = null;

} else {
    die("Faltan datos del formulario.");
}
