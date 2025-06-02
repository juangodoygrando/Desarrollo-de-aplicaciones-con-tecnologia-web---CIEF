<?php
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader (created by composer, not included with PHPMailer)
require 'vendor/autoload.php';

//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->SMTPDebug = 0;      //Enable verbose debug output
    $mail->isSMTP();      //Send using SMTP
    $mail->Host  = 'smtp.gmail.com';       //Set the SMTP server to send through
    $mail->SMTPAuth   = true;     //Enable SMTP authentication
    $mail->Username   = 'juani.godoy27@gmail.com';    //SMTP username
    $mail->Password   = 'xkvpxtxqisurpxgc';  //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS; //Enable implicit TLS encryption
    $mail->Port       = 587;    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom('juani.godoy27@gmail.com', 'Juan'); //Remitente
    $mail->addAddress('juani.godoy27@icloud.com', 'Juani Icloud');//Receptor
    //$mail->addAddress('ellen@example.com');               //Name is optional
    //$mail->addReplyTo('info@example.com', 'Information');
    //$mail->addCC('cc@example.com');
    //$mail->addBCC('bcc@example.com');

    //Attachments
    //$mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
    //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

    //Content
    $mail->CharSet = 'UTF-8';
    $mail->isHTML(true);                        //Set email format to HTML
    $mail->Subject = 'Prueba de envío con PHP,PHPMAILER y GMAIL';
    $mail->Body    = '<h1>Hola Juani</h1> <p>Correo de prueba de PHPMAILER</p> This is the HTML message body <b>in bold!</b>';
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}

