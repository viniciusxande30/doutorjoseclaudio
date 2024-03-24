<?php
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'vendor/autoload.php';

if(isset($_POST['enviar'])){

//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);
    // Definir o cabeçalho Content-Type para UTF-8
    $mail->CharSet = 'UTF-8';
    //Server settings
    //$mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'rsweb.com.br';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'comercial2@rsweb.com.br';                     //SMTP username
    $mail->Password   = 'nisexandi2';                               //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
    $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom('comercial2@rsweb.com.br', 'José Claudio');
    $mail->addAddress('comercial2@rsweb.com.br', 'José Claudio');     //Add a recipient
    $mail->addReplyTo('comercial2@rsweb.com.br', 'José Claudio');

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'Doutor José Claudio - Cotação';
    $body = "Nome: ".$_POST['name']."<br>"."E-mail: ".$_POST['email']."<br>"."Telefone: ".$_POST['phone']."<br>"."Subject: ".$_POST['subject']."<br>".$_POST['message']."<br>";
    $mail->Body    = $body;
    // $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();
    echo 'E-mail enviado com sucesso';
}
