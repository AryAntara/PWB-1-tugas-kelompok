<?php

/**
 *
 * Class for handle template libraries 
 *
 * @create team_4
 * @license MIT
 *
 */
class Template
{
  private $header = "component/header";
  private $footer = "component/footer";
  private $nav = "component/nav";
  private $admin_file = "component/admin";
  private $footer_view = "component/footer_view";
  private $sidebar = "component/sidebar";
  private $ci;

  function __construct()
  {
    $this->ci = &get_instance();
  }

  /**
   * fungsi ini untuk melakukan render pada view 
   * autorender untuk header 
   * autorender untuk footer
   * @param string $oath : path dari view body yang akan di render 
   * @param array $data : data yang akan di kirimkan ke view 
   * @return void 
   */
  public function render($path, $data = [])
  {
    $this->ci->load->view($this->header);
    $this->ci->load->view($path, $data);
    $this->ci->load->view($this->footer);
  }

  /**
   * 
   * render a view with navbar included
   *
   * @param string $path, the path of view will be rendered 
   * @param array $data, the data will inject to view
   *
   */
  public function display($path, $data = [])
  {
    $this->ci->load->view($this->header);
    $this->ci->load->view($this->nav);
    $this->ci->load->view($path, $data);
    $this->ci->load->view($this->footer_view);
    $this->ci->load->view($this->footer);
  }

  /**
   *  
   *  render a View With sidebar include 
   *  @param string $path 
   *  @param array $data, the data will inject to view 
   *
   */
  public function display_admin($path, $data = [])
  {
    $this->ci->load->view($this->header);
    $this->ci->load->view($this->admin_file);
    $this->ci->load->view($this->sidebar);    
    $this->ci->load->view($path, $data);
    $this->ci->load->view($this->footer);
  }
}
