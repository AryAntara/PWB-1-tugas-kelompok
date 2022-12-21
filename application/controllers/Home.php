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
    // load home views
    $this->template->display('home',$data);
  }
}
