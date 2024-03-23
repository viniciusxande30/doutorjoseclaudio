<?php

function enviar_email($destinatario, $assunto, $mensagem) {
    if (empty($destinatario) || empty($assunto) || empty($mensagem)) {
        return false;
    }

    $remetente = "rsfreelas@gmail.com"; 
    $headers = "From: $remetente\r\n";
    $headers .= "Reply-To: $remetente\r\n";
    $headers .= "Content-Type: text/html; charset=UTF-8\r\n";

    if (mail($destinatario, $assunto, $mensagem, $headers)) {
        return true;
    } else {
        return false;
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST['name'];
    $nome = $_POST['email'];
    $destinatario = $_POST["phone"];
    $assunto = $_POST["subject"];
    $mensagem = $_POST["message"];

    // Enviar e-mail
    if (enviar_email($destinatario, $assunto, $mensagem)) {
        echo "E-mail enviado com sucesso!";
    } else {
        echo "Erro ao enviar o e-mail. Por favor, tente novamente.";
    }
}

?>