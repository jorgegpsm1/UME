<?php
   @session_start();
   require_once($_SESSION['BASE_DIR_BACKEND'].'/model/config/database.php'); 
   $Connection   = Database::Connect();
	$Json = file_get_contents('php://input');
   $Input = json_decode($Json,true);
   $Query  					   =    array();
   $Query['SQL_A']   		=    "SELECT COUNT(id_user) as VAL FROM user_access";
   $Query['SQL_B']			=    "INSERT INTO user_access (id_user, user_login_name, user_login_pass) VALUES (:USER_ID, :USER_NAME, :USER_PASS)";
   $Query['SQL_C']         =    "INSERT INTO user_session_access (id_user, user_sessions, user_session_pass) VALUES (:USER_IDS, :USER_SESSION, :USER_PASSS)";
   $Query['SQL_Z']         =    "SELECT COUNT(id_department) as VALS FROM department";

   $Response   = array();
   $VAL = null;
   $Response['Success']    = false;
   $Input['PasswordUser']  = password_hash($Input['NameUser'].'?'.$Input['PasswordUser'].'?'.'uralvasm',PASSWORD_DEFAULT);

   $result_1 = $Connection->prepare($Query['SQL_A']);
   $result_1->execute();
   while($row = $result_1->fetch(PDO::FETCH_ASSOC)){
      $VAL = $row['VAL'];
   }
   $VAL++;
   $Query['SQL_X'] = "create table IF NOT EXISTS user_sessions_access_{$VAL}(
   id_session tinyint unsigned NOT NULL,
   user_key  varchar(255) NOT NULL,
   user_date_created TIMESTAMP ,
   user_date_current TIMESTAMP,
   user_date_temp TIMESTAMP,
   user_ip varchar(40) NOT NULL,
   user_browser varchar(255) NOT NULL,
   user_session_temp tinyint(1) NOT NULL DEFAULT 1,
   UNIQUE (id_session)
)ENGINE=InnoDB CHARACTER SET utf8 COLLATE utf8_spanish2_ci;";
   $result_40 = $Connection->prepare($Query['SQL_X']);
   $result_40->execute();

   $result_2 = $Connection->prepare($Query['SQL_B']);
   $result_2->bindParam(':USER_ID',$VAL);
   $result_2->bindParam(':USER_NAME',$Input['NameUser']);
   $result_2->bindParam(':USER_PASS',$Input['PasswordUser']);
   $result_2->execute();

   $USER_SESSION=0;
   $dos='fdsfksdl';

   $result_3 = $Connection->prepare($Query['SQL_C']);
   $result_3->bindParam(':USER_IDS',$VAL);
   $result_3->bindParam(':USER_SESSION',$USER_SESSION);
   $result_3->bindParam(':USER_PASSS',$dos);
   $result_3->execute();

   $VALS = null;
   $result_4 = $Connection->prepare($Query['SQL_Z']);
   $result_4->execute();
   while($row = $result_4->fetch(PDO::FETCH_ASSOC)){
      $VALS = $row['VALS'];
   }
   $USER_DP_STATUS=0;
   for($x=1; $x<=$VALS; $x++) {
     if($Input['DepartmentUser'] == $x){
      $USER_DP_STATUS=1;
     }
   $Query['SQL_D']         =    "INSERT INTO department_user_access_{$x} (id_user, user_department_status) VALUES (:USER_ID_S, :USER_DP_STATUS)"; 
   $result_4 = $Connection->prepare($Query['SQL_D']);
   $result_4->bindParam(':USER_ID_S',$VAL);
   $result_4->bindParam(':USER_DP_STATUS',$USER_DP_STATUS);
   $result_4->execute();
   $USER_DP_STATUS=0;
   }

   $Response['Success']  = true;
   header('Content-Type: application/json');
   echo json_encode($Response);
?>