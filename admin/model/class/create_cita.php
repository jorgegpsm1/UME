<?php
   @session_start();
   require_once($_SESSION['BASE_DIR_BACKEND'].'/model/config/database.php'); 
   $Connection   = Database::Connect();
	$Json = file_get_contents('php://input');
   $Input = json_decode($Json,true);
   $Query  					   =    array();
   $Query['SQL_A']   		=    "SELECT COUNT(id_cita) as VAL FROM citas";
   $Query['SQL_B']			=    "INSERT INTO citas (id_cita, nombre, apellido_paterno, apellido_materno, correo, telefono, fecha) VALUES (:ID, :NAME_A, :NAME_B, :NAME_C, :EMAIL, :TEL, :DAT)";

   $Response   = array();
   $VAL = null;
   $Response['Success']  = false;

   $result_1 = $Connection->prepare($Query['SQL_A']);
   $result_1->execute();
   while($row = $result_1->fetch(PDO::FETCH_ASSOC)){
      $VAL = $row['VAL'];
   }
   $VAL++;
   $result_2 = $Connection->prepare($Query['SQL_B']);
   $result_2->bindParam(':ID',$VAL);
   $result_2->bindParam(':NAME_A',$Input['nombre']);
   $result_2->bindParam(':NAME_B',$Input['apellido_p']);
   $result_2->bindParam(':NAME_C',$Input['apellido_m']);
   $result_2->bindParam(':EMAIL',$Input['correo']);
   $result_2->bindParam(':TEL',$Input['telefono']);
   $result_2->bindParam(':DAT',$Input['fecha']);
   $result_2->execute();
   $Response['Success']  = true;
   header('Content-Type: application/json');
   echo json_encode($Response);
?>