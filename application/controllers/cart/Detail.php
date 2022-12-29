<?php 
/** 
 * 
 * Class for Cart detail page
 * 
*/
Class Detail extends CI_Controller {
    function __construct(){
        parent::__construct();
        $this->load->model('M_product');
        $this->load->model('M_user');
    }
    /**
     * 
     * Cart page display
     * 
     */
    function index(){

        $data = [];
        $data['products'] = array_slice($this->M_product->get_product(),0,9);

        // check cart is empty or not 
        if(!$this->cart->contents()){
            $this->template->display('cart_empty');
            return;
        }

        // check user has login or not
        $data['likes_product'] = [];
        if($this->tool->validate_login(false) == true){
            $data['likes_product'] = json_decode($this->M_user->get_user($this->session->userdata('email'))->favorit);
        } 
        // load cart views 
        $this->template->display('cart',$data);
    }
}