<?php

function enviar_email($destinatario, $assunto, $mensagem) {
    // Verificar se os parâmetros estão vazios
    if (empty($destinatario) || empty($assunto) || empty($mensagem)) {
        return false;
    }

    // Configurações de e-mail
    $remetente = "rsfreelas@gmail.com"; // Altere para o seu endereço de e-mail
    $headers = "From: $remetente\r\n";
    $headers .= "Reply-To: $remetente\r\n";
    $headers .= "Content-Type: text/html; charset=UTF-8\r\n";

    // Tenta enviar o e-mail
    if (mail($destinatario, $assunto, $mensagem, $headers)) {
        return true;
    } else {
        return false;
    }
}

// Verificar se o formulário foi enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Coletar dados do formulário
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