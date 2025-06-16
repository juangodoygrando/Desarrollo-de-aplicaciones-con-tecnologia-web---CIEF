<?php

// Cargar variables de entorno
if (file_exists('.env')) {
    $lines = file('.env', FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    foreach ($lines as $line) {
        if (strpos($line, '=') !== false && strpos($line, '#') !== 0) {
            list($key, $value) = explode('=', $line, 2);
            $_ENV[trim($key)] = trim($value, '"'); 
        }
    }
}

// Configuración desde variables de entorno
$host = $_ENV['DB_HOST'] ?? die('DB_HOST no configurado');
$dbname = $_ENV['DB_NAME'] ?? die('DB_NAME no configurado');
$port = $_ENV['DB_PORT'] ?? die('DB_PORT no configurado');
$username = $_ENV['DB_USERNAME'] ?? die('DB_USERNAME no configurado');
$password = $_ENV['DB_PASSWORD'] ?? die('DB_PASSWORD no configurado');
$charset = $_ENV['DB_CHARSET'] ?? 'utf8';

$dsn = "mysql:host=$host;port=$port;dbname=$dbname;charset=$charset";

$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
    PDO::ATTR_PERSISTENT         => false, 
    PDO::MYSQL_ATTR_SSL_VERIFY_SERVER_CERT => false,
];

try {
    $pdo = new PDO($dsn, $username, $password, $options);
    //echo "Conexión exitosa a la base de datos.";
} catch (PDOException $e) {
    throw new PDOException($e->getMessage(), (int)$e->getCode());
}
