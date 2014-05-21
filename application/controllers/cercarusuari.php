<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Cercarusuari extends CI_Controller {

	function __construct(){
	    parent::__construct();
	  	$this->load->helper('url');
	  	$this->load->library('form_validation');
	  	$this->load->helper(array('form'));
    }
	public function index() {
		  $data = array();
	      if($this->session->userdata('logged_in')) {
	          $session_data = $this->session->userdata('logged_in');
	         $data['foto'] = $session_data['foto'];
		      $data['email'] = $session_data['email'];
		      $data['login_form'] = 'frontend/panel_inici/logued';
	      }else{
	          $data['login_form'] = 'frontend/login_form';
	      }
	      $data['contingut']=$this->load->view('frontend/panel_inici/cercarusuari',$data,TRUE);
	      $this->load->view('frontend/inicio', $data);
	}
}

