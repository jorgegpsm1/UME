<?php
  class Panel{

    public function __construct(){
           
    }
    private function is_Session(){
      return (isset($_COOKIE['__ugate']) && isset($_COOKIE['__uanchor']) && isset($_COOKIE['__ukey']))  ?  true : false;
    }
    private function load_views($view){
      switch($view){
        case 'index':
          $_SESSION['ACTION'] = '1';
          require_once($_SESSION['BASE_DIR_BACKEND'].'/views/login.php');
          break;
        default: 
          break;
      }
    }
    private function load_controller($controller){
      switch($controller){
        case 'index':
          $_SESSION['ACTION'] = '2';
          require_once($_SESSION['BASE_DIR_BACKEND'].'/controllers/triggers/login.php');
          break;
        default: 
          break;
      }
    }
    public function Main(){
      if($this->is_Session()){
        $this->load_controller($_SESSION['BASE_FILE']);
      }
      else{
        $this->load_views($_SESSION['BASE_FILE']);
      }
    }
    public function __destruct(){
    }
  }
  echo "Jorge";
?>