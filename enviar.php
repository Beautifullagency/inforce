<?php
define("SITE_KEY", '6LfQTrYaAAAAADQRiPh0EcANjnWETd3qXDh3YFIW');
define("SECRET_KEY", '6LfQTrYaAAAAADTXHzZEPquOCd-O8LfgBcsTgGL');
 
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









$token = $_POST['token'];
$action = $_POST['action'];
 
// call curl to POST request
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL,"https://www.google.com/recaptcha/api/siteverify");
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query(array('secret' => SECRET_KEY, 'response' => $token)));
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$response = curl_exec($ch);
curl_close($ch);
$arrResponse = json_decode($response, true);
 
// verify the response
if($arrResponse["success"] == '1' && $arrResponse["action"] == $action && $arrResponse["score"] >= 0.5) {
    // valid submission
    // go ahead and do necessary stuff
} else {
    // spam submission
    // show error message
}

<script type="text/javascript">
grecaptcha.ready(function() {
    grecaptcha.execute('reCAPTCHA_site_key', {action: 'submit'}).then(function(token) {
        // Add your logic to submit to your backend server here.
    });
  });
closelog('anda')

</script>


  
?>

