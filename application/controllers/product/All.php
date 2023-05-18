<?php 
/** 
 * 
 * show all product
 * 
*/
class All extends CI_Controller {
    /**
     * 
     * initlize parent Class 
     * 
     */
    public function __construct(){
        parent::__construct();
        $this->load->model('M_user');
        $this->load->model('M_product');
    }

    /**
     * 
     * display 10 products
     * 
     */
    public function index(){
        if(!$this->session->userdata('pagination')){
            $this->session->set_userdata(['pagination' => [
                'from' => 1,
            ]]);
        }

        if(!$this->session->userdata('all_product')){
            $all_product = $this->M_product->get_length();
            $this->session->set_userdata(['all_product' => $all_product]);
        }

        // get data 
        $from = $this->session->userdata('pagination')['from'];
        $all_product = $this->session->userdata('all_product');
        $data['pagi_length']  = floor(($all_product)/ 8);
        $data['pagi_index'] = floor(($from + 7 )/ 8);
        $data['prev_disabled'] = $from === 1 ? 'disabled' : '';
        $data['next_disabled'] = $from + 8 >= $all_product ? 'disabled' : '';
        $data['products'] = $this->M_product->get_product(['from' => $from,'amount' => 8]);

        // check user has login or not
        $data['likes_product'] = [];
        if($this->tool->validate_login(false) == true){
            $data['likes_product'] = json_decode($this->M_user->get_user($this->session->userdata('email'))->favorit) ? json_decode($this->M_user->get_user($this->session->userdata('email'))->favorit) : [];
        } 
        $this->template->display('all_product',$data);
    }
    /**
     * 
     * Handle pagination data
     * 
     */
    public function pagination($operation){
       
        // get last from value
        $all_product = $this->session->userdata('all_product');
        $old_from = $this->session->userdata('pagination')['from'];

        if($operation === 'next'){
            if($all_product <= $old_from+8){
                redirect('product/all');
            }
            $this->session->set_userdata(['pagination' => [
                'from' => $old_from+8,
            ]]);
            redirect('product/all');
        } else if ($operation == 'prev'){
            if($old_from <= 1){
                redirect('product/all'); 
            }
            $this->session->set_userdata(['pagination' => [
                'from' => $old_from-8,
            ]]);
            redirect('product/all');
        } else {
            $index = $operation;
            $this->session->set_userdata(['pagination' => [
                'from' => (($index - 1) * 8 ) + 1
            ]]);            
            redirect('product/all');
        }
    }
}