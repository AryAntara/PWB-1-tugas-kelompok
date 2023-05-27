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
    $this->load->library('tool');
    $this->load->model('M_product');
    $this->load->model('M_order');
    $this->load->model("M_history_product");
  }

  function index()
  {
    $data = [];
    $data['users'] = $this->M_user->get_user();
    $filter = $this->input->get();
    $order_column = null;

    if (isset($filter['column']) && isset($filter['arrage'])) {
      $order_column = [$filter['column'], $filter['arrage']];
    }

    $data['order'] = $this->M_order->get();
    $filter_count = $this->count_filter($filter);

    foreach ($data['order'] as $i => $value) {
      $value->user = $this->tool->search($data['users'], ['id' => $value->id_user]);
      $value->product = $this->M_product->where(['id_produk' => $value->id_product]);

      if (
        isset($filter['user']) && $filter['user'] !== $value->user->id
        || isset($filter['start']) && strtotime($value->order_date) <  strtotime($filter['start'])
      ) {

        unset($data['order'][$i]);
      }

      if (isset($filter['end']) && strtotime($value->order_date) > strtotime($filter['end'])) {
        unset($data['order'][$i]);
      }
    }

    if ($order_column) {
      $data['order'] = $this->orders($order_column, $data['order']);
    }

    $data['filter'] = $filter;
    $data['filter_badge'] = $filter_count ? $this->tool->html('span', [
      'class' => "position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger",
    ], "$filter_count") : '';
    $this->template->display_admin("admin/order", $data);
  }

  private function count_filter($filter)
  {
    $count = 0;
    foreach ($filter as $key => $item) {
      if ($item == 'end' || $item == '') {
        continue;
      }
      $count++;
    }
    return $count;
  }

  function orders($order_column, $data)
  {
    $newData = [];
    if ($order_column === ['product', 'up']) {
      usort($data, function ($a, $b) {
        return strcmp($b->product->nama_produk, $a->product->nama_produk);
      });
    } else if ($order_column === ['product', 'down']) {
      usort($data, function ($a, $b) {
        return strcmp($a->product->nama_produk, $b->product->nama_produk);
      });
    } else if ($order_column === ['qty', 'up']) {
      usort($data, function ($a, $b) {
        return $b->qty > $a->qty;
      });
    } else if ($order_column === ['qty', 'down']) {
      usort($data, function ($a, $b) {
        return $a->qty > $b->qty;
      });
    } else if ($order_column === ['price', 'up']) {
      usort($data, function ($a, $b) {
        return  $b->price > $a->price;
      });
    } else if ($order_column === ['price', 'down']) {
      usort($data, function ($a, $b) {
        return $a->price > $b->price;
      });
    }
    return $data;
  }
}
