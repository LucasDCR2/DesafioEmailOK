<?php
// Obtém os valores enviados via POST do formulário e converte para UTF-8
$nome = utf8_encode($_POST['nome']);
$email = utf8_encode($_POST['email']);
$assunto = utf8_encode($_POST['assunto']);
$mensagem = utf8_encode($_POST['mensagem']);
// Carrega a biblioteca PHPMailer
require 'PHPMailer/PHPMailerAutoload.php';

// Cria um objeto da classe PHPMailer
$mail = new PHPMailer;

// Define SMTP como true no envio de e-mails
$mail->isSMTP();

//Server settings                                                          
$mail->Host       = 'smtp.gmail.com';
$mail->Port       = "587";
$mail->SMTPSecure = "tls";                    
$mail->SMTPAuth   = "true";                                 
$mail->Username   = "lucasrodrigues2606@gmail.com";         
$mail->Password   = "rhyifsaqyyfvpilj";                     
              

//Recipients
$mail->setFrom($mail->Username, "lucasrodrigues2606@gmail.com");
$mail->addAddress($email);
$mail->Subject = $assunto;                                

$body = "Você recebeu uma mensagem de $nome, lucasrodrigues2606@gmail.com:
<br><br>

Mensagem: <br>
$mensagem
";

// Define em formato HTML
$mail->IsHTML(true);
$mail->Body = $body;
// Define o corpo do e-mail

if ( $mail->send()) {
    echo "<div>E-mail enviado com sucesso!</div>";

} else {
    echo "Falha ao enviar o e-mail:" . $mail->ErrorInfo;
}


?>