<?php

//coneccion a la base de datos 

/* $server_name="127.0.0.1"; */
$server_name = "localhost";
$database = "colores";
$port = 3307;
$user = "colores";
$password = "colores";

try {
    $conn = new PDO("mysql:host=$server_name;port=$port;dbname=$database;charset=utf8mb4", $user, $password);
    /* echo "¡Conectados!";

    foreach ($conn->query('select * from colores') as $fila) {
        
        echo $fila['usuario'];
    } */
} catch (PDOException $error) {
    echo "Error $error";
};
