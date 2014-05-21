<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Detailusuari extends CI_Controller {

  function __construct(){
      parent::__construct();
      $this->load->helper('url');
      $this->load->library('form_validation');
      $this->load->helper(array('form'));
      $this->load->model('user');
  }
	
  function index() {
    	if(isset($_POST['cercar_user'])){
    		$cercar_user = $_POST['cercar_user'];  

        if($this->session->userdata('logged_in')) {
            $session_data = $this->session->userdata('logged_in');
            $data['email'] = $session_data['email'];
            $data['login_form'] = null;
        }else{
            $data['login_form'] = 'frontend/login_form';
        }
        
        $data['users']=$this->user->cercar_user_servei($cercar_user);
        $data['contingut']=$this->load->view('frontend/panel_inici/detailusuari',$data['users']);
        $this->load->view('frontend/inicio', $data);
      }else{
        echo "no existe";
      }
  }
}
?>