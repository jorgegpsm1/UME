
<body bgcolor="#91ECF8">
<?php
$dato = array();
$dato[0] = $_REQUEST['nombre'];
$dato[1] = $_REQUEST['correo'];
$dato[2] = $_REQUEST['asunto'];
$dato[3] = $_REQUEST['mensaje'];

/*var_dump($dato);
var_dump($_REQUEST);
*/
require 'PHPMailer-master/PHPMailerAutoload.php';

if (isset($_REQUEST['correo']))
{
	$email = $_REQUEST['correo'];;
/*	$emailv = "/^[a-zA-Z0-9_-]{2,}@[a-zA-Z0-9_-]{2,}\.[a-zA-Z]{2,4}(\.[a-zA-Z]{2,4})?$/";
	$emailv2 = "/[a-z]+@[a-z]+\.(org|com|mx)/";*/
	$p1="/[a-z]/";
	$p2="/@[a-z]+\.(org|com|mx)/";
	if(preg_match($p1, $email))
	{
				if(preg_match($p2,$email))
				{
					echo "El email:  ".$email." es valido. ";?><br><br> <?php
					
					
$mail = new PHPMailer;

//$mail->SMTPDebug = 3;                               // Enable verbose debug output

$mail->isSMTP();                                      // Set mailer to use SMTP
$mail->Host = 'mail.unidadmedicasante.com.mx';  // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = 'admin@unidadmedicasante.com.mx';                 // SMTP username
$mail->Password = 'FileReader753';                           // SMTP password
$mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
$mail->Port = 587;                                    // TCP port to connect to

$mail->setFrom($mail->Username, 'CLIENTES CONTACTO');
$mail->addAddress('contacto@unidadmedicasante.com.mx'); 

/*$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name*/
$mail->isHTML(true);                                  // Set email format to HTML

$mail->Subject = $dato[2];
$mail->Body    = ' Paciente:  '.$dato[0].'<br><br> Correo: '.$dato[1].'<br><br> Asunto: '.$dato[2].'<br><br> Mensaje: '.$dato[3];
$mail->AltBody =$dato[0].$dato[1].$dato[2].$dato[3];

if(!$mail->send()) {
    echo 'El Mensaje No Pudo Ser Enviado.';
    echo 'Error de Envio: ' . $mail->ErrorInfo;
} else {
    echo 'Mensaje Enviado';
}

					
				}
				else
				{
					echo "ERROR: el usuario de tu email: ".$email." es incorrecto, debe contener el dominio.";
				}
	}
	else
	{
		echo "ERROR: el usuario de tu email: ".$email." es incorrecto, debe contener nombre.";
	}
}
?>
</body>

