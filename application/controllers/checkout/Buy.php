<?php 
/**
 * 
 * Class for handle transaction
 * 
 */
class buy extends CI_Controller { 

    function __construct(){
        parent::__construct();
        $this->load->model('M_product');
    }
    /**
     * 
     * Checkout 
     * 
     */
    function index(){
        $alamat  = $this->input->post('address');
        $no_wa = $this->input->post('whatsapp');
        $name = $this->input->post('name');

        $id_product = $this->input->post('id');
        $is_single_product = $this->input->post('single-product');
        $product = null;
        $product = (array)$this->M_product->get_by_id($id_product);
        $product['qty'] = $this->input->post('qty');

        // out of stock
        $oos = false;
        $oos_product = '';
        
        // product selected
        $product_to_bought = [];
        $product_string = '';
        $total = 0;
        if($is_single_product){
            // one product 
            if($product['stok'] < $product['qty']){
                echo json_encode(['status' => 'error', 'code' => '108','message' => 'product out of stock','product' => $product['nama_produk']]);
                return;
            }
            $product_string .= '* '.$product['nama_produk'].' Sebanyak *'.$product['qty'].'*, harga satuan *Rp. '.number_format($product['harga'],0,',','.').'*EOL';
            $total += $product['qty'] * $product['harga'];
            $this->M_product->update_stock($product['id_produk'],$product['qty']);

        } else {
            foreach($this->cart->contents() as $item){
                if($item['options']['is_selected']){
                    $product_data = $this->M_product->get_by_id($item['id']);
                    if($product_data->stok < $item['qty']){
                        $oos = true;
                        $oos_product = $item['name'];
                        continue;
                    }
                    // update stok 
                    $this->M_product->update_stock($item['id'], $item['qty']);
                    array_push($product_to_bought,$item['rowid']);

                    $product_string .= '* '.$item['name'].' Sebanyak *'.$item['qty'].'*, harga satuan *Rp. '.number_format($item['price'],0,',','.').'*EOL';
                    $total += $item['price'] * $item['qty'];
                }
            }
            if(count($product_to_bought) < 1){
                echo json_encode(['code' => '107','msg' => 'cart is empty','status' => 'error']);
                return; 
            }
            if($oos){
                echo json_encode(['status'=> 'error','code' => '108','message' => 'product out of stock','product'=>$oos_product]);
                return;
            }
        }

        $sumary = 'HALO! '.$name.'.EOLEOL'.
        'Ini Ya ringkasan Pesanan Kamu : EOL'.
        $product_string.''. 
        'EOLTotal pesananmu adalah *Rp. '.number_format($total,0,',','.').
        '*EOLKamu bisa transfer pemabayarannya via bank BNI. '.
        'Ini Nomor Rekening nya ya *82177646734*'.'EOL'.
        'Paket akan diantar oleh Gung sony ke '.$alamat.'EOL'. 
        'setelah kamu transfer tentunya, HEHE'.'EOLEOL*pesan dari teamp4t Shopping*EOL```devmode```';

        // setup bot url
        $url_bot = $this->tool->url_bot;;

        // create curl resource 
        $ch = curl_init(); 

         // set url 
        curl_setopt($ch, CURLOPT_URL,$url_bot); 

        $headers = [
            'Content-Type: application/json',
        ];
        // remove cart data 
        foreach($product_to_bought as $item){
            $this->cart->update([
                'rowid'  => $item,
                'qty' => 0
            ]);
        }
        
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        //data 
        $payload = json_encode( 
            [ 
                "to" =>  $no_wa, 
                "message" => $sumary
            ]);
        curl_setopt( $ch, CURLOPT_POSTFIELDS, $payload );

        //return the transfer as a string 
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
        curl_exec($ch);

        echo json_encode(['status' => 'success','code'=>'206']);
    } 
}
