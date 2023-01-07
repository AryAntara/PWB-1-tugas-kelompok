<?php
/**
 * 
 * Class for handle delete item from cart
 * 
 */
Class Delete extends CI_Controller {

    function __construct(){
        parent::__construct();
    }

    /**
     * 
     * Delete item 
     * 
     */
    function index(){
        $id_product = $this->input->post('id');
        $this->remove_product($id_product);
    }

    /**
     * 
     * Remove product from cart by id 
     * @param int $id_product
     * 
     */
    private function remove_product($id_product){

        // total
        $total = 0;
        $selected = 0;

        // do foreach to find product id 
        $products = $this->cart->contents();
        foreach($products as $product){
            if($product['id'] == $id_product){
                $this->cart->update([
                    'rowid' => $product['rowid'],
                    'qty' => 0
                ]);
            } else {
                if($product['options']['is_selected']){
                    $selected++;
                    $total += $product['price'] * $product['qty'];
                }
            }
        }

        if(!$this->cart->contents()){
            echo json_encode(['redirect' => base_url().'cart/detail']);
        } else {
            echo json_encode([
                'redirect' => null,
                'last_price'=>'Rp. '.number_format($total,0,',','.'),
                'select_all' => $selected == count($this->cart->contents()) 
            ]);
        }
    }
}


