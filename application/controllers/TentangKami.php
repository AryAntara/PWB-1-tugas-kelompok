<?php 

class TentangKami extends CI_Controller {
    function __construct()
    {
        parent::__construct();
        $this->load->model("M_tentang_kami");
        $this->load->model("M_founder");
        $this->load->model("M_user");
    }
    function index(){
        $data['content']=$this->M_tentang_kami->get()[0];
        $data['founder']=$this->M_founder->get();
        foreach($data["founder"] as $user){
            $user->data_user=$this->M_user->where(["id"=>$user->id_user]);
        }
        // load home views
        $this->template->display('tentang_kami',$data);
    }
}