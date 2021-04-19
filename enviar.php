<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'vendor/PHPMailer/Exception.php';
require 'vendor/PHPMailer/PHPMailer.php';
require 'vendor/PHPMailer/SMTP.php';;

$name = $_POST['nombre'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$msj = $_POST['mensaje'];

$archivo = $_FILES["file"];

//Instantiation and passing `true` enables exceptions
$mail = new PHPMailer(true);

$body = "<b>Este mensaje fue enviado por: </b>" . $name . "<br>".
"<br><b>Su e-mail es: </b>" . $email . "<br>".
"<br><b>Teléfono de contacto: </b>" . $phone . "<br>".
"<br><b>Mensaje: </b>" . $msj . "<br>". 
"<br><b>Enviado el: </b>" . date('d/m/Y', time()). "<br>";




try {
    //Server settings
    $mail->SMTPDebug = 0;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'mail.inforce-seguridad.com.ar';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'web@inforce-seguridad.com.ar';                     //SMTP username
    $mail->Password   = '8Jun7yONxz4n';                               //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         //Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
    $mail->Port       = 587;                                    //TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

    //Recipients
    $mail->setFrom('web@inforce-seguridad.com.ar', 'Info-Inforce');
    $mail->addAddress('web@inforce-seguridad.com.ar', $name);     //Add a recipient             //Name is optional
    //$mail->addReplyTo('info@example.com', 'Information');
    //$mail->addBCC('bcc@example.com');

    //Attachments
    if ($archivo){
    $mail->addAttachment($archivo['tmp_name'], $archivo['name']); 
    }        //Add attachments
    //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->CharSet = 'UTF-8';
    $mail->Subject = 'Nuevo mensaje de Inforce-seguridad.com.ar';
    $mail->Body    = $body;

    $mail->send();
    $mail->ClearAttachments();
    header("Location:index.html");
    echo 'Message has been sent';
   

    
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}

  
?>

