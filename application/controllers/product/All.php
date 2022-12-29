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
                'from' => 0,
                'to' => 10
            ]]);
        }

        if(!$this->session->userdata('all_product')){
            $all_product = $this->M_product->get_length();
            $this->session->set_userdata(['all_product' => $all_product]);
        }

        // get data 
        $from = $this->session->userdata('pagination')['from'];
        $to = $this->session->userdata('pagination')['to'];
        $data['products'] = $this->M_product->get_product($from,$to);

        // check user has login or not
        $data['likes_product'] = [];
        if($this->tool->validate_login(false) == true){
            $data['likes_product'] = json_decode($this->M_user->get_user($this->session->userdata('email'))->favorit);
        } 
        $this->template->display('all_product',$data);
    }
    /**
     * 
     * Handle pagination data
     * 
     */
    public function pagination(){
       
        $operation = $this->input->post('operation');
    }
}