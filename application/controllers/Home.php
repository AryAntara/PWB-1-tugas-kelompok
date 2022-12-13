<?php 

/**
 *
 * Class for manage home 
 *
 * @create team_4 
 * @license MIT
 */
class Home extends CI_Controller {
  /**
   *
   * Contruct function for execute where class initilize
   *
   */ 
  public function __construct(){
    parent::__construct();
  }

  /**
   *
   * for display default view of home controller 
   *
   */ 
  public function index(){
    // load home views
     $this->template->display('home');
  }
}
