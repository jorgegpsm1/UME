<?php
   @session_start();
   require_once($_SESSION['BASE_DIR_BACKEND'].'/model/config/database.php'); 
   $Connection   = Database::Connect();
	$Json = file_get_contents('php://input');
   $Input = json_decode($Json,true);
   $Query  					   =    array();
   $Query['SQL_A']			=    "INSERT INTO expedientes (nombre, apellido_paterno, apellido_materno, correo, edad, fecha, pacecimiento, domicilo, telefono, recomendo ,analisis) 
                                 VALUES (:NAME_A, :NAME_B, :NAME_C, :EMAIL, :EDA, :DAT, :PAD, :DOM, :TEL, :REC, :AN)";

   $Response   = array();
   $Response['Success']  = false;
   
   $result_2 = $Connection->prepare($Query['SQL_A']);
   $result_2->bindParam(':NAME_A',$Input['nombre']);
   $result_2->bindParam(':NAME_B',$Input['apellido_p']);
   $result_2->bindParam(':NAME_C',$Input['apellido_m']);
   $result_2->bindParam(':EMAIL',$Input['correo']);
   $result_2->bindParam(':EDA',$Input['edad']);
   $result_2->bindParam(':DAT',$Input['fecha']);
   $result_2->bindParam(':PAD',$Input['padecimiento']);
   $result_2->bindParam(':DOM',$Input['domicilo']);
   $result_2->bindParam(':TEL',$Input['telefono']);
   $result_2->bindParam(':REC',$Input['recomendo']);
   $result_2->bindParam(':AN',$Input['analisis']);
   $result_2->execute();
   $Response['Success']  = true;
   header('Content-Type: application/json');
   echo json_encode($Response);
