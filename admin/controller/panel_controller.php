<?php
  class Panel_Controller{
    private static $USER_ID;
    private static $USER_SESSION;
    private static $USER_INFO;
    private static $USER_ACCESS;
    
    public function __construct(){
      die('No se instancian objetos');
    }
    /*private function get_USER_INFO(){
      require_once($_SESSION['BASE_DIR_BACKEND'].'/model/class/user_info_model.php');
      $this->USER_INFO = new User_Info_Model();
      $this->USER_INFO = $this->USER_INFO->get_Response();
    }*/
    private static function get_user_access(){
      require_once($_SESSION['BASE_DIR_BACKEND'].'/model/class/user_access_model.php');
      self::$USER_ACCESS = new User_Access_Model();
      self::$USER_ACCESS = self::$USER_ACCESS->get_Response();
    }
    private static function set_view(){
      require_once($_SESSION['BASE_DIR_BACKEND'].'/model/class/user_access_model.php');
      self::$USER_ACCESS = new User_Access_Model();
      self::$USER_ACCESS = $self::$USER_ACCESS->get_Response();
    }
    public static function Initialize(){
      self::$USER_ID        =   $_SESSION['ID'];
      self::$USER_SESSION   =   $_SESSION['SESSION'];
      self::get_user_access();
      require_once($_SESSION['BASE_DIR_BACKEND'].'/view/panel_view.php');
    }
    public function __destruct(){
      die('No se instancian objetos');
    }
  }
?>