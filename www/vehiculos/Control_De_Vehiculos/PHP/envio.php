<?php 
require_once('../PHPMailer-master/PHPMailer-master/class.phpmailer.php');
$mail = new PHPMailer();
$mail>IsSMTP();
// $mail>SMTPDebug = 2;
$mail>SMTPAuth = true;
$mail>SMTPSecure = "ssl";
$mail>Host = "smtp.gmail.com";
$mail>Port = 465;
$mail>Username = "soloinformatica472@gmail.com";
$mail>Password = "Blancateamo";
$mail>SetFrom('soloinformatica472@gmail.com','PRUEBA');
$mail>AddReplyto("soloinformatica472@gmail.com",'PRUEBA');
$mail>Subject = "Envio de email";
$mail>MsgHTML("hola que tal");
$address = "jjolon@diaco.gob.gt";
$mail>AddAddress($address, "JUAN");
if(!$mail>Send()){
	echo "error al enviar" . $mail>ErrorInfo;
}else{
	echo "mensaje enviado";
}

?>