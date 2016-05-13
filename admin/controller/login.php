<?php
  class Login{
    private $ACTION = null;
    public function __construct($Statement){
      $_SESSION['ACTION'] = $Statement;
    }
    private function load_views(){
      switch($_SESSION['ACTION']){
        case '0':
          require_once($_SESSION['BASE_DIR_BACKEND'].'/view/login.php');
          break;
        default: 
          break;
      }
    }
    private function load_controller(){
      switch($_SESSION['ACTION']){
        case '1':
          require_once($_SESSION['BASE_DIR_BACKEND'].'/controller/trigger/login.php');
          break;
        default: 
          break;
      }
    }
    public function Main(){
      switch($_SESSION['ACTION']){
        case '0':
          $this->load_views();
          break;
        case '1':
          $this->load_controller();
          break;
        default:
          break;
      }
    }
    public function __destruct(){
    }
  }
?>