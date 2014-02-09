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

    $data['title'] = "Login";

    $this->load->view('templates/header',$data);
    $this->load->view('user/login');
    $this->load->view('templates/footer');
  }

  public function register()
  {
    $this->load->helper('form');
    $this->load->library('form_validation');

    $this->form_validation->set_rules('username','Username','required');
    $this->form_validation->set_rules('password','Password','required');
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

    
  }


}