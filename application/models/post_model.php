<?php

class Post_model extends CI_Model {
  public function __construct() {
    $this->load->database();
  }

  public function create_post() {
    $this->load->helper('date');

    $data = array(
      'title' => $this->input->post('title'),
      'uid' => $this->session->userdata('uid'),
      'time' => now(),
      'content' => $this->input->post('content'),
      'catetory' => $this->input->post('catetory'),
      'tag' => $this->input->post('tag'),
      'type' => $this->input->post('type')
    );

    return $this->db->insert('posts',$data);
  }

  public function get_post($pid = FALSE) {
    $this->db->select('*');
    $this->db->from('posts');
    $this->db->join('users','users.id = posts.uid');

    if($pid === FALSE) {
      $this->db->order_by('pid desc');
      $query = $this->db->get();
      return $query->result();
    }

    $this->db->where('pid',$pid);
    $query = $this->db->get();
    return $query->row();
  }

  public function get_list_post($p = FALSE) {
    $this->db->select('*');
    $this->db->from('posts');
    $this->db->join('users','users.id = posts.uid');
    $this->db->order_by('pid desc');

    if($p === FALSE) {
      $this->db->limit(5);
    } else {
      $this->db->limit($p*5,$p*5+5);
    }

    $query = $this->db->get();
    return $query->result();
  }

  public function update_post($pid = FALSE) {
    if($pid === FALSE) {
      return FALSE;
    }
    $this->load->helper('date');

    $data = array(
      'title' => $this->input->post('title'),
      'time' => now(),
      'content' => $this->input->post('content'),
      'catetory' => $this->input->post('catetory'),
      'tag' => $this->input->post('tag'),
      'type' => $this->input->post('type')
    );

    return $this->db->update('posts',$data,array('pid'=>$pid));
  }

  public function delete_post($pid = FALSE) {
    if($pid === FALSE) {
      return FALSE;
    }
    $this->load->helper('url');

    return $this->db->delete('posts',array('pid'=>$pid));
  }
} 