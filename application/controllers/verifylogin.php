<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class VerifyLogin extends CI_Controller {

	private $estat = 0;
	
  function __construct()
  {
    parent::__construct();
	define("USUARI", 1);
	define("ADMIN", 2);
	define("CONGELAT", 3);
	define("NOVERIFICAT", 4);
    $this->load->model('user', '', TRUE);
  }

  function index()
  {
    //This method will have the credentials validation
    $this->load->library('form_validation');

    $this->form_validation->set_rules('email', 'Email', 'trim|required');
    $this->form_validation->set_rules('password', 'Password', 'trim|required|callback_check_database');

    if($this->form_validation->run() == FALSE)
    {
      //Field validation failed.  User redirected to login page
      $data['login_form'] = 'frontend/login_form';

    } else {
		 $session_data = $this->session->userdata('logged_in');
		 $data['email'] = $session_data['email'];
		 $data['foto'] = $session_data['foto'];
		 $data['login_form'] = 'frontend/logued';
    }
	$data['estat'] = $this->session->userdata('estat');
    redirect('inicio', 'refresh');
  }
  
  function check_database($password)
  {
    //Field validation succeeded.  Validate against database
    $email = $this->input->post('email');
    
    //query the database
    $result = $this->user->login($email, $password);
    
    if($result)
    {
      $sess_array = array();
      foreach($result as $row)
      {
        $sess_array = array(
          'id' => $row->id,
          'email' => $row->email,
		  'es_admin' => $row->es_admin,
          'esta_congelat' => $row->esta_congelat,
		  'foto' => $row->foto
        );
        $this->session->set_userdata('logged_in', $sess_array);
		if ($sess_array['esta_congelat']==1) {
			$this->estat = 3; //Cuenta congelada
		} else if($sess_array['esta_congelat']==2) {
			$this->estat = 4; //Cuenta no verificada
		} else {
			if($sess_array['es_admin']==1) {
				$this->estat = 2; //Es admin
			} else {
				$this->estat = 1; //Es usuario
			}
		}
		$this->session->set_userdata('estat', $this->estat);
      }
      return true;
		
    }
    else
    {
      $this->form_validation->set_message('check_database', 'Invalid email or password');
      return false;
    }
  }
}
?>