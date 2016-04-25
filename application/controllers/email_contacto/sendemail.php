<?php
$dato = array();
$dato[0] = $_REQUEST['nombre'];
$dato[1] = $_REQUEST['correo'];
$dato[2] = $_REQUEST['asunto'];
$dato[3] = $_REQUEST['mensaje'];

var_dump($dato);
var_dump($_REQUEST);

require 'PHPMailer-master/PHPMailerAutoload.php';

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
    echo 'Message could not be sent.';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
} else {
    echo 'Message has been sent';
}
