<?php 
/**
 * Class for login user 
 *
 * @create Team_4
 * @lincense MIT 
 */
class Auth extends CI_Controller { 
  function __construct(){
    parent::__construct();
    $this->load->library('form_validation');
    $this->load->model('M_user');
  }

  /** 
   * Display view of login 
   *
   */ 
  public function index(){
    $this->template->render('admin/login');
  }
}