<?php 

/**
 * 
 * Class for handel check and uncheck product from cart
 * 
 */
class Check extends CI_Controller { 
    /**
     * 
     * checked a product in cart
     * 
     */
    function index(){

        // total with out uncheck product 
        $total = 0;

        // get id product from request 
        $id_product = $this->input->post('id');

        // do a foreach 
        $products = $this->cart->contents();
        foreach($products as $product){
            if($product['id'] === $id_product){
                // last options 
                $last_options = $this->cart->product_options($product['rowid']); 
                $last_options['is_selected'] = true;
                $total += $product['price'] * $product['qty']; 
                $this->cart->update([
                    'rowid' => $product['rowid'],
                    'options' => $last_options
                ]);
            } else {
                if($product['options']['is_selected']){
                    $total += $product['price'] * $product['qty'];      
                }
            }
        }

        echo json_encode(['last_price' => 'Rp. '.number_format($total,0,',','.').'' ]);
    }

    /**
     * 
     * checked a product in cart
     * 
     */
    function discard(){

        // total with out uncheck product 
        $total = 0;

        // get id product from request 
        $id_product = $this->input->post('id');

        // do a foreach 
        $products = $this->cart->contents();
        foreach($products as $product){
            if($product['id'] === $id_product){
                
                // last options 
                $last_options = $this->cart->product_options($product['rowid']); 
                $last_options['is_selected'] = false;
                $this->cart->update([
                    'rowid' => $product['rowid'],
                    'options' => $last_options
                ]);
            } else {
                if($product['options']['is_selected']){
                    $total += $product['price'] * $product['qty'];      
                }
            }
        }
        echo json_encode(['last_price' => 'Rp. '.number_format($total,0,',','.').'' ]);
    }
}