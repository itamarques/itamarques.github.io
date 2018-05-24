<?php

$name = $_POST["name"];
$email = $_POST["email"];
$message = $_POST["message"];

require_once("PHPMailerAutoload.php");

$mail = new PHPMailer();
$mail->isSMTP();
$mail->Host = 'smtp.gmail.com';
$mail->Port = 587;
$mail->SMTPSecure = 'tls';
$mail->SMTPAuth = true;
$mail->Username = "itamarques10@gmail.com";
$mail->Password = "itafrost1";

$mail->setFrom("itamarques10@gmail.com", "Travel Tips and Questions");
$mail->addAddress("itamarques10@gmail.com");
$mail->Subject = "Contact email for tips.";
$mail->msgHTML("<html>de: {$name}<br/>email: {$email}<br/>message: {$message}</html>");
$mail->AltBody = "de: {$name}\nemail:{$email}\message: {$message}";

if($mail->send()) {
	header("Location: thanks.html");
} else {
	$_SESSION["danger"] = "Erro ao enviar mensagem " . $mail->ErrorInfo;
	header("Location: ../index.html");
}
die();

