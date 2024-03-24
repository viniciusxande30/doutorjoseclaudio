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

try {
    //Server settings
    $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'doutorjoseclaudioadv@gmail.com';                     //SMTP username
    $mail->Password   = 'Resultado@2024rsweb';                               //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
    $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom('doutorjoseclaudioadv@gmail.com', 'José Claudio');
    $mail->addAddress('doutorjoseclaudioadv@gmail.com', 'José Claudio');     //Add a recipient
    $mail->addReplyTo('doutorjoseclaudioadv@gmail.com', 'José Claudio');

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'Mensagem via Site';
    $body = "Nome: ".$_POST['name']."<br>";
    $mail->Body    = $body;
    // $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();
    echo 'E-mail enviado com sucesso';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
    
}
