<?php
  @session_start();
  require_once($_SESSION['BASE_DIR_BACKEND'].'/model/login_model.php');

  class Login_Trigger{
    private static $Request;
    private static $Response;
    private static $Model;

    public function __construct(){
      die('No se instancian objetos');
    }
    private static function get_Request(){
      switch ($_SESSION['ACTION']){
        case ('1'):
          $Json = file_get_contents('php://input');
          $Input = json_decode($Json,true);
          if(self::is_Request($Input)){
            self::$Request                      = $Input;
            self::$Request['NameUser']          = stripslashes(strip_tags(htmlspecialchars(trim(self::$Request['NameUser']))));
            self::$Request['PasswordUser']      = stripslashes(strip_tags(htmlspecialchars(trim(self::$Request['PasswordUser']))));
            self::$Request['CheckUser']         = stripslashes(strip_tags(htmlspecialchars(trim(self::$Request['CheckUser']))));
            self::$Request['PasswordUser']      = self::$Request['NameUser'].'?'.self::$Request['PasswordUser'].'?'.'uralvasm';
            self::$Response                     = null; 
          }
          else{
            die("Error Interno");
          }
        break;
        case ('1.1'):
          self::$Request['ID']                = self::$Response['ID'];
          self::$Response                     = null; 
        break;

        case ('1.2'):
          self::$Request['Sessions']          = self::$Response['Session'];
          self::$Request['Key']               = sha1(sha1(self::$Request['NameUser'].'?'.self::$Request['ID']).'?'.self::$Request['Sessions']);
          self::$Request['Ip']                = "192.168.0.{Random(0,254)}";
          self::$Request['Browser']           = 'Chrome'; 
          self::$Request['Temp']              = (!self::$Request['CheckUser']);
          self::$Response                     = null; 
        break;

        case ('2'):
          if(self::is_Request($_COOKIE)){
            self::$Request                      = $_COOKIE;
            self::$Request['__uanchor']         = stripslashes(strip_tags(htmlspecialchars(trim(self::$Request['__uanchor']))));
            self::$Request['__ugate']           = stripslashes(strip_tags(htmlspecialchars(trim(self::$Request['__ugate']))));
            self::$Request['__ukey']            = stripslashes(strip_tags(htmlspecialchars(trim(self::$Request['__ukey']))));
            self::$Response                     = null; 
          }
          else{
            die("Error Interno");
          }
          break;
      }
    }
    private static function set_Response(){
      switch ($_SESSION['ACTION']){
        case ('1'):
          self::$Model      = new Login_Model(); 
          self::$Response   = self::$Model->get_Response(self::$Request);

          if(self::$Response['Success']){
            $_SESSION['ACTION'] = '1.1';
            self::get_Request();
            self::$Response = self::$Model->get_Response(self::$Request);
            if(self::$Response['Success']){
              $_SESSION['ACTION'] = '1.2';
              self::get_Request();
              self::$Response = self::$Model->get_Response(self::$Request);

              if(self::is_Autologin()){
                self::set_Session();       
              }
              else{
                self::set_Session_temp();
              }
            }
          }
          self::$Model = null;
          header('Content-Type: application/json');
          echo json_encode(self::$Response);
          break;

        case ('2'):
          self::$Model    = new Login_Model(); 
          self::$Response = self::$Model->get_Response(self::$Request);
          if(!self::$Response['Success'])
            self::unset_Session();
          else{
            self::$Model = null;
            $_SESSION['ID']       = $_COOKIE['__ugate'];
            $_SESSION['SESSION']  = $_COOKIE['__uanchor'];
            header("Location: {$_SESSION['BASE_DIR_FRONTEND']}/index.php");
            exit();
          }
          break;
      }
    } 
    private static function is_Request($Request){
      return isset($Request) ? true : false;
    }
    private static function is_Autologin(){
      return (self::$Request['CheckUser'])? true : false;
    }
    private static function unset_Session(){
      setcookie('__ugate', null, time()-1000, '/');
      setcookie('__uanchor', null, time()-1000, '/');
      setcookie('__ukey', null, time()-1000, '/');
    }
    private static function set_Session(){
      header('Cache-control: private'); 
      header('Last-Modified: ' . gmdate("D, d M Y H:i:s") . ' GMT'); 
      header('Cache-Control: no-store, no-cache, must-revalidate'); 
      header('Cache-Control: post-check=0, pre-check=0', false); 
      header('Pragma: no-cache');

      $cookie_time = (10 * 365 * 24 * 60 * 60);
      setcookie('__ugate',self::$Request['ID'],time() + $cookie_time, '/');
      setcookie('__uanchor',self::$Request['Sessions'],time() + $cookie_time, '/');
      setcookie('__ukey',self::$Request['Key'],time() + $cookie_time, '/');
    }
    private static function set_Session_Temp(){
      header('Cache-control: private'); 
      header('Last-Modified: ' . gmdate("D, d M Y H:i:s") . ' GMT'); 
      header('Cache-Control: no-store, no-cache, must-revalidate'); 
      header('Cache-Control: post-check=0, pre-check=0', false); 
      header('Pragma: no-cache');

      $cookie_time = (60 * 20);
      setcookie('__ugate',self::$Request['ID'],time() + $cookie_time, '/');
      setcookie('__uanchor',self::$Request['Sessions'],time() + $cookie_time, '/');
      setcookie('__ukey',self::$Request['Key'],time() + $cookie_time, '/');
    }
    public static function Initialize(){    
      self::get_Request();
      self::set_Response();
    }
    public function __destruct(){
      die('No se instancian objetos');
    }
  }

  Login_Trigger::Initialize();

?>
