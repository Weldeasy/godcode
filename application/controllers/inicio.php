<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
session_start();
class Inicio extends CI_Controller {

  function __construct()
  {
    parent::__construct();
	$this->load->helper('url');
  }

  function index()
  {
	$data = array();
	$this->load->library('form_validation');
	$this->load->helper(array('form'));
	if($this->session->userdata('logged_in')) {
		$session_data = $this->session->userdata('logged_in');
		$data['email'] = $session_data['email'];
		$this->load->view('frontend/logued', $data);
    } else {
		$data['login_form'] = 'frontend/login_form';
		$this->load->view('frontend/inicio', $data);
	}
	

	//$data['login_form'] = $this->load->view('frontend/login_form', null, TRUE);
	
  }
}

?>