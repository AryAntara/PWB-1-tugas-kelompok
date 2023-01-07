<?php 

/**
 * 
 * class for handle update product
 * 
 */
Class update extends CI_Controller {
    /**
     * 
     * update existing product 
     * 
     */
    function index(){

        // get id product
        $id_product = $this->input->post('id');
        $qty_update = $this->input->post('qty');

        // total 
        $total = 0;

        // update it on cart
        foreach($this->cart->contents() as $item){
            
            if($item['id'] == $id_product){

                // if current product to update is selected
                if($item['options']['is_selected']){
                     $total += $item['price'] * $qty_update;
                }

                $data = [
                    'qty' => $qty_update,
                    'rowid' => $item['rowid']
                ];
                $this->cart->update($data);
            } else {
                // check if product is selected 
                if($item['options']['is_selected']){
                     $total += $item['price'] * $item['qty'];
                }
            }
            
        }

        echo json_encode(['last_price' => 'Rp. '.number_format($total,0,',','.')]);


    }
}