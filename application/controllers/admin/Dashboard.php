<?php 

class dashboard extends CI_Controller {
    function __construct()
    {
        parent::__construct();
        if(!$this->session->userdata('is_admin')){
            redirect('/');
        }
        $this->load->model('M_user');
        $this->load->model('M_product');
        $this->load->model("M_history_product");
    }
    function index(){
        $this->template->display("dashboard");
    }
}