<?php

class Administrator extends CI_Controller
{
  function __construct()
  {
    parent::__construct();
    if (!$this->session->userdata('is_admin')) {
      redirect('/');
    }
    $this->load->model('M_founder');
    $this->load->model('M_user');    
    $this->load->library('tool');    
  }
  function index()
  {
    $data = [];
    $data['user'] = $this->M_user->get_user();
    $data['founder'] = $this->M_founder->get();
    foreach($data['founder'] as $founder){
        $founder->user = $this->tool->search($data['user'],['id' => $founder->id_user]);
    }
    
    $this->template->display_admin("admin/administrator", $data);
  }  
}
