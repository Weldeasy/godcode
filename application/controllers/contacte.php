<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Contacte extends CI_Controller {
	//session_start();
	 
	public function index() {
	
		$data = array();
		$this->load->library('form_validation');
		$this->load->helper('url');
		$this->load->helper(array('form'));
		
		if($this->session->userdata('logged_in')) {
			$session_data = $this->session->userdata('logged_in');
			$data['email'] = $session_data['email'];
			$data['login_form'] = null;
			$this->load->view('frontend/contacte', $data);
		} else {
			$data['login_form'] = 'frontend/login_form';
		}
		$this->load->view('frontend/contacte', $data);
	}
	public function validar()
	{
	   
        $this->form_validation->set_error_delimiters('<span class="error_formulario_registro">','</span>');  
		$this->form_validation->set_rules('firstname', 'Nombre', 'trim|required|callback__alpha_dash_space');
        $this->form_validation->set_rules('telefon', 'Telefon', 'trim' );
		$this->form_validation->set_rules('email', 'email', 'trim|required|valid_email');
		$this->form_validation->set_rules('comentari', 'Comentari', 'trim|required|callback__alpha_dash_space');
        
        $this->form_validation->set_message('required', "Aquest camp es obligatori");
        $this->form_validation->set_message('alpha', "Només s'accepten lletres");
		$this->form_validation->set_message('valid_email', "Això no és una direcció de correu electronic.");
		$this->form_validation->set_message('very_correo', "Aquesta direcció de correu electronic no existeix.");

        
        if ($this->form_validation->run() == FALSE)
        {
        }
        else
        {			
        	$this->load->view('frontend/mis_enviat');
        }
	}

function alpha_dash_space($str)
	{
		return ( ! preg_match("/^([-a-z_ ])+$/i", $str)) ? FALSE : TRUE;
	}
}