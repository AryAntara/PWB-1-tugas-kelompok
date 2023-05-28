<?php

class Product extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('is_admin')) {
            redirect('/');
        }
        $this->load->library('template');
        $this->load->model('M_product');
        $this->load->model('M_kategori');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data = [];
        $data['products'] = $this->M_product->get_product();
        $data['kategori'] = $this->M_kategori->get();
        echo $this->template->display_admin('admin/product', $data);
    }

    public function insert()
    {
        $post_data = $this->input->post();

        $this->form_validation->set_rules('nama_produk', 'Nama Produk', 'required');
        $this->form_validation->set_rules('deskripsi', 'Deskripsi', 'required');
        $this->form_validation->set_rules('harga', 'Harga', 'required');
        $this->form_validation->set_rules('stok', 'Stok', 'required');
        $this->form_validation->set_rules('gambar', 'Gambar', 'required');
        $this->form_validation->set_rules('tipe', 'Type', 'required');
        $this->form_validation->set_rules('merk', 'Merek', 'required');
        $this->form_validation->set_rules('jenis_kelamin', 'Jenis Kelamin', 'required');
        $this->form_validation->set_rules('bahan', 'Bahan', 'required');
        $this->form_validation->set_rules('negara_asal', 'Negara', 'required');
        $this->form_validation->set_rules('dikirim_dari', 'Dikirim Dari', 'required');
        $this->form_validation->set_rules('berat_produk', 'Berat Produk', 'required');

        $form_error = $this->form_validation->run();
        if ($form_error === false) {
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
        if (!$this->upload->do_upload('file_gambar')) {
            echo json_encode([
            'error' => true,
            'gambar' => $this->upload->display_errors()
            ]);
            return;
        }

        $product = [
          'nama_produk' => $post_data['nama_produk'],
          'deskripsi' => $post_data['deskripsi'],
          'id_kategori' => $post_data['id_kategori'],
          'harga' => $post_data['harga'],
          'stok' => $post_data['stok'],
          'gambar_produk' => '/assets/img/product/'.$post_data['tipe'].'/'.$config['file_name'],
          'type' => $post_data['tipe'],
          'merek' => $post_data['merk'],
          'jenis_kelamin' => $post_data['jenis_kelamin'],
          'bahan' => $post_data['bahan'],
          'negara_asal' => $post_data['negara_asal'],
          'dikirim_dari' => $post_data['dikirim_dari'],
          'berat_produk' => $post_data['berat_produk'],
        ];


        $this->M_product->insert($product);
        echo '{ "success": true}';
    }

    public function update()
    {
        $post_data = $this->input->post();

        $this->form_validation->set_rules('nama_produk', 'Nama Produk', 'required');
        $this->form_validation->set_rules('deskripsi', 'Deskripsi', 'required');
        $this->form_validation->set_rules('harga', 'Harga', 'required');
        $this->form_validation->set_rules('stok', 'Stok', 'required');
        $this->form_validation->set_rules('tipe', 'Type', 'required');
        $this->form_validation->set_rules('merk', 'Merek', 'required');
        $this->form_validation->set_rules('jenis_kelamin', 'Jenis Kelamin', 'required');
        $this->form_validation->set_rules('bahan', 'Bahan', 'required');
        $this->form_validation->set_rules('negara_asal', 'Negara', 'required');
        $this->form_validation->set_rules('dikirim_dari', 'Dikirim Dari', 'required');
        $this->form_validation->set_rules('berat_produk', 'Berat Produk', 'required');

        $form_error = $this->form_validation->run();
        if ($form_error === false) {
            $errors = [
              'nama_produk' => form_error('nama_produk'),
              'deskripsi' => form_error('deskripsi'),
              'harga' => form_error('harga'),
              'stok' => form_error('stok'),
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

        // getting product data
        $product = [
          'nama_produk' => $post_data['nama_produk'],
          'deskripsi' => $post_data['deskripsi'],
          'id_kategori' => $post_data['id_kategori'],
          'harga' => $post_data['harga'],
          'stok' => $post_data['stok'],
          'type' => $post_data['tipe'],
          'merek' => $post_data['merk'],
          'jenis_kelamin' => $post_data['jenis_kelamin'],
          'bahan' => $post_data['bahan'],
          'negara_asal' => $post_data['negara_asal'],
          'dikirim_dari' => $post_data['dikirim_dari'],
          'berat_produk' => $post_data['berat_produk'],
        ];

        // save image
        if (isset($post_data['gambar'])) {
            $config['upload_path']  = './assets/img/product/'.$post_data['tipe'];
            $config['file_name'] = rand().'.jpg';
            $config['allowed_types'] = 'gif|jpg|png';

            $this->load->library('upload', $config);
            if (!$this->upload->do_upload('file_gambar')) {
                echo json_encode([
                  'error' => true,
                  'gambar' => $this->upload->display_errors()
                ]);
                return;
            }
            $product['gambar_produk'] = '/assets/img/product/'.$post_data['tipe'].'/'.$config['file_name'];
        }

        $this->M_product->update(['id_produk' => $post_data['id_produk']], $product);
        echo '{ "success": true}';
    }

    public function delete()
    {
        $id_product = $this->input->get('id_product');
        $this->M_product->delete(['id_produk' => $id_product ]);
    }
}
