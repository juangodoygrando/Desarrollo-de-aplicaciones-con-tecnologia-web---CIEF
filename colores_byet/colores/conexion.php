<?php

//coneccion a la base de datos 

/* $server_name="127.0.0.1"; */
$server_name = "sql313.byethost7.com";
$database = "b7_39082261_coloresAPP";
$port = 3306;
$user = "b7_39082261";
$password = "pzcc.eU?7sRdRSY";



try {
    $conn = new PDO("mysql:host=$server_name;port=$port;dbname=$database;charset=utf8mb4", $user, $password);
    /* echo "¡Conectados!";

    foreach ($conn->query('select * from colores') as $fila) {
        
        echo $fila['usuario'];
    } */
} catch (PDOException $error) {
    echo "Error $error";
};
