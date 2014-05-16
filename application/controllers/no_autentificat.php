<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class No_autentificat extends CI_Controller {
	public function index() {
		$data = array();
		$this->load->library('form_validation');
		$this->load->helper('url');
		$this->load->helper(array('form'));
		
		if($this->session->userdata('logged_in')) {
			$session_data = $this->session->userdata('logged_in');
			$data['email'] = $session_data['email'];
			$data['login_form'] = null;
			$this->load->view('frontend/no_autentificat', $data);
		} else {
			$data['login_form'] = 'frontend/login_form';
		}
		$this->load->view('frontend/no_autentificat',$data);
	}
}