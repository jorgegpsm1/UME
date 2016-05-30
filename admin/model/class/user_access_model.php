<?php
  require_once($_SESSION['BASE_DIR_BACKEND'].'/model/login_model.php'); 
  class User_Access_Model{
    private $Request;
    private $Response;
    private $Connection;
    private $Query;
    private $Action;

    public function __construct(){
      $this->Connection   = Database::Connect();
      $this->Action       = '1';
    }
    private function set_Query($KEY_1 = 0, $KEY_2 = 0, $KEY_3 = 0){
      switch($this->Action){
        case '1':
          return ("SELECT id_department, department_status FROM department");
          break;

        case '1.1':
          return ("SELECT user_department_status FROM department_user_access_{$KEY_1} WHERE id_user = {$_SESSION['ID']}");
          break;

        case '2':
          return ("SELECT id_area, area_status FROM department_area_{$KEY_1}");
          break;

        case '2.1':
          return ("SELECT user_department_area_status FROM department_area_user_access_{$KEY_1}_{$KEY_2} WHERE id_user = {$_SESSION['ID']}");

          break;

      case '3':
          return ("SELECT ID_MODULE, MODULE_STATUS FROM DEPARTMENT_AREA_MODULES_{$KEY_1}_{$KEY_2}");
          break;

        case '3.1':
          return ("SELECT USER_DEPARTMENT_AREA_MODULE_ACCESS_STATUS FROM department_area_user_access_{$KEY_1}_{$KEY_2}_{$KEY_3} WHERE id_user = {$_SESSION['ID']}");
          break;

        default:
          break;
      }
    }
    public function get_Response(){
      $this->set_Response();
      return array($this->Response['DEPARTMENT']['DEPARTMENT_AREA_USER'],$this->Response['DEPARTMENT']['DEPARTMENT_AREA_USER_ACCESS']);
    }
    private function set_Response(){
      switch($this->Action){
        case '1':
        try{
          $this->Response['DEPARTMENT'] = array();
          $this->Response['DEPARTMENT']['DEPARTMENT_ACCESS'] = array();
          $this->Response['DEPARTMENT']['DEPARTMENT_USER_ACCESS'] = array();

          $result = $this->Connection->prepare($this->set_Query());
          $result->execute();
          while($row = $result->fetch(PDO::FETCH_ASSOC)){
            if($row['department_status'] == 1){
              array_push($this->Response['DEPARTMENT']['DEPARTMENT_ACCESS'],$row['id_department']);
            }
          }
          $result->closeCursor();

          $this->Action = '1.1';
          $Count = count($this->Response['DEPARTMENT']['DEPARTMENT_ACCESS']);
          for($x=0; $x<$Count; $x++){
            $result = $this->Connection->prepare($this->set_Query($this->Response['DEPARTMENT']['DEPARTMENT_ACCESS'][$x]));
            $result->execute();
            while($row = $result->fetch(PDO::FETCH_ASSOC)){
              if($row['user_department_status'] == 1){
                array_push($this->Response['DEPARTMENT']['DEPARTMENT_USER_ACCESS'],$this->Response['DEPARTMENT']['DEPARTMENT_ACCESS'][$x]);
              }
            }
          }
          $result->closeCursor();
          
          $this->Action = '2';
          $this->Response['DEPARTMENT']['DEPARTMENT_AREA'] = array();
          $this->Response['DEPARTMENT']['DEPARTMENT_AREA_ACCESS'] = array();
          $this->Response['DEPARTMENT']['DEPARTMENT_AREA_USER'] = array();
          $this->Response['DEPARTMENT']['DEPARTMENT_AREA_USER_ACCESS'] = array();
          
          $Count = count($this->Response['DEPARTMENT']['DEPARTMENT_USER_ACCESS']);

          for($x=0; $x<$Count; $x++){
            $this->Response['DEPARTMENT']['AREA_TEMP'] = array();
            $result = $this->Connection->prepare($this->set_Query($this->Response['DEPARTMENT']['DEPARTMENT_USER_ACCESS'][$x]));
            $result->execute();
            while($row = $result->fetch(PDO::FETCH_ASSOC)){
              if($row['area_status'] == 1){
                array_push($this->Response['DEPARTMENT']['AREA_TEMP'],$row['id_area']);
              }
            }
            if(!empty($this->Response['DEPARTMENT']['AREA_TEMP'])){
              array_push($this->Response['DEPARTMENT']['DEPARTMENT_AREA'],$this->Response['DEPARTMENT']['DEPARTMENT_USER_ACCESS'][$x]);
              array_push($this->Response['DEPARTMENT']['DEPARTMENT_AREA_ACCESS'],$this->Response['DEPARTMENT']['AREA_TEMP']);
            }
          }
          $result->closeCursor();

          $this->Action = '2.1';
          $Count_x = count($this->Response['DEPARTMENT']['DEPARTMENT_AREA']);
          
          for($x=0; $x<$Count_x; $x++){
            $this->Response['DEPARTMENT']['AREA_TEMP'][$x] = array();
              foreach($this->Response['DEPARTMENT']['DEPARTMENT_AREA_ACCESS'][$x] as $key){
                $result = $this->Connection->prepare($this->set_Query($this->Response['DEPARTMENT']['DEPARTMENT_AREA'][$x],$key));
                $result->execute();
                while($row = $result->fetch(PDO::FETCH_ASSOC)){
                  if($row['user_department_area_status'] == 1){
                    array_push($this->Response['DEPARTMENT']['AREA_TEMP'][$x], $key);
                  }
                }
              }
              if(!empty($this->Response['DEPARTMENT']['AREA_TEMP'][$x])){
                  array_push($this->Response['DEPARTMENT']['DEPARTMENT_AREA_USER'],$this->Response['DEPARTMENT']['DEPARTMENT_AREA'][$x]);
                  array_push($this->Response['DEPARTMENT']['DEPARTMENT_AREA_USER_ACCESS'],$this->Response['DEPARTMENT']['AREA_TEMP'][$x]);
              }
          }
          $result->closeCursor();
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
