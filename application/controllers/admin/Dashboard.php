<?php

class dashboard extends CI_Controller
{
  function __construct()
  {
    parent::__construct();
    if (!$this->session->userdata('is_admin')) {
      redirect('/');
    }
    $this->load->model('M_founder');
    $this->load->model('M_product');
    $this->load->model('M_order');
    $this->load->model("M_history_product");
  }
  function index()
  {
    $data = [];
    $data['product_count'] = $this->M_product->count();
    $data['admin_count'] = $this->M_founder->count();
    $data['order_count'] = $this->counting_order();
    $this->template->display_admin("admin/dashboard", $data);
  }

  private function counting_order()
  {
    $orders = $this->M_order->get();
    $count = 0;
    $data_month = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0];
    foreach ($orders as $i => $order) {
      $count += $order->qty;
      $index = date('m', strtotime($order->order_date));
      $data_month[$index - 1] += $order->qty;
    }
    return ['count' => $count, 'per_month' => $data_month];
  }
}
