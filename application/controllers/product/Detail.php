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
  }

  /**
   * function for handler view  
   */
  public function index(){
    $product_id = $this->input->get('product_id'); 
    $data['product'] = $this->M_product->get_by_id($product_id);

    // load product detail view 
    $this->template->display('product_detail',$data);

  }
} 
?>
