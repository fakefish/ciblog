<?php

class User extends CI_Controller {

  public function __construct()
  {
    parent::__construct();
    // $this->load->model('user');
  }

  public function login()
  {
    $this->load->helper('form');
    $this->load->library('form_validation');

    $this->form_validation->set_rules('username','Username','trim|required|xss_clean');
    $this->form_validation->set_rules('password','Password','md5');

    if($this->form_validation->run() === FALSE)
    {
      $data['title'] = "Login";

      $this->load->view('templates/header',$data);
      $this->load->view('user/login');
      $this->load->view('templates/footer');
    }
    else
    {
      $this->user_model->get_user();
    }
    
  }

  public function register()
  {
    $this->load->helper('form');
    $this->load->library('form_validation');

    $this->form_validation->set_rules('username','Username','trim|required|xss_clean|callback_nameonly');
    $this->form_validation->set_rules('password','Password','trim|required|mathes[passconf]|md5');
    $this->form_validation->set_rules('passconf','Password Confirmation','required');

    if($this->form_validation->run() === FALSE)
    {
      $data['title'] = "Register";

      $this->load->view('templates/header',$data);
      $this->load->view('user/register');
      $this->load->view('templates/footer');
    }
    else
    {
      $this->user_model->create_user();
      $this->load->view('user/success');
    }

    function nameonly($str)
    {

    }
  }


}