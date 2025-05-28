<?php

$host = "127.0.0.1";           // ANTES: $server_name
$dbname = "taskin";           // ANTES: $database
$port = 3307;
$username = "root";           // ANTES: $user
$password = "CIEF1234";
$charset = 'utf8mb4';

$dsn = "mysql:host=$host;port=$port;dbname=$dbname;charset=$charset";

$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];

try {
    $pdo = new PDO($dsn, $username, $password, $options);
    //echo "Conexión exitosa a la base de datos.";
} catch (PDOException $e) {
    throw new PDOException($e->getMessage(), (int)$e->getCode());
}
