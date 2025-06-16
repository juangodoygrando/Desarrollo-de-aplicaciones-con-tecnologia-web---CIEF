<?php

$server_name = "127.0.0.1";
$database = "taskin";
$port = 3307;
$user = "root";
$password = "CIEF1234";

try {
    
    $pdo = new PDO("mysql:host=$server_name;port=$port;dbname=$database", $user, $password);

    
    
} catch (PDOException $error) {
    echo "Error $error";
};