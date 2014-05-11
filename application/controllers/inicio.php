<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
session_start();
class Inicio extends CI_Controller {

  function __construct()
  {
    parent::__construct();
  }

  function index()
  {
	$data = array();
	if($this->session->userdata('logged_in')) {
		$session_data = $this->session->userdata('logged_in');
		$data['email'] = $session_data['email'];
        $data['login_form'] = 'frontend/logued';
    } else {
		$data['login_form'] = 'frontend/login_form';
	}
	

	//$data['login_form'] = $this->load->view('frontend/login_form', null, TRUE);
    $this->load->view('frontend/inicio', $data);
	
  }
}

?>