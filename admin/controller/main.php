<?php
  class Main{
    private static $Statement = '0';
    public function __construct(){
      die('No se instancian objetos');
    }
    private static function is_Cookies(){
      return (isset($_COOKIE['__ugate']) && isset($_COOKIE['__uanchor']) && isset($_COOKIE['__ukey']))  ?  1 : 0;
    }
    private static function is_Session(){
      return (isset($_SESSION['ID']) && isset($_COOKIE['SESSION']))  ?  1 : 0;
    }
    private static function set_Statement(){
      if(self::is_Session()){
        self::$Statement = '2';
        return;
      }
      elseif(self::is_Cookies()) {
        self::$Statement = '1';
        return;
      }
      else{
        self::$Statement = '0';
        return;
      }
    }
    public static function Initialize(){
      self::set_Statement();
      switch(self::$Statement){ 
        case '0':
          require_once(BASE_DIR_BACKEND.'/controller/login.php');
          $Instance = new Login(self::$Statement);
          $Instance->Main();
          break;
        case '1':
          require_once(BASE_DIR_BACKEND.'/controller/login.php');
          break;
        case '2':
          require_once(BASE_DIR_BACKEND.'/controller/panel.php');
          break;
        default:
          break;
      }
    }
    public function __destruct(){
    }
  }
  Main::Initialize();
?>

