<?php
   @session_start();
   require_once($_SESSION['BASE_DIR_BACKEND'].'/model/config/database.php'); 
   $Connection   = Database::Connect();
	$Json = file_get_contents('php://input');
   $Input = json_decode($Json,true);
   $Query  					   =    array();
   $Query['SQL_A']   		=    "SELECT COUNT(id_user) as VAL FROM user_access";
   $Query['SQL_B']			=    "INSERT INTO user_session_access (id_user, user_session_pass VALUES (:USER_ID, :USER_PASS)";


   $Input['NameUser'];
   $Input['PasswordUser']     = password_hash($Input['NameUser'].'?'.$Input['PasswordUser'].'?'.'uralvasm',PASSWORD_DEFAULT);;
   

   $result_1 = $Connection->prepare($Query['SQL_A']);
   $result_1->execute();
   while($row = $result_1->fetch(PDO::FETCH_ASSOC)){
      $VAL = $row['VAL'];
   }
   /*$result_1 = $Connection->prepare($Query['SQL_B']);
   $result_1->execute();*/
   header('Content-Type: application/json');
   echo json_encode($Input);
?>