<?php

class User extends CI_Controller {

  public function __construct() {
    parent::__construct();
    // $this->load->model('user');
  }

  public function login() {
    $this->load->helper('form');
    $this->load->helper('url');
    $this->load->library('form_validation');

    if($this->session->userdata('logged_in')){
      redirect('/');
    }
    // 这里要判断是否已经登录

    $this->form_validation->set_rules('username','Username','trim|required|xss_clean');
    $this->form_validation->set_rules('password','Password','md5');

    $data['title'] = "Login";
    if($this->form_validation->run() === FALSE) {
      $this->load->view('templates/header',$data);
      $this->load->view('user/login');
      $this->load->view('templates/footer');
    } else {
      $username = $this->input->post('username');
      $password = $this->input->post('password');
      $result = $this->user_model->get_user($username);

      if($result && $password == $result->password) {
        $this->load->view('user/login-success');

        $this->load->library('session');
        

        $this->session->set_userdata('uid',$result->id);
        $this->session->set_userdata('username',$result->username);
        $this->session->set_userdata('nickname',$result->nickname);
        $this->session->set_userdata('email',$result->email);
        $this->session->set_userdata('logged_in',TRUE);

        redirect('/');
      } else {
        $this->form_validation->set_message('username or password error');
        $this->load->view('templates/header',$data);
        $this->load->view('user/login');
        $this->load->view('templates/footer');
      }
    }
  }

  public function register() {
    $this->load->helper('form');
    $this->load->helper('url');
    $this->load->library('form_validation');

    $this->form_validation->set_rules('username','Username','trim|required|xss_clean|callback_nameonly');
    $this->form_validation->set_rules('password','Password','trim|required|mathes[passconf]|md5');
    $this->form_validation->set_rules('passconf','Password Confirmation','required');

    if($this->form_validation->run() === FALSE) {
      $data['title'] = "Register";

      $this->load->view('templates/header',$data);
      $this->load->view('user/register');
      $this->load->view('templates/footer');
    } else {
      $this->user_model->create_user();
      redirect('/login');
    }

    function nameonly($str) {
      
    }
  }

  public function logout() {
    $this->session->unset_userdata('uid');
    $this->session->unset_userdata('username');
    $this->session->unset_userdata('nickname');
    $this->session->unset_userdata('email');
    $this->session->set_userdata('logged_in',FALSE);

    redirect('/');
  }
}