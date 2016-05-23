<?php
require 'PHPMailerAutoload.php';
$Json = file_get_contents('php://input');
$Input = json_decode($Json,true);

$Response							= array();
$Response['Success']  = false;


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

$mail->setFrom($mail->Username, 'CLIENTES CITA');
$mail->addAddress('contacto@unidadmedicasante.com.mx'); 


$mail->isHTML(true); 

$mail->Subject = "Agendar Cita";
$mail->Body    = ' Paciente:  '.$Input['Nombre'].' '.$Input['Paterno'].' '.$Input['Materno'].'<br><br> Correo: '.$Input['Correo'].'<br><br> Telefono: '.$Input['Telefono'].'<br><br> Fecha Agendada: '.$Input['Fecha'];

if(!$mail->send()){
	$Response['Success']  = false;    
} 
else{
	$Response['Success']  = true;    
}
	header('Content-Type: application/json');
  echo json_encode($Response);
?>

