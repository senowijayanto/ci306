<?php defined( 'BASEPATH' ) OR exit( 'No direct script access allowed' );

if ( ! function_exists( 'encrypt_key' ) ){
	function encrypt_key( $key ){
		$CI =& get_instance();
		$salt = $CI->config->item( 'encryption_key' );
		return sha1( $key . $salt );
	}
}

if ( ! function_exists( 'is_profile_complete' ) ){
	function is_profile_complete( $id ) {
		$CI =& get_instance();
		$CI->load->model( 'users/users_model' );
		return $CI->users_model->profile_complete( $id );
	}
}

if ( ! function_exists( 'get_username' ) ){
	function get_username(){
		$CI =& get_instance();
		return $CI->session->userdata( 'username' );
	}
}

if ( ! function_exists( 'get_user_email' ) ){
	function get_user_email(){
		$CI =& get_instance();
		return $CI->session->userdata( 'email' );
	}
}

if ( ! function_exists( 'get_user_id' ) ){
	function get_user_id(){
		$CI =& get_instance();
		return $CI->session->userdata( 'id' );
	}
}

if ( ! function_exists( 'access_for' ) ){
	function access_for( $roles ){
		$CI =& get_instance();
		$role = $CI->session->userdata( 'role' );

		if( in_array( $role, $roles ) ){
			return true;
		}else{
			$CI->session->sess_destroy();
			redirect( base_url( 'login?red=' . current_url() ) );
			return false;
		}
	}
}

if ( ! function_exists( 'only_for' ) ){
	function only_for( $roles ){
		$CI =& get_instance();
		$role = $CI->session->userdata( 'role' );

		if(in_array( $role, $roles ) ){
			return true;
		}else{
			return false;
		}
	}
}

if ( ! function_exists( 'get_role' ) ){
	function get_role(){
		$CI =& get_instance();
		return $CI->session->userdata( 'role' );
	}
}

if ( ! function_exists( 'is_logged_in' ) ){
	function is_logged_in(){
		$CI =& get_instance();
		if( $CI->session->userdata( 'logged_in' ) == TRUE ){
			return TRUE;
		} else {
			return FALSE;
		}
	}
}

if ( ! function_exists( 'must_login' ) ){
	function must_login(){
		if( ! is_logged_in() ){
			logout();
		}
	}
}

if ( ! function_exists( 'is_role' ) ){
	function is_role( $role ){
		if( get_role() == $role){
			return TRUE;
		} else {
			return FALSE;
		}
	}
}
