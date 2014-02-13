<?php

class Post extends CI_Controller {

  public function __construct() {
    parent::__construct();
  }

  public function create() {
    $this->load->model('post_model');
    $this->load->helper('form');
    $this->load->helper('url');
    $this->load->library('form_validation');

    if(!$this->session->userdata('logged_in')) {
      redirect('/');
    }


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
      // $this->load->view('post/create-success');
      redirect('/');
    }
  }

  public function update($pid = FALSE) {
    $this->load->model('post_model');
    $this->load->helper('form');
    $this->load->library('form_validation');
    $this->load->helper('url');

    if($pid === FALSE) {
      redirect('/');
    }

    $current = $this->session->userdata('uid');
    $data['post'] = $this->post_model->get_post($pid);
    if($data['post']->uid !== $current) {
      redirect('/');
    }

    $this->form_validation->set_rules('title','Title','required|xss_clean');
    $this->form_validation->set_rules('content','Content','required|xss_clean');
    $this->form_validation->set_rules('catetory','Catetory','required|xss_clean');
    $this->form_validation->set_rules('tag','Tag','required|xss_clean');
  
    if($this->form_validation->run() === FALSE) {
      $data['title'] = "Update Post";

      $this->load->view('templates/header',$data);
      $this->load->view('post/update',$data);
      $this->load->view('templates/footer');
    } else {
      $this->post_model->update_post($pid);
      redirect('/view/'.$data['post']->pid);
    }
  }

  public function view($pid = FALSE) {
    $this->load->model('post_model');

    if($pid === FALSE) {
      redirect('/');
      // $data['posts'] = $this->post_model->get_post();
      // $this->load->view('post/index',$data);
    } else {
      $data['post'] = $this->post_model->get_post($pid);
      $data['title'] = $data['post']->title;
      $this->load->view('templates/header',$data);
      $this->load->view('post/view',$data);
    }

    $this->load->view('templates/footer');
  }

  public function plist($p = FALSE) {
    $this->load->model('post_model');
    $this->load->library('pagination');

    if($p === FALSE) {
      $data['posts'] = $this->post_model->get_list_post();
    } else {
      $data['posts'] = $this->post_model->get_list_post($p);
    }

    $data['title'] = 'Post List';
    $config['base_url'] = page_url('list');
    $config['total_rows'] = count($data['posts']);
    $config['per_page'] = intval(count($data['posts'])/5); 

    $this->pagination->initialize($config); 

    echo $this->pagination->create_links();

    $this->load->view('templates/header',$data);
    $this->load->view('post/index',$data);
    $this->load->view('templates/footer');
  }

  public function delete($pid = FALSE) {
    $this->load->model('post_model');
    $this->load->helper('url');

    $current = $this->session->userdata('uid');
    $data['post'] = $this->post_model->get_post($pid);
    if($data['post']->uid !== $current) {
      redirect('/');
    }

    if($pid !== FALSE) {
      $this->post_model->delete_post($pid);
      redirect('/','refresh');
    }
  }
}