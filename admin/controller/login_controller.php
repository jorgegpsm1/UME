<?php
  class Login_Controller{
    private $Action = null;
    public function __construct($Statement){
      $_SESSION['ACTION'] = $Statement;
    }
    private function load_views(){
      switch($_SESSION['ACTION']){
        case '1':
          require_once($_SESSION['BASE_DIR_BACKEND'].'/view/login_view.php');
          break;
        case '2':
          require_once($_SESSION['BASE_DIR_BACKEND'].'/view/panel_login.php');
          break;
        default: 
          break;
      }
    }
    private function load_controller(){
      switch($_SESSION['ACTION']){
        case '1':
          require_once($_SESSION['BASE_DIR_BACKEND'].'/controller/trigger/login_trigger.php');
          break;
        case '2':
          require_once($_SESSION['BASE_DIR_BACKEND'].'/controller/trigger/login_trigger.php');
          break;
        default: 
          break;
      }
    }
    public function Main(){
      switch($_SESSION['ACTION']){
        case '1':
          $this->load_views();
          break;
        case '2':
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