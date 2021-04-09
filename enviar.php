<?php

$name = $_POST['nombre'];
$mail = $_POST['email'];
$phone = $_POST['phone'];
$msj = $_POST['mensaje'];


$uploadStatus = 1;
            
// Upload attachment file
if(!empty($_FILES["attachment"]["name"])){
    
    // File path config
    $targetDir = "uploads/";
    $fileName = basename($_FILES["attachment"]["name"]);
    $targetFilePath = $targetDir . $fileName;
    $fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);
    
    // Allow certain file formats
    $allowTypes = array('pdf', 'doc', 'docx', 'jpg', 'png', 'jpeg');
    if(in_array($fileType, $allowTypes)){
        // Upload file to the server
        if(move_uploaded_file($_FILES["attachment"]["tmp_name"], $targetFilePath)){
            $uploadedFile = $targetFilePath;
        }else{
            $uploadStatus = 0;
            $statusMsg = "Sorry, there was an error uploading your file.";
        }
    }else{
        $uploadStatus = 0;
        $statusMsg = 'Sorry, only PDF, DOC, JPG, JPEG, & PNG files are allowed to upload.';
    }
}














$header = 'From: ' . $mail . " \r\n";
$header .= "X-Mailer: PHP/" . phpversion() . " \r\n";
$header .= "Mime-Version: 1.0 \r\n";
$header .= "Content-Type: text/plain";

$message = "Este mensaje fue enviado por: " . $name . " \r\n";
$message .= "Su e-mail es: " . $mail . " \r\n";
$message .= "Teléfono de contacto: " . $phone . " \r\n";
$message .= "Mensaje: " . $msj . " \r\n";
$message .= "Enviado el: " . date('d/m/Y', time());

$para = "javier_9333@hotmail.com";
$asunto = "Mensaje de mi sitio web";

mail($para, $asunto, utf8_decode($message), $header);

header("Location:index.html");  
?>
