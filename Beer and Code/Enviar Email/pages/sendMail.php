<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
require '../vendor/autoload.php';

var_dump($_POST);


$dados = [
    'nome' => $_POST['nome'] ?? '',
    'pais' => strtoupper($_POST['pais']) ?? '',
    'mensagem' => $_POST['mensagem'] ?? '',

];

$mail = new PHPMailer(true);

try {
   // $mail->SMTPDebug = SMP::DEBUG_SERVER;
    $mail->isSMTP();
    $mail->Host = 'sandbox.smtp.mailtrap.io';
    $mail->SMTPAuth = true;
    $mail->Username = 'a88e01a809bab1';
    $mail->Password = '22dc36ce62c5cf';
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port = 587;
    $mail ->CharSet = "UTF-8";

    //DE:
    $mail->setFrom('teste@beerandcode.com.br', 'Tester B&C');

    //PARA:
    $mail->AddAddress('sabrina@beerandcode.com.br', 'Sabrina luiz');

    //CONTEUDO
    $mail->IsHTML(true);
    $mail->Subject = 'Contato do Site';

    $corpo = "<br>Nome: <b> {$dados['nome']} <br/>";
    $corpo .= "<br>Pais: <b> {$dados['pais']} <br/>";
    $corpo .= "<br>Mensagem: <b> {$dados['mensagem']} <br/>";

    $mail->Body = $corpo;

    $mail->send();


} catch(Exception $e){
    echo $e->getMessage();


}

?>