<?php 
/**
 * Class for login user 
 *
 * @create Team_4
 * @lincense MIT 
 */
class Auth extends CI_Controller { 
  function __construct(){
    parent::__construct();
    $this->load->library('form_validation');
    $this->load->model('M_user');
    $this->load->model('M_founder');
  }

  /** 
   * Display view of login 
   *
   */ 
  public function index(){
    $this->template->render('admin/login');
  }

  function login_admin(){    
    # validate the form request 
    $this->form_validation->set_rules('username', 'Username', 'required', 
      array('required' => 'Nama Pengguna tidak boleh kosong')
    );
    $this->form_validation->set_rules('password', 'Password', 'required',
      array('required' => 'Kata Sandi tidak boleh kosong')
    );

    $form_error = $this->form_validation->run() == FALSE;

    if($form_error){
      echo json_encode([
        'status' => 'error', 
        'msg' => 'one or more field empty', 
        'code' => '101'
      ]);
      return;
    }

    // get data on post field
    $username = $this->input->post('username');
    $password = $this->input->post('password');

    // check username 
    $there_is_username = !$this->M_user->check_username($username);
    if(!$there_is_username){
      echo json_encode([
        "status" => "error",
        "msg" => "username salah",
        "code" => "104"
      ]);
      return;
    }

    // get userdata in database by their username
    $userdata = $this->M_user->get_user(null,$username);
  
    if(md5($password) != $userdata->password){
      echo json_encode([
        "status"=> "error",
        "msg" => "password salah",
        "code" => "105"
      ]);
      return;
    }

    if(!$this->M_founder->is_admin($userdata->id)){
      echo json_encode([
        "status"=> "error",
        "msg" => "Kamu Bukan Admin",
        "code" => "106"
      ]);
      return;
    }
    // succes login
    echo json_encode([
      "status" => "success",
      "msg" => "login berhasil sebagai admin",
      "redirect_to" => base_url(). "admin/dashboard",
      "code" => "21"
    ]);

    // set session 
    $data_user = [
      'id' => $userdata->id, 
      'username' => $this->input->post('username'),
      'email' => $userdata->email,
      'is_admin' => true
    ];
    $this->session->set_userdata($data_user);
    return; 
  }  
}
