<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class VerifyLogin extends CI_Controller {

  function __construct()
  {
    parent::__construct();
    $this->load->model('login', null, TRUE);
  }

  function index()
  {
    //This method will have the credentials validation
    $this->load->library('form_validation');

    $this->form_validation->set_rules('email', 'Email', 'trim|required|xss_clean');
    $this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean|callback_check_database');
	
    if($this->form_validation->run() == FALSE)
    {
      //Field validation failed.  User redirected to login page
      $data['login_form'] = 'frontend/login_form';
    }
    else
    {
	 $session_data = $this->session->userdata('logged_in');
	 $data['email'] = $session_data['email'];
	 $data['login_form'] = 'frontend/logued';
    }
    $this->load->view('frontend/inicio', $data);
  }
  
  function check_database($password)
  {
    //Field validation succeeded.  Validate against database
    $email = $this->input->post('email');
    
    //query the database
    $result = $this->login->index($email, $password);
    
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
      return TRUE;
    }
    else
    {
      $this->form_validation->set_message('check_database', 'Invalid email or password');
      return false;
    }
  }
}
?>