<?php 

/**
 * Class for Signup user controller
 *
 * @author team_4
 * @lincense MIT
 */ 

class Signup extends CI_Controller { 
  function __construct(){
    parent::__construct();
    $this->load->library('form_validation');
    $this->load->model('M_user');
  }

  /**
   * display page for signup 
   *
   * $response CI_view
   */
  public function index(){
    $this->template->render('signup');
  }

  /** 
   * creating new user 
   * 
   * @request string $username, the $username from the user
   * @request string $password, the $password from the user 
   * @request string $email, the $email from the user 
   * @request string $confirm_password, the $confirm_password from the user
   *
   * @response string $resp
   */ 
  public function new(){

    # validate the form request 
    $this->form_validation->set_rules('username', 'Username', 'required', 
      array('required' => 'Nama Pengguna tidak boleh kosong')
    );
    $this->form_validation->set_rules('password', 'Password', 'required',
      array('required' => 'Kata Sandi tidak boleh kosong')
    );
    $this->form_validation->set_rules('confirm_password', 'Password Confirmation', 'required', 
      array('required' => 'Konfirmasi Kata Sandi tidak boleh kosong')
    );
    $this->form_validation->set_rules('email', 'Email', 'required',
      array('email' => 'Email Tidak boleh kosong')
    );
    $form_error = $this->form_validation->run() == FALSE;

    if($form_error){
      echo json_encode([
        'status' => 'error', 
        'msg' => 'one or more field empty', 
        'code' => '101'
      ]);
      return ;
    }

    // get input post field 
    $username = $this->input->post('username');
    $password = $this->input->post('password');
    $email = $this->input->post('email');
    $phone = $this->input->post('phone');

    // check username has used or not 
    $usage_username = $this->M_user->check_username($username);
    if(!$usage_username){
      echo json_encode([
        "status" => "error",
        "msg" => "username sudah di gunakan",
        "code" => "103",
      ]);
      return;
    }
    // check email has used or not 
    $usage_email = $this->M_user->get_user($email);
    if($usage_email){
      echo json_encode([
        "status" => "error",
        "msg" => "email sudah di gunakan",
        "code" => "102"
      ]);
      return;
    }

    // data for inserting to database 
    $data = [
      "username" => $username,
      "password" => md5($password),
      "email" => $email, 
      "phone_number" => $phone
    ];

    // insert data 
    $this->M_user->insert_user($data);
    echo json_encode([
      "status" => "success",
      "msg" => "user berhasil ditambahkan",
      "code" => "200"
    ]);
    return;
  }
}

?>
