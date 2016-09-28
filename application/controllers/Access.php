<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Access extends CI_Controller {

  public function __construct() {
    parent::__construct();
    $this->load->model('user_model');
  }

  public function login() {

    if ($_POST) {
      $username = $this->input->post('username');
      $password = $this->input->post('password');

      $login = $this->user_model->login_process($username, $password);
      if ($login) {
        $sess_array = array();

        foreach ($login as $l) {
          $sess_array = array(
            'id'        => $l->id,
            'role_id'   => $l->role_id,
            'username'  => $l->username,
            'realname'  => $l->realname
          );
        }

        $sess_array['logged_in'] = TRUE;

        $this->session->set_userdata($sess_array);
        redirect('dashboard');
      }

      echo "Username and Password Not Valid!";
      return FALSE;
    }

    $data['title'] = 'Login';
    $this->load->view('login');
  }

  public function logout() {
    // $sess_array = array(
    // 'username' => ''
    // );
    // $this->session->unset_userdata($sess_array);
    session_destroy();
    redirect('login');
  }
}
