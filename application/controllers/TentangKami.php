<?php 

class TentangKami extends CI_Controller {
    function __construct()
    {
        parent::__construct();
        $this->load->model("M_tentang_kami");
    }
    function index(){
        $data['content']=$this->M_tentang_kami->get()[0];
        // load home views
        $this->template->display('tentang_kami',$data);
    }
}