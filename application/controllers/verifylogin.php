<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class VerifyLogin extends CI_Controller {

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
	$estat = $this->form_validation->run();
	//error.log("test");
    if($estat == FALSE)
    {
      //Field validation failed.  User redirected to login page
      $data['login_form'] = 'frontend/login_form';
    } else {
		 $session_data = $this->session->userdata('logged_in');
		 /*switch($estat) {
			case ADMIN:
				
				//redirect('admin/admin', 'refresh');
				print "admin";
				break;
			case CONGELAT:
				//redirect('frontent/congelat', 'refresh');
				print "congelat";
				break;
			case NOVERIFICAT:
				//redirect('frontent/verifica', 'refresh');
				print "no verificat";
				break;
			default:
				$data['email'] = $session_data['email'];
				$data['login_form'] = 'frontend/logued';
				break;
		 }*/
		 $data['login_form'] = 'frontend/logued';
		
    }
	$data['estat'] = 'asf';
    $this->load->view('frontend/inicio', $data);
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
          'email' => $row->email
        );
        $this->session->set_userdata('logged_in', $sess_array);
      }
	  
      return true; //estat_usuari($result);
		
    }
    else
    {
      $this->form_validation->set_message('check_database', 'Invalid email or password');
      return false;
    }
  }
  /*
  estat_usuari($usuari) devuelve el estado del usuario en funcion si es admin o no, y si la cuenta no esta congelada o no validada.
  */
  function estat_usuari($result) {
	$info = array();
	
    foreach($result as $row) {
        $info = array(
          'es_admin' => $row->es_admin,
          'esta_congelat' => $row->esta_congelat
        );
     }
	if ($info['es_admin']) {
		return ADMIN;
	} else {
		if($info['esta_congelat']==NOVERIFICAT) {
			return NOVERIFICAT;
		} else if($info['esta_congelat']==CONGELAT) {
			return CONGELAT;
		} else {
			return USUARI;
		}
	}
	return true;
  }
}
?>