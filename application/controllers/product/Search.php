<?php
/**
 *
 * class for handle search 
 * 
*/
class Search extends CI_Controller { 

    function __construct(){
        parent::__construct();
        $this->load->model('M_product');
        $this->load->model('M_user');
    }

    /**
     * 
     * search view
     * 
     */
    function index(){
        // get name from post request
        $name = $this->input->get('name');
        $data['products'] = $this->M_product->search($name);

        // check user has login or not
        $data['likes_product'] = [];
        if($this->tool->validate_login(false) == true){
            $data['likes_product'] = json_decode($this->M_user->get_user($this->session->userdata('email'))->favorit) ? json_decode($this->M_user->get_user($this->session->userdata('email'))->favorit) : [];
        } 
        $this->template->display('search',$data);
    }
}