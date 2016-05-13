<?php
  class Main_Controller{
    private static $Statement = '0';
    private static $Instance  = null;
    public function __construct(){
      die('No se instancian objetos');
    }
    private static function is_Cookies(){
      return (isset($_COOKIE['__ugate']) && isset($_COOKIE['__uanchor']) && isset($_COOKIE['__ukey']))  ?  1 : 0;
    }
    private static function is_Session(){
      return (isset($_SESSION['ID']) && isset($_SESSION['SESSION']))  ?  1 : 0;
    }
    private static function set_Statement(){
      if(self::is_Session()){
        self::$Statement = '3';
        return;
      }
      elseif(self::is_Cookies()) {
        self::$Statement = '2';
        return;
      }
      else{
        self::$Statement = '1';
        return;
      }
    }
    public static function Initialize(){
      self::set_Statement();
      switch(self::$Statement){ 
        case '1':
          require_once($_SESSION['BASE_DIR_BACKEND'].'/controller/login_controller.php');
          $Instance = new Login_Controller(self::$Statement);
          $Instance->Main();
          break;
        case '2':
          require_once($_SESSION['BASE_DIR_BACKEND'].'/controller/login_controller.php');
          break;
        case '3':
          require_once($_SESSION['BASE_DIR_BACKEND'].'/controller/panel_controller.php');
          break;
        default:
          break;
      }
    }
    public function __destruct(){
      die('No se instancian objetos');
    }
  }
  Main_Controller::Initialize();
?>

