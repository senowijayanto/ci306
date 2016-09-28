<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends MY_Model {
  public $_table = 'users';

  public function login_process($username, $password) {
    $this->db->from($this->_table);
    $this->db->where('username', $username);
    $this->db->where('password', MD5($password));
    $this->db->limit(1);

    $query = $this->db->get();

    if ($query->num_rows() > 0) {
      return $query->result();
    } else {
      return FALSE;
    }
  }
}
