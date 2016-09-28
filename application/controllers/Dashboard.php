<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

  public function __construct() {
    parent::__construct();

  }

	public function index()
	{
    if( is_logged_in() ) {
      $this->load->view('dashboard');
		} else {
			redirect( site_url('login') );
		}
	}
}
