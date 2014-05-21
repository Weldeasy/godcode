<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Introduccio extends CI_Controller {

	function __construct()
  {
    parent::__construct();
  	$this->load->helper('url');
  	$this->load->library('form_validation');
  	$this->load->helper(array('form'));
  }
	public function index() {
		$data = array();
	    if($this->session->userdata('logged_in')) {
	      $session_data = $this->session->userdata('logged_in');
	      $data['email'] = $session_data['email'];
	      $data['login_form'] = null;
	    }else{
	      $data['login_form'] = 'frontend/login_form';
	    }
	    $data['contingut']=$this->load->view('frontend/panel_inici/introduccio',null,TRUE);
	    $this->load->view('frontend/inicio', $data);
	}
}
