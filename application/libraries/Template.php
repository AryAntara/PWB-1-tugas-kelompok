<?php 
class Template {
  private $header = "component/header";
  private $footer = "component/footer";
  private $ci;

  function __construct(){
    $this->ci = &get_instance();
  }

  // fungsi ini untuk melakukan render pada view 
  // autorender untuk header 
  // autorender untuk footer
  // @param $path string : path dari view body yang akan di render 
  // @param $data array : data yang akan di kirimkan ke view 
  // @return void 
  public function render($path,$data = []){
    $this->ci->load->view($this->header);
    $this->ci->load->view($path,$data);
    $this->ci->load->view($this->footer);
  }
}
