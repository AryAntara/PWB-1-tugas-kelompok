<?php 

class Signup extends CI_Controller { 
  function __contruct(){
    
  }
  public function index(){
    $this->template->render('signup');
    return "Hello World";
  }
}

?>
