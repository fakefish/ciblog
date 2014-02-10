<?php

class Post extends CI_Controller {

  public function __construct() {
    parent::__construct();
  }

  public function create() {
    $this->load->model('post_model');
    $this->load->helper('form');
    $this->load->library('form_validation');

    $this->form_validation->set_rules('title','Title','required|xss_clean');
    $this->form_validation->set_rules('content','Content','required|xss_clean');
    $this->form_validation->set_rules('catetory','Catetory','required|xss_clean');
    $this->form_validation->set_rules('tag','Tag','required|xss_clean');
  
    if($this->form_validation->run() === FALSE) {
      $data['title'] = "Create Post";

      $this->load->view('templates/header',$data);
      $this->load->view('post/create');
      $this->load->view('templates/footer');
    } else {
      $this->post_model->create_post();
      $this->load->view('post/create-success');
    }
  }

  public function update($pid = FALSE) {
    $this->load->model('post_model');
    $this->load->helper('form');
    $this->load->library('form_validation');
    $this->load->helper('url');

    $current = $this->session->userdata('uid');


    $this->form_validation->set_rules('title','Title','required|xss_clean');
    $this->form_validation->set_rules('content','Content','required|xss_clean');
    $this->form_validation->set_rules('catetory','Catetory','required|xss_clean');
    $this->form_validation->set_rules('tag','Tag','required|xss_clean');
  
    if($this->form_validation->run() === FALSE) {
      $data['title'] = "Update Post";

      $this->load->view('templates/header',$data);
      $this->load->view('post/create');
      $this->load->view('templates/footer');
    } else {
      if($pid !== FALSE) {
        $this->post_model->update($pid);
        redirect('/','refresh');
      }
    }
  }

  public function view($pid = FALSE) {
    $this->load->model('post_model');

    $data['title'] = "Post List";

    $this->load->view('templates/header',$data);

    if($pid === FALSE) {
      $data['posts'] = $this->post_model->get_post();
      $this->load->view('post/index',$data);
    } else {
      $data['post'] = $this->post_model->get_post($pid);
      $this->load->view('post/view',$data);
    }

    $this->load->view('templates/footer');
  }

  public function delete($pid = FALSE) {
    $this->load->model('post_model');
    $this->load->helper('url');

    if($pid !== FALSE) {
      $this->post_model->delete($pid);
      redirect('/','refresh');
    }
  }
}