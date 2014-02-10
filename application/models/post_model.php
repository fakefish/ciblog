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
    if($pid === FALSE) {
      $query = $this->db->join('users','users.id=posts.pid')->get('posts');
      return $query->row();
    }

    $query = $this->db->get_where('posts',array('pid'=>$pid));
    return $query->row();
  }

  public function update_post($pid = FALSE) {
    if($pid === FALSE) {
      return FALSE;
    }
    $this->load->helper('url');

    $current = $this->session->userdata['uid'];
    $query = $this->db->select('uid')->from('posts')->where('pid',$pid);
    $post_uid = $query->row()->uid;
    if($current !== $post_uid) {
      redirect('/');
    }

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

    $current = $this->session->userdata['uid'];
    $query = $this->db->select('uid')->from('posts')->where('pid',$pid);
    $post_uid = $query->row()->uid;
    if($current !== $post_uid) {
      redirect('/','location');
    }

    return $this->db->delete('posts',array('pid'=>$pid));
  }
} 