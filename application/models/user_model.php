<?php

class User_model extends CI_Model {
  public function __construct()
  {
    $this->load->database();
  }

  public function create_user()
  {

    $data = array(
      'username' => $this->input->post('username'), 
      'nickname' => $this->input->post('nickname'),
      'password' => $this->input->post('password')
    );

    return $this->db->insert('users',$data);
  }
}