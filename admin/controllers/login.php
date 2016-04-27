<?php
  class Login{
    private  $Views       =   null;
    private  $Controllers =   null; 
    private  $Cookies     =   null; 

    public function __construct(){
      $this->Views          =[
                            'index'      => $_SESSION['BASE_FILE']
                             ];
      $this->Controllers    =[
                             'index'     => $_SESSION['BASE_FILE']
                             ];                
    
    }
    private function is_Session(){
      return (isset($_COOKIE['__ugate']) && isset($_COOKIE['__uanchor']) && isset($_COOKIE['__ukey']))    
              ||
             (isset($_SESSION['__ugate']) && isset($_SESSION['__uanchor']) && isset($_SESSION['__ukey']))
              ?  true : false;
    }
    private function load_views($view){
      switch($view){
        case $this->Views['index']:
          $_SESSION['ACTION'] = '1';
          require_once($_SESSION['BASE_DIR_BACKEND'].'/views/login.php');
          break;
        default: 
          break;
      }
    }
    private function load_controller($controller){
      switch($controller){
        case $this->Views['index']:
          $_SESSION['ACTION'] = '2';
          require_once($_SESSION['BASE_DIR_BACKEND'].'/controllers/triggers/login.php');
          break;
        default: 
          break;
      }
    }
    public function Main(){
      if($this->is_Session()){
        $this->load_controller('index');
      }
      else{
        $this->load_views('index');
      }
    }
    public function __destruct(){
    }
  }
  $Instance = new Login();
  $Instance->Main();
?>