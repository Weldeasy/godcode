<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Aboutus extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	 
	 function __construct()
	  {
		parent::__construct();
	  }
	 
	public function index()
	{
		$data = array();
		$this->load->library('form_validation');
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

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */