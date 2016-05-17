<?php
  @session_start();
  require_once($_SESSION['BASE_DIR_BACKEND'].'/model/login_model.php');

  class Login_Trigger{
    private $Request;
    private $Response;
    private $Action;
    private $CRUD;
    public function __construct(){
      $this->Action = $_SESSION['ACTION'];
    }
    private function get_Request(){
    }
    private function set_Response(){

    }
    public function Initialize(){    

    }
    public function __destruct(){
    }
  }
?>
