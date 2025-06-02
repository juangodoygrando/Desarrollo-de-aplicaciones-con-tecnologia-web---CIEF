<?php

require_once 'conexion.php';
require_once 'helpers.php';



session_start();
if(!hash_equals($_SESSION['sesion-token'],$_POST['sesion-token'])){
    die("Token invalido");
};


if(!empty($_POST['web'])){
    die('Bot detectado!');
}


$titulo = trim($_POST['titulo']); 
$descripcion = trim($_POST['descripcion']);


$id_estado = filter_input(INPUT_POST, 'id_estado', FILTER_VALIDATE_INT);
$id_categoria = filter_input(INPUT_POST, 'id_categoria', FILTER_VALIDATE_INT);


if (
    empty($titulo) || 
    empty($descripcion) || 
    $id_estado === false || 
    $id_categoria === false
) {
    die("Datos inválidos.");
}



$insert = "INSERT INTO tareas(titulo, descripcion, id_estado, id_categoria,id_usuario) VALUES (?, ?, ?, ?, ?)";
$insert_prepare = $pdo->prepare($insert);
$insert_prepare->execute([$_POST['titulo'], $_POST['descripcion'], $_POST['id_estado'], $_POST['id_categoria'],$_SESSION['id_usuario']]);

$insert_prepare = null;
$conn = null;

header('location:index.php');
