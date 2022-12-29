<?php 
/**
 * 
 * Class for add product to cart
 * 
 */
class Add extends CI_Controller {

    function __construct(){
        parent::__construct();
        $this->load->model('M_product');
    }
    /**
     * 
     * add product to cart session
     * 
     */
    function index(){

        // validate the user 
        // if not login stop process
        if($this->tool->validate_login() == false){
            return;
        };

        $updated = false;

        // product data
        $product = [];
        $product['id'] = $this->input->post('id');
        $product['qty'] = $this->input->post('qty');
        $product['price'] = $this->M_product->get_price($product['id']);
        $product['name'] = $this->M_product->get_title($product['id']);
        $product['options']['gambar_produk'] = $this->M_product->get_img($product['id']);
        $product['options']['is_selected'] = true;
        // product list 
        $product_list = $this->cart->contents();

        // update product if exist on cart 
        foreach ($product_list as $item) {
            if($item['id'] === $product['id']) {
                // update qty 
                $item['qty'] += $product['qty'];

                // update cart
                $this->cart->update([
                    'rowid' => $item['rowid'],
                    'qty' => $item['qty']
                ]);
                // set update to true
                $updated = true;
                // send response with 204 code 
                echo json_encode(['status' => 'success','msg' => 'update the existing item', 'code' => '206']);
            } 
        }

        // if not exist on cart
        if($updated === false){
            $this->cart->insert($product);
            // send reponse with 205 code 
            echo json_encode(['status' => 'success','msg' => 'add item to cart','code' => '205']);
            return;
        }
    }
}