<?php 
/**
 * 
 * Class for handle liked product 
 * 
 */
class Favorite extends CI_Controller {
  /**
   * 
   * constructor 
   * 
   */
  public function __construct(){
    parent::__construct();
    $this->load->model('M_user');
  }
  /**
   * 
   * make the current product like by user
   * 
   * @request int $id_product
   * 
   */
  public function index(){

    // get data from post 
    $product_id = $this->input->post('id_product');
    
    // call method on model
    $this->M_user->set_favorite($product_id,$this->session->userdata('id'));
  }
}
