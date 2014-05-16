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
	$estat = $this->session->userdata('estat');
	if($this->session->userdata('logged_in')) {
		switch($estat) {
			case '1':
			case '2':
				$session_data = $this->session->userdata('logged_in');
				$data['email'] = $session_data['email'];
				$data['foto'] = "hola";$session_data['foto'];
				$this->load->view('frontend/logued', $data);
				break;
			case '3':
				$this->load->view('frontend/congelat', $data);
			case '4':
				$this->load->view('frontend/verifica', $data);
				break;
		}
		
    } else {
		$data['login_form'] = 'frontend/login_form';
		$this->load->view('frontend/inicio', $data);
	}
	

	//$data['login_form'] = $this->load->view('frontend/login_form', null, TRUE);
	
  }
}

?>