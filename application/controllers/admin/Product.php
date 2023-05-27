<?php

class Product extends CI_Controller
{

  function __construct()
  {
    parent::__construct();
    if (!$this->session->userdata('is_admin')) {
      redirect('/');
    }
    $this->load->library('template');
    $this->load->model('M_product');
    $this->load->library('form_validation');
  }

  function index()
  {
    $data = [];
    $data['products'] = $this->M_product->get_product();
    echo $this->template->display_admin('admin/product', $data);
  }

  function insert(){
    $post_data = $this->input->post();
        
    $this->form_validation->set_rules('nama_produk', 'Nama Produk','required');
    $this->form_validation->set_rules('deskripsi', 'Deskripsi','required');
    $this->form_validation->set_rules('harga', 'Harga','required');
    $this->form_validation->set_rules('stok', 'Stok','required');
    $this->form_validation->set_rules('gambar', 'Gambar','required');
    $this->form_validation->set_rules('tipe', 'Type','required');
    $this->form_validation->set_rules('merk', 'Merek','required');
    $this->form_validation->set_rules('jenis_kelamin', 'Jenis Kelamin','required');
    $this->form_validation->set_rules('bahan', 'Bahan','required');
    $this->form_validation->set_rules('negara_asal', 'Negara','required');
    $this->form_validation->set_rules('dikirim_dari', 'Dikirim Dari','required');
    $this->form_validation->set_rules('berat_produk', 'Berat Produk','required');

    $form_error = $this->form_validation->run();
    if($form_error === false){
      $errors = [
        'nama_produk' => form_error('nama_produk'),
        'deskripsi' => form_error('deskripsi'),
        'harga' => form_error('harga'),
        'stok' => form_error('stok'),
        'gambar' => form_error('gambar'),
        'tipe' => form_error('tipe'),
        'merk' => form_error('merk'),
        'jenis_kelamin' => form_error('jenis_kelamin'),
        'bahan' => form_error('bahan'),
        'negara_asal' => form_error('negara_asal'),
        'dikirim_dari' => form_error('dikirim_dari'),
        'berat_produk' => form_error('berat_produk'),
        'error' => true
      ];
      echo json_encode($errors);
      return;
    }

    // save image 
    $config['upload_path']  = './assets/img/product/'.$post_data['tipe'];
    $config['file_name'] = rand().'.jpg';
    $config['allowed_types'] = 'gif|jpg|png';    

    $this->load->library('upload', $config);    

    $product = [
      'nama_produk' => $post_data['nama_produk'],
      'deskripsi' => $post_data['deskripsi'],
      'harga' => $post_data['harga'],
      'stok' => $post_data['stok'],
      'gambar' => '/assets/img/product/'.$config['file_name'],
      'tipe' => $post_data['tipe'],
      'merek' => $post_data['merk'],
      'jenis_kelamin' => $post_data['jenis_kelamin'],
      'bahan' => $post_data['bahan'],
      'negara_asal' => $post_data['negara_asal'],
      'dikirim_dari' => $post_data['dikirim_dari'],
      'berat_produk' => $post_data['berat_produk'],      
    ];
    $this->M_product->insert($product);
    echo $this->db->last_query();



  }
  
}
