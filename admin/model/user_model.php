<?php
  require_once($_SESSION['BASE_DIR_BACKEND'].'/model/config/database.php');

  class User_Model{
    private $Request;
    private $Response;
    private $Connection;
    private $Query;
    private $Action;

    public function __construct(){
      $this->Connection   = Database::Connect();
    }
    private function get_Request(){
    }
    private function set_Response(){

    }
    public function Initialize(){    
      switch($_SESSION['ACTION_USER']){
        case '1':
          break;
        case '2':
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

