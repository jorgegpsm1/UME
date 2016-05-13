<?php
  @session_start();
  require_once($_SESSION['BASE_DIR_BACKEND'].'/model/login_model.php');

  class Login_Trigger{
    private $Request;
    private $Response;
    private $CRUD;

    public function __construct(){
      $this->CRUD = new Login_Model(); 
      echo "Constructor"; 
    }
    private function get_Request(){
      switch ($_SESSION['ACTION']){
        case '1':
          $this->Request = null;
          $Json = file_get_contents('php://input');
          $Input = json_decode($Json,true);
          if($this->is_Request($Input)){
            $this->Request                      = $Input;
            $this->Request['NameUser']          = stripslashes(strip_tags(htmlspecialchars(trim($this->Request['NameUser']))));
            $this->Request['PasswordUser']      = stripslashes(strip_tags(htmlspecialchars(trim($this->Request['PasswordUser']))));
            $this->Request['CheckUser']         = stripslashes(strip_tags(htmlspecialchars(trim($this->Request['CheckUser']))));
            $this->Request['PasswordUser']      = $this->Request['NameUser'].'?'.$this->Request['PasswordUser'].'?'.'0';
            $this->Response                     = null; 
          }
          else{
            die("Error Interno");
          }
          break;
        case '1.1':
          $this->Request['ID']                = $this->Response['ID'];
          $this->Response                     = null; 
        break;

        case '1.2':
          $this->Request['Sessions']          = $this->Response['Sessions'];
          $this->Request['Keys']              = sha1(sha1($this->Request['NameUser'].'?'.$this->Request['ID']).'?'.$this->Response['Sessions']);
          $this->Request['Temp']              = (!$this->Request['CheckUser']);
          $this->Response                     = null; 
        break;

        case '2':
          if($this->is_Request($_COOKIE)){
            $this->Request                      = $_COOKIE;
            $this->Request['__uanchor']         = stripslashes(strip_tags(htmlspecialchars(trim($this->Request['__uanchor']))));
            $this->Request['__ugate']           = stripslashes(strip_tags(htmlspecialchars(trim($this->Request['__ugate']))));
            $this->Request['__ukey']            = stripslashes(strip_tags(htmlspecialchars(trim($this->Request['__ukey']))));
            $this->Response                     = null; 
          }
          else{
            die("Error Interno");
          }
          break;
        default:
          break;
      }
    }
    private function set_Response(){
      switch ($_SESSION['ACTION']){
        case '1':
          $this->Response = $this->CRUD->get_Response($this->Request);

          if($this->Response['Success']){
            $_SESSION['ACTION'] = '1.1';
            $this->get_Request();
            $this->Response = $this->CRUD->get_Response($this->Request);
            if($this->Response['Success']){
              
              $_SESSION['ACTION'] = '1.2';
              $this->get_Request();
              $this->Response = $this->CRUD->get_Response($this->Request);

            if($this->is_Autologin())
              $this->set_Session();       
            else
              $this->set_Session_temp();
              
            }
          }
          unset($this->CRUD);
          header('Content-Type: application/json');
          echo json_encode($this->Response);
          break;

        case '2':
          $this->Response = $this->CRUD->get_Response($this->Request);
          if(!$this->Response['Success'])
            $this->unset_Session();
          else
            header("Location: {$_SESSION['BASE_DIR_FRONTEND']}/controllers/panel.php");

          break;

        default:
          break;
      }
    } 
    private function is_Request($Request){
      return isset($Request) ? true : false;
    }
    private function is_Autologin(){
      return ($this->Request['CheckUser'])? true : false;
    }
    private function unset_Session(){
      setcookie('__ugate', null, time()-1000, '/');
      setcookie('__uanchor', null, time()-1000, '/');
      setcookie('__ukey', null, time()-1000, '/');
    }
    private function set_Session(){
      header('Cache-control: private'); 
      header('Last-Modified: ' . gmdate("D, d M Y H:i:s") . ' GMT'); 
      header('Cache-Control: no-store, no-cache, must-revalidate'); 
      header('Cache-Control: post-check=0, pre-check=0', false); 
      header('Pragma: no-cache');

      $cookie_time = (10 * 365 * 24 * 60 * 60);
      setcookie('__ugate',$this->Request['ID'],time() + $cookie_time, '/');
      setcookie('__uanchor',$this->Request['Sessions'],time() + $cookie_time, '/');
      setcookie('__ukey',$this->Request['Keys'],time() + $cookie_time, '/');
    }
    private function set_Session_temp(){
      header('Cache-control: private'); 
      header('Last-Modified: ' . gmdate("D, d M Y H:i:s") . ' GMT'); 
      header('Cache-Control: no-store, no-cache, must-revalidate'); 
      header('Cache-Control: post-check=0, pre-check=0', false); 
      header('Pragma: no-cache');

      $cookie_time = (60 * 20);
      setcookie('__ugate',$this->Request['ID'],time() + $cookie_time, '/');
      setcookie('__uanchor',$this->Request['Sessions'],time() + $cookie_time, '/');
      setcookie('__ukey',$this->Request['Keys'],time() + $cookie_time, '/');
    }
    public function Initialize(){    
      switch ($_SESSION['ACTION']){
        case '1':
          $this->get_Request();
          $this->set_Response();
          break;
        case '2':
          $this->get_Request();
          $this->set_Response();
          break;
        default:
          break;
      }
    }
    public function __destruct(){
      
    }
  }
  if($_SESSION['ACTION'] ==  1){
    $Instance = new Login_Trigger();
    $Instance->Initialize();
  }
?>
