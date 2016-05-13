<?php
  require_once($_SESSION['BASE_DIR_BACKEND'].'/model/config/database.php');
  class Crud{
    private $Connection;
    private $Request;
    private $Response;
    private $Query;
    
    public function __construct(){
      $this->Connection   = Database::connect();
    }
    private function set_Query(){
      $this->Query        = null;
      switch ($this->Request['Action']){
        case '1':
          $this->Query['SQL_A']       = "SELECT ID_USER AS ID, USER_LOGIN AS USER, USER_PASS AS PASS FROM USER";
          break;

        case '1.1':
          $this->Query['SQL_A']       = "SELECT ID_USER AS ID, USER_SESSIONS AS SESSIONS, USER_SESSION_KEY AS SESSION_KEY FROM USER_MULTIPLE";
          $this->Query['SQL_B']       = "UPDATE  USER_MULTIPLE SET USER_SESSIONS = :SESSIONS WHERE ID_USER = :ID";
          break;

        case '1.2':
          $this->Query['SQL_A']       = "INSERT INTO USER_MULTIPLE_ACCESS_{$this->Request['ID']} (ID_SESSION, USER_KEY, USER_TEMP) VALUES (:SESSION, :KEYS, :TEMP)";
          break;

        case '2':
          $this->Query['SQL_A']       = "SELECT  ID_SESSION AS SESSION, USER_KEY AS PASS FROM  USER_MULTIPLE_ACCESS_{$this->Request['__ugate']}";
          break;

        default:
          break;
      }
    }
    private function get_Request($Request){
      $this->Request = $Request;
    }
    public function get_Response($Input){
      $this->get_Request($Input);
      $this->set_Query();
      $this->set_Response();
      return $this->Response;
    }
    private function set_Response(){
      $this->Response   = null;
      switch($this->Request['Action']){ 
        case '1':
          try{
            $this->Response['Success'] = false;
            $result = $this->Connection->prepare($this->Query['SQL_A']);
            $result->execute();
            while($row = $result->fetch(PDO::FETCH_ASSOC)){
              if($row['USER'] == $this->Request['NameUser']){
                if(password_verify($this->Request['PasswordUser'],$row['PASS'])){
                  $this->Response['Success'] = true;
                  $this->Response['ID']   = $row['ID'];
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

          case '1.1':
          $this->Response['Success'] = false;
          try{
            $result_1 = $this->Connection->prepare($this->Query['SQL_A']);
            $result_2 = $this->Connection->prepare($this->Query['SQL_B']);

            $result_1->execute();
            while($row = $result_1->fetch(PDO::FETCH_ASSOC)){
              if($row['ID'] == $this->Request['ID']){
                $this->Response['ID']       = $row['ID'];
                $this->Response['Sessions'] = $row['SESSIONS'];
                $this->Response['Key']      = $row['SESSION_KEY'];
                $this->Response['Sessions']+=1;
                break;
                }
              }

            $result_2->bindParam(':ID',$this->Response['ID']);
            $result_2->bindParam(':SESSIONS',$this->Response['Sessions']);
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
        case '1.2':
          try{
            $this->Response['Success'] = false;
            $result = $this->Connection->prepare($this->Query['SQL_A']);
            $result->bindParam(':SESSION',$this->Request['Sessions']);
            $result->bindParam(':KEYS',$this->Request['Keys']);
            $result->bindParam(':TEMP',$this->Request['Temp']);
            $result->execute();

            $this->Response['Success']  = true;
          }
          catch(PDOException $e){
            echo "DataBase Error: The user could not be added.<br>".$e->getMessage();
          }
          catch(Exception $e){
            echo "General Error: The user could not be added.<br>".$e->getMessage();
          }
          break;

        case '2':
          try{
            $this->Response['Success'] = false;
            $result = $this->Connection->prepare($this->Query['SQL_A']);
            $result->execute();
            while($row = $result->fetch(PDO::FETCH_ASSOC)){
              if($row['SESSION'] == $this->Request['__uanchor']){
                if($row['PASS'] == $this->Request['__ukey']){
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
      Database::disconnect();
    }
  }
?>
