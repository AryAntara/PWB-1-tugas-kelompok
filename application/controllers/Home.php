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
    $this->load->model('M_product');
    $this->load->model('M_user');

  }

  /**
   *
   * for display default view of home controller 
   *
   */ 
  public function index(){
    $data = [];
    $data['product_rekomendasi'] = array_slice($this->M_product->get_product(),0,4);
    $data['product_popular'] = array_slice($this->M_product->get_product(),5,9);

    // check user has login or not
    $data['likes_product'] = [];
    if($this->tool->validate_login(false) == true){
      $data['likes_product'] = json_decode($this->M_user->get_user($this->session->userdata('email'))->favorit);
    } 
    // load home views
    $this->template->display('home',$data);
  }
}
