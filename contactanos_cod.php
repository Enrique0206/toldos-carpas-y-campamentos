<?php
/*1255comit 29/11/17*/
//var_dump($_POST);
//var_dump($_FILES);

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

$mail = new PHPMailer(true);

try {
	$mail->SMTPDebug = 3;															//3;	
	$mail->isSMTP();
	$mail->Host = "localhost";								//'smtp.gmail.com';
	$mail->SMTPAuth = false;													//true;
	//$mail->Username = '';														//'luisabrig0206@gmail.com';
	//$mail->Password = '';														//'';
	//$mail->SMTPSecure = 'tls';													//'tls';
	$mail->Port = 25;															//587;
	
	//se agrego esto para que se pueda conectar al smtp host
	$mail->SMTPOptions = array(
    'ssl' => array(
        'verify_peer' => false,
        'verify_peer_name' => false,
        'allow_self_signed' => true
		)
	);
	//se agrego esto para que se pueda conectar al smtp host
	
	
	
	//falta agregar validaciones
	
	$nombre = $_POST['nombre'];
	$correo = $_POST['correo'];	
	$mensaje = $_POST['mensaje'];
	//$adjunto = $_POST['adjunto'];
	
	$mail->setFrom('toldoscarpasycampamentos@gmail.com', 'Toldos Carpas y Campamentos');
	$mail->addAddress('toldoscarpasycampamentos@gmail.com');
	$mail->addBCC('luisabrigo@hotmail.com');
	
	$mail->isHTML(true);
	$mail->Subject = "Mensaje del Contacto";
	$mail->Body = "<p>mensaje de: <strong>$nombre </strong></p><p>$correo</p><p>envia el siguiente mensaje: </p><p>$mensaje</p>";
	
	$mail->send();
	
	echo 'el mensaje fue enviado con exito';
	
} catch (Exception $e) {
	
	echo 'Error al enviar el mensaje';
	echo 'Mailer Error: ' . $mail->ErrorInfo;
	
}
	
	//redireccionando
	header('location: index.php');