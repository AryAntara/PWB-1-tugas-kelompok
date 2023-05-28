<?php

class Administrator extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('is_admin')) {
            redirect('/');
        }
        $this->load->model('M_founder');
        $this->load->model('M_user');
        $this->load->library('tool');
    }
    public function index()
    {
        $data = [];
        $data['users'] = $this->M_user->get_user();
        $data['founder'] = $this->M_founder->get();
        foreach ($data['founder'] as $founder) {
            $founder->user = $this->tool->search($data['users'], ['id' => $founder->id_user]);
        }

        $this->template->display_admin("admin/administrator", $data);
    }

    public function update()
    {
        $post_data = $this->input->post();

        // getting product data
        $founder = [
          'id_user' => $post_data['id_user'],
        ];

        // save image
        if (isset($post_data['gambar'])) {
            $config['upload_path']  = './assets/img/';
            $config['file_name'] = $this->M_user->get_username($post_data['id_user']).'.jpg';
            $config['allowed_types'] = 'gif|jpg|png';

            $this->load->library('upload', $config);
            $this->upload->overwrite = true;
            if (!$this->upload->do_upload('file_gambar')) {
                echo json_encode([
                  'error' => true,
                  'gambar' => $this->upload->display_errors()
                ]);
                return;
            }
            $founder['foto_profil'] = $config['file_name'];
        }

        $this->M_founder->update(['id' => $post_data['id']], $founder);
        echo '{ "success": true}';
    }
}
