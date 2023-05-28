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
    $this->load->model('M_product');
    $this->load->library('template');
  }
  
  /**
   * 
   * make the current product like by user
   * @request int $id_product
   * 
   */
  public function index(){

    // validate the user 
    // if not login stop process
    if($this->tool->validate_login() == false){
      return;
    };

    // get data from post 
    $product_id = $this->input->post('id_product');
    
    // call method on model
    $this->M_user->set_favorite($product_id,$this->session->userdata('id'));
    echo json_encode(['status' => 'success','msg' => 'success add item to favorite','code' => '203']);
  }

  /**
   * 
   * remove the current product from the user favorite list
   * @request int $id_product
   *  
   */
  public function discard(){

    // validate the user 
    // if not login stop process
    if($this->tool->validate_login() == false){
      return;
    };

    // get data from post 
    $product_id = $this->input->post('id_product');

    // call method on model 
    $this->M_user->remove_favorite($product_id,$this->session->userdata('id'));
    echo json_encode(['status' => 'success','msg' => 'success remove from favorite','code' => '202']);
  }

  function page(){
    $products = $this->M_product->get_product();
    $data['products'] = []; 
    $data['likes_product'] = json_decode($this->M_user->get_user($this->session->userdata('email'))->favorit) ? json_decode($this->M_user->get_user($this->session->userdata('email'))->favorit) : [];
    foreach ($products as $product) {
        if (in_array($product->id_produk, $data['likes_product'])) {
            $data['products'][] = $product;
        }
    }
    echo $this->template->display('favorite', $data);
  }
}
