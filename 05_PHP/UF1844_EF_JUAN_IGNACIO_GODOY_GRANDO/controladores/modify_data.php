<?php

require_once '../connection.php';

$id_persona = $_POST['id_persona'];
$nombre = $_POST['nombre_persona'];
$apellido = $_POST['apellido_persona'];
$password = password_hash(trim($_POST['password']), PASSWORD_DEFAULT);
$email = $_POST['email'];
$id_departamento = $_POST['id_departamento'];


$update = "UPDATE personas 
               SET nombre_persona = ?, 
                   apellido_persona = ?, 
                   password = ?, 
                   id_departamento = ?, 
                   email = ?
               WHERE id_persona = ?";

$update_prepare = $pdo->prepare($update);
$update_prepare->execute([$nombre, $apellido, $password, $id_departamento, $email, $id_persona]);

header('Location: ../index.php');
