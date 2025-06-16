<?php

require_once 'conexion.php';
require_once 'helpers.php';




$delete = "delete from tareas where id_tarea= ?;";
$delete_prepare = $pdo->prepare($delete);
$delete_prepare->execute([$_GET['id']]);

$delete_prepare = null;
$pdo = null;

header('location:index.php');