<?php 

class Login extends CI_Controller { 
  function __contruct(){
    
  }
  public function index(){
    $this->template->render('login');
    return "Hello World";
  }
}

?>
