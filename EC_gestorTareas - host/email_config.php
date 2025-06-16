<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;


require './vendor/autoload.php';


if (file_exists('.env')) {
    $lines = file('.env', FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    foreach ($lines as $line) {
        if (strpos($line, '=') !== false && strpos($line, '#') !== 0) {
            list($key, $value) = explode('=', $line, 2);
            $_ENV[trim($key)] = trim($value);
        }
    }
}

if (!isset($email) || !isset($usuario) || !isset($body)) {
    $email_error = "Variables de email no definidas correctamente";
    echo "Error: Variables de email no definidas correctamente";
    return;
}


$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->SMTPDebug = 0; 
    $mail->isSMTP();   
    $mail->Host       = $_ENV['SMTP_HOST'] ?? 'smtp.gmail.com';                   
    $mail->SMTPAuth   = true; 
    $mail->Username   = $_ENV['SMTP_USERNAME'] ?? '';  
    $mail->Password   = $_ENV['SMTP_PASSWORD'] ?? '';  
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS; 
    $mail->Port       = $_ENV['SMTP_PORT'] ?? 587;              

    //Recipients
    $mail->setFrom($_ENV['SMTP_USERNAME'] ?? '', 'Taskin');           
    $mail->addAddress($email, $usuario);     

    //Content
    $mail->CharSet = 'UTF-8';
    $mail->isHTML(true);                                  
    $mail->Subject = 'Confirma tu registro en Taskin'; 
    $mail->Body = $body; 
    $mail->AltBody = 'Gracias por registrarte en Taskin. Por favor, confirma tu correo haciendo clic en el enlace enviado.'; 

    $mail->send();
    echo 'Correo enviado correctamente<br>'; 
    
} catch (Exception $e) {
    $email_error = "Error al enviar el correo: {$mail->ErrorInfo}";
    error_log("Error de email: " . $mail->ErrorInfo); // Log seguro
    echo "Error al enviar el correo. Inténtalo más tarde."; // Mensaje genérico al usuario
}
?>