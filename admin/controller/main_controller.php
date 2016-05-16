<?php
  class Main_Controller{
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
    private static function set_Action(){
      if(self::is_Session()){
        $_SESSION['ACTION'] = '3';
        return;
      }
      elseif(self::is_Cookies()) {
        $_SESSION['ACTION'] = '2';
        return;
      }
      else{
        $_SESSION['ACTION'] = '1';
        return;
      }
    }
    public static function Initialize(){
      self::set_Action();
      switch($_SESSION['ACTION']){ 
        case ('1' || '2'):
          require_once($_SESSION['BASE_DIR_BACKEND'].'/controller/login_controller.php');
          $Instance = new Login_Controller();
          $Instance->Initialize();
          break;
        case '3':
          require_once($_SESSION['BASE_DIR_BACKEND'].'/controller/panel_controller.php');
          $Instance = new Login_Controller();
          $Instance->Main();
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

