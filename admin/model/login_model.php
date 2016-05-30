<?php
  require_once($_SESSION['BASE_DIR_BACKEND'].'/model/config/database.php');
  class Login_Model{
    private $Request;
    private $Response;
    private $Connection;
    private $Query;

    
    public function __construct(){
      $this->Connection   = Database::Connect();
    }
    private function set_Query(){
      switch ($_SESSION['ACTION']){
        case ('1'):
          $this->Query['SQL_A']       = "SELECT id_user, user_login_name, user_login_pass, user_status  FROM user_access";
          break;
        case ('1.1'):
          $this->Query['SQL_A']       = "SELECT id_user, user_sessions, user_session_pass FROM user_session_access";
          $this->Query['SQL_B']       = "UPDATE user_session_access SET user_sessions = :SESSION WHERE id_user = :ID";
          break;

        case ('1.2'):
          $this->Query['SQL_A']       = "INSERT INTO user_sessions_access_{$this->Request['ID']} (id_session, user_key, user_ip, user_browser, user_session_temp) 
                                                                                          VALUES (:SESSION, :KEY, :IP, :BROWSER, :SESSION_TEMP)";
          break;

        case ('2'):
          $this->Query['SQL_A']       = "SELECT  id_session, user_key FROM  user_sessions_access_{$this->Request['__ugate']}";
          break;

        default:
          break;
      }
    }
    private function get_Request($Request){
      $this->Request    = $Request;
      $this->Response   = null;
      $this->Query      = null;
    }
    public function get_Response($Input){
      $this->get_Request($Input);
      $this->set_Query();
      $this->set_Response();
      return $this->Response;
    }
    private function set_Response(){
      switch($_SESSION['ACTION']){ 
        case ('1'):
          try{
            $this->Response['Success'] = false;
            $result_1 = $this->Connection->prepare($this->Query['SQL_A']);
            $result_1->execute();
            while($row = $result_1->fetch(PDO::FETCH_ASSOC)){
              if($row['user_login_name'] == $this->Request['NameUser']){
                if(password_verify($this->Request['PasswordUser'],$row['user_login_pass']) && $row['user_status'] == 1){
                  $this->Response['Success'] = true;
                  $this->Response['ID']   = $row['id_user'];
                  break;
                }
              }
            }
          }
          catch(PDOException $e){
            echo "DataBase Error: The user could not be added.<br>".$e->getMessage();
          }
          catch(Exception $e){
            echo "General Error: The user could not be added.<br>".$e->getMessage();
          }
          break;

          case ('1.1'):
          $this->Response['Success'] = false;
          try{
            $result_1 = $this->Connection->prepare($this->Query['SQL_A']);
            $result_2 = $this->Connection->prepare($this->Query['SQL_B']);
            $result_1->execute();
            while($row = $result_1->fetch(PDO::FETCH_ASSOC)){
              if($row['id_user'] == $this->Request['ID']){
                $this->Response['ID']       = $row['id_user'];
                $this->Response['Session']  = $row['user_sessions'];
                $this->Response['Key']      = $row['user_session_pass'];
                $this->Response['Session']+=1;
                break;
                }
              }
            $result_2->bindParam(':ID',$this->Response['ID']);
            $result_2->bindParam(':SESSION',$this->Response['Session']);
            $result_2->execute();
            $this->Response['Success']  = true;
          }
          catch(PDOException $e){
            echo "DataBase Error: The user could not be added.<br>".$e->getMessage();
          }
          catch(Exception $e){
            echo "General Error: The user could not be added.<br>".$e->getMessage();
          }
          break;
        case ('1.2'):
          try{
            $this->Response['Success'] = false;
            $result_1 = $this->Connection->prepare($this->Query['SQL_A']);
            $result_1->bindParam(':SESSION',$this->Request['Sessions']);
            $result_1->bindParam(':KEY',$this->Request['Key']);
            $result_1->bindParam(':IP',$this->Request['Ip']);
            $result_1->bindParam(':BROWSER',$this->Request['Browser']);
            $result_1->bindParam(':SESSION_TEMP',$this->Request['Temp']);
            $result_1->execute();
            $this->Response['Success']  = true;
          }
          catch(PDOException $e){
            echo "DataBase Error: The user could not be added.<br>".$e->getMessage();
          }
          catch(Exception $e){
            echo "General Error: The user could not be added.<br>".$e->getMessage();
          }
          break;

        case ('2'):
          try{
            $this->Response['Success'] = false;
            $result = $this->Connection->prepare($this->Query['SQL_A']);
            $result->execute();
            while($row = $result->fetch(PDO::FETCH_ASSOC)){
              if($row['id_session'] == $this->Request['__uanchor']){
                if($row['user_key'] == $this->Request['__ukey']){
                  $this->Response['Success']  = true;
                  break;
                }
              }
            }
          }
          catch(PDOException $e){
            echo "DataBase Error: The user could not be added.<br>".$e->getMessage();
          }
          catch(Exception $e){
            echo "General Error: The user could not be added.<br>".$e->getMessage();
          }
          break;

        default:
          break;
      }
    }
    public function __destruct(){
      Database::Disconnect();
    }
  }
?>
