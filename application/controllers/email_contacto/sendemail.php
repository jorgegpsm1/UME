<?php
require 'PHPMailerAutoload.php';
$Json = file_get_contents('php://input');
$Input = json_decode($Json,true);

$Response							= array();
$Response['Success']  = false;
$dato 	 							= array();
$dato[0] 							= $Input['Nombre'];
$dato[1] 							= $Input['Email'];
$dato[2] 							= $Input['Asunto'];
$dato[3] 							= $Input['Mensaje'];


$mail = new PHPMailer();

$mail->SMTPOptions = array(
    'ssl' => array(
        'verify_peer' => false,
        'verify_peer_name' => false,
        'allow_self_signed' => true
    )
);
$mail->isSMTP();                                      // Set mailer to use SMTP
$mail->Host = 'mail.unidadmedicasante.com.mx';  // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = 'admin@unidadmedicasante.com.mx';                 // SMTP username
$mail->Password = 'FileReader753';                           // SMTP password
$mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
$mail->Port = 587;                                    // TCP port to connect to

$mail->setFrom($mail->Username, 'CLIENTES CONTACTO');
$mail->addAddress('contacto@unidadmedicasante.com.mx'); 


$mail->isHTML(true); 

$mail->Subject = $dato[2];
$mail->Body    = ' Paciente:  '.$dato[0].'<br><br> Correo: '.$dato[1].'<br><br> Asunto: '.$dato[2].'<br><br> Mensaje: '.$dato[3];
$mail->AltBody =$dato[0].$dato[1].$dato[2].$dato[3];

if(!$mail->send()){
	$Response['Success']  = false;    
} 
else{
	$Response['Success']  = true;    
}
	header('Content-Type: application/json');
  echo json_encode($Response);
?>

