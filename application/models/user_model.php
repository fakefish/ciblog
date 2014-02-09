<?php

class User_model extends CI_Model {
  public function __construct() {
    $this->load->database();
  }

  public function create_user() {

    $data = array(
      'username' => $this->input->post('username'), 
      'nickname' => $this->input->post('nickname'),
      'password' => $this->input->post('password'),
      'email' => $this->input->post('email')
    );

    return $this->db->insert('users',$data);
  }

  public function get_user($username = FALSE) {
    if($username == FALSE) {
      return false;
    }

    $query = $this->db->get_where('users',array('username'=>$username));
    return $query->row();
  }
}