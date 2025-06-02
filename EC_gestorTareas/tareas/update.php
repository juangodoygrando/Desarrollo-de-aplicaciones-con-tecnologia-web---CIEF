<?php
require_once 'conexion.php';
require_once 'helpers.php';


$update = "UPDATE tareas SET titulo = ?, descripcion = ?, id_estado = ?, id_categoria = ? WHERE id_tarea = ?";
$update_prepare = $pdo->prepare($update);
$update_prepare->execute([
    $_POST['titulo'],
    $_POST['descripcion'],
    $_POST['id_estado'],
    $_POST['id_categoria'],
    $_POST['id']
]);

$update_prepare = null;
$pdo = null;

header('location:index.php');
