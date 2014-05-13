<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
session_start();
class User_settings extends CI_Controller {

  function __construct()
  {
    parent::__construct();
	$this->load->helper(array('url'));
  }

  function index()
  {
	$data = array();
	if($this->session->userdata('logged_in')) {
		$session_data = $this->session->userdata('logged_in');
		$data['email'] = $session_data['email'];
		$this->load->view('frontend/user_settings/inicio', $data);
    } else {
		$this->load->view('frontend/inicio', $data);
	}
	
  }
}

?>