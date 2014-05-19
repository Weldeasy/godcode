<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
session_start();
class Inicio extends CI_Controller {

  function __construct()
  {
    parent::__construct();
	$this->load->helper('url');
	$this->load->library('form_validation');
	$this->load->helper(array('form'));
  }

  function index()
  {
	$data = array();
	
	$estat = $this->session->userdata('estat');
	if($this->session->userdata('logged_in')) {
		switch($estat) {
			case '1':
			case '2':
				$session_data = $this->session->userdata('logged_in');
				$data['email'] = $session_data['email'];
				$data['foto'] = $session_data['foto'];
				$this->load->view('frontend/logued', $data);
				break;
			case '3':
				$data['login_form'] = 'frontend/login_form';
				$data['contingut']=$this->load->view('frontend/panel_inici/congelat',null,TRUE);
				$this->load->view('frontend/inicio', $data);
			case '4':
				$data['login_form'] = 'frontend/login_form';
				$data['contingut']=$this->load->view('frontend/panel_inici/verifica',null,TRUE);
				$this->load->view('frontend/inicio', $data);

				break;
		}
    }else{
		$data['login_form'] = 'frontend/login_form';
		$data['contingut']=$this->load->view('frontend/panel_inici/panel_principal',null,TRUE);
		$this->load->view('frontend/inicio', $data);
	}
  }

}

?>