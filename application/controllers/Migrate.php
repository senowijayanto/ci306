<?php

class Migrate extends CI_Controller
{

  public function index()
  {
    $this->load->library('migration');
		if ( ! $this->migration->current()){
			show_error($this->migration->error_string());
		}else{
			show_error("Current version");
		}
  }

  public function latest(){
    $this->load->library('migration');
    $this->migration->latest();
  }

  public function version( $version ){
    $this->load->library('migration');
    $this->migration->version($version);
  }

}
