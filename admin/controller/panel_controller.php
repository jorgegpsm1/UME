<?php
  class Panel_Controller{
    
    private $USER_ID;
    private $USER_INFO;
    private $USER_ACCESS;
    
    public function __construct(){
      $this->USER_ID        =   $_SESSION['ID'];
    }
    private function get_USER_INFO(){
      require_once($_SESSION['BASE_DIR_BACKEND'].'controller/class/user_info.php');
      $this->USER_INFO = new User_info();
    }
    private function get_USER_ACCESS(){
      require_once($_SESSION['BASE_DIR_BACKEND'].'controller/class/user_access.php');
      $this->USER_ACCESS = new User_access();
    }
    public function Initialize(){

    }
    public function __destruct(){
    }
  }
?>