<?php 

class KontakKami extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_founder');
        $this->load->model('M_user');
        $this->load->library('form_validation');
        $this->load->library('tool');
    }
    function index(){
        $post_data = $this->input->post();

        $this->form_validation->set_rules('email', 'Nama Produk', 'required');
        $this->form_validation->set_rules('message', 'Deskripsi', 'required');
        $this->form_validation->set_rules('subject', 'Judul', 'required');
        $this->form_validation->set_rules('name', 'Nama', 'required');
        $form_error = $this->form_validation->run();
        if ($form_error === false) {
            $errors = [
              'email' => form_error('email'),
              'message' => form_error('message'),
              'subject' => form_error('subject'),
              'name' => form_error('name'),
              'error' => true
            ];
            echo json_encode($errors);
            return;
        }

        $email_user = $post_data['email'];
        $message = $post_data['message'];
        $subject = $post_data['subject'];
        $name = $post_data['name'];
        $data['users'] = $this->M_user->get_user();
        $data['founder'] = $this->M_founder->get();
     
        foreach ($data['founder'] as $founder) {
            $founder->user = $this->tool->search($data['users'], ['id' => $founder->id_user]);
            $this->tool->send_email($founder->user->email, $name, $subject, $message);
        } 

        // send to email user
        $this->tool->send_email($email_user, 'Teamp4t Shopping Official', 'Thanks You For Contact Us', 'Selamat Datang di Teamp4t Shopping, Terimakasih telah menghubungi kami');
        echo '{"success" : true}';
    }
}