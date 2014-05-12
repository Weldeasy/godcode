<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Aboutus extends CI_Controller {
	//session_start();
	 
	public function index() {
	
		$data = array();
		$this->load->library('form_validation');
		$this->load->helper('url');
		$this->load->helper(array('form'));
		
		if($this->session->userdata('logged_in')) {
			$session_data = $this->session->userdata('logged_in');
			$data['email'] = $session_data['email'];
			$data['login_form'] = 'frontend/logued';
		} else {
			$data['login_form'] = 'frontend/login_form';
		}
		
		$this->load->view('frontend/aboutus', $data);
	}
}