<?php
   @session_start();
   require_once($_SESSION['BASE_DIR_BACKEND'].'/model/config/database.php'); 
   $Connection   = Database::Connect();
   $Json = file_get_contents('php://input');
   $Input = json_decode($Json,true);
   $Query                   =    array();
   $Query['SQL_A']          =    "DELETE FROM expedientes WHERE id_expediente = {$Input['urls']}";
   $Response   = array();
   $Response['Success']  = false;
   $result_1 = $Connection->prepare($Query['SQL_A']);
   $result_1->execute();
   $Response['Success']  = true;
   header('Content-Type: application/json');
   echo json_encode($Response);
?>