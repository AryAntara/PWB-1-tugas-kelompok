<?php

class Order extends CI_Controller
{

  function __construct()
  {
    parent::__construct();
    if (!$this->session->userdata('is_admin')) {
      redirect('/');
    }
    $this->load->model('M_user');
    $this->load->model('M_product');
    $this->load->model('M_order');
    $this->load->model("M_history_product");
  }

  function index()
  {
    $data = [];
    $data['order'] = $this->M_order->get();
    foreach ($data['order'] as $value) {
      $value->user = $this->M_user->where(['id' => $value->id_user]);
      $value->product = $this->M_product->where(['id_produk' => $value->id_product]);
    }

    $this->template->display_admin("admin/order", $data);
  }
}
