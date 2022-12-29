<?php 
/**
 * 
 * Class for manage detail product 
 *  
 */
class Detail extends CI_Controller {
  public function __construct()
  {
    parent::__construct();
    $this->load->model('M_product');
    $this->load->model('M_user');
  }

  /**
   * 
   * function for handler view  
   * 
   */
  public function index(){
    $product_id = $this->input->get('product_id'); 
    $data['product'] = $this->M_product->get_by_id($product_id);

    // check user has login or not
    $data['likes_product'] = [];
    if($this->tool->validate_login(false) == true){
      $data['likes_product'] = json_decode($this->M_user->get_user($this->session->userdata('email'))->favorit);
    } 

    // load product detail view 
    $this->template->display('product_detail',$data);

  }
} 
?>
