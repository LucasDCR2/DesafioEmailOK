<?php

$nome = utf8_encode($_POST['nome']);
$email = utf8_encode($_POST['email']);
$assunto = utf8_encode($_POST['assunto']);
$mensagem = utf8_encode($_POST['mensagem']);

require 'PHPMailer/PHPMailerAutoload.php';

$mail = new PHPMailer;

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

$mail->IsHTML(true);
$mail->Body = $body;
    
if ( $mail->send()) {
    echo "<div>E-mail enviado com sucesso!</div>";

} else {
    echo "Falha ao enviar o e-mail:" . $mail->ErrorInfo;
}


?>