<?php

error_reporting(E_ERROR | E_PARSE);

if (isset($_POST['email']) && !empty($_POST['email'])) {

    $nome = addslashes($_POST['name']);
    $email = addslashes($_POST['email']);
    $mensagem = addslashes($_POST['message']);

    $to = "eduardasantoss1997@gmail.com";
    $subject = "Contato - genius";
    $body = "Nome: " . $nome . "\r\n" .
        "Email: " . $email . "\r\n" .
        "Mensagem: " . $mensagem;
    $header = "From:myalliensanro@gmail.com" . "\r\n" .
        "Reply-To:" . $email . "\e\n" .
        "X=Mailer:PHP/" . phpversion();

    try {
        if (mail($to, $subject, $body, $header)) {
            echo "<script language=javascript>alert( 'Mensagem de e-mail enviada com sucesso!' );</script>";
        } else {
            echo "<script language=javascript>alert( 'Ocorreu um erro ao enviar sua mensagem.' );</script>";
        }
    } catch (Exception $e) {
        echo json_encode(['result' => false, 'msg' => $e->getMessage()]);
    }

}
?>
