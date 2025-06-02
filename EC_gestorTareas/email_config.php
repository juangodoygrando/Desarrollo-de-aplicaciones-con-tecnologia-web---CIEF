<?php
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader (created by composer, not included with PHPMailer)
require './vendor/autoload.php';

if (!isset($email) || !isset($usuario) || !isset($body)) {
    $email_error = "Variables de email no definidas correctamente";
    echo "Error: Variables de email no definidas correctamente";
    return;
}

//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->SMTPDebug = 0;  // 0 para no mostrar ningún mensaje   
    $mail->isSMTP();    //Send using SMTP
    $mail->Host       = 'smtp.gmail.com'; // Tu servidor SMTP                   
    $mail->SMTPAuth   = true; //Enable SMTP authentication
    $mail->Username   = 'juani.godoy27@gmail.com';  // Tu cuenta de Gmail
    $mail->Password   = 'xkvpxtxqisurpxgc';    // De tu cuenta de Gmail 
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS; //Enable implicit TLS encryption
    $mail->Port  = 587;  // Necesario para GMail              //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom('juani.godoy27@gmail.com', 'Taskin');           // Remitente
    $mail->addAddress($email,$usuario);     // Receptor
    // $mail->addAddress('ellen@example.com');               //Name is optional
    // $mail->addReplyTo('info@example.com', 'Information');
    // $mail->addCC('cc@example.com');
    // $mail->addBCC('bcc@example.com');

    //Attachments
    // $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
    // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

    //Content
    $mail->CharSet = 'UTF-8';
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = $subject; // Asunto del mensaje
    $mail->Body = $body; // Usa el cuerpo definido en el archivo que incluye este
    $mail->AltBody = 'Gracias por registrarte en Taskin. Por favor, confirma tu correo haciendo clic en el enlace enviado.'; // Cuerpo alternativo (sin HTML)

    $mail->send();
    echo 'Correo enviado correctamente<br>'; // Cuando todo ha ido bien
    
} catch (Exception $e) {
    $email_error = "Error al enviar el correo: {$mail->ErrorInfo}";
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}"; // Cuando no ha ido bien
}
?>

