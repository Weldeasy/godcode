<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
session_start();
class Inicio extends CI_Controller {

  function __construct()
  {
    parent::__construct();
  	$this->load->helper('url');
  	$this->load->library('form_validation');
  	$this->load->helper(array('form'));
  	$this->load->model('categorias');
  }

  function index(){
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

<<<<<<< HEAD
      				break;
      		}
        }else{
    		$data['categorias'] = $this->categorias->get_categorias();
    		$data['login_form'] = 'frontend/login_form';
    		$data['contingut']=$this->load->view('frontend/panel_inici/panel_principal',$data,TRUE);
    		$this->load->view('frontend/inicio', $data);
    	}
=======
				break;
		}
    }else{
		$categorias = $this->categorias->get_categorias();
		foreach($categorias as $row) {
			$data['categorias'][$row['id']] = $row['nom'];
		}
		$data['login_form'] = 'frontend/login_form';
		$data['contingut']=$this->load->view('frontend/panel_inici/panel_principal',$data,TRUE);
		$this->load->view('frontend/inicio', $data);
	}
>>>>>>> 3c1af08bbd666df4cde855b971b1388433b0ee96
  }
  function aboutus(){
      $data = array();
      
      if($this->session->userdata('logged_in')) {
        $session_data = $this->session->userdata('logged_in');
        $data['email'] = $session_data['email'];
        $data['login_form'] = null;
      }else{
        $data['login_form'] = 'frontend/login_form';
      }
      $data['contingut']=$this->load->view('frontend/panel_inici/aboutus',null,TRUE);
      $this->load->view('frontend/inicio', $data);
  }
   function contacte(){
      $data = array();
      if($this->session->userdata('logged_in')) {
        $session_data = $this->session->userdata('logged_in');
        $data['email'] = $session_data['email'];
        $data['login_form'] = null;
      }else{
        $data['login_form'] = 'frontend/login_form';
      }
      $data['contingut']=$this->load->view('frontend/panel_inici/contacte',null,TRUE);
      $this->load->view('frontend/inicio', $data);
  }
  function infousuari(){
      $data = array();
      if($this->session->userdata('logged_in')) {
          $session_data = $this->session->userdata('logged_in');
          $data['email'] = $session_data['email'];
          $data['login_form'] = null;
      }else{
          $data['login_form'] = 'frontend/login_form';
      }
      $data['contingut']=$this->load->view('frontend/panel_inici/info_usuari',null,TRUE);
      $this->load->view('frontend/inicio', $data);
  }


  public function validar(){
        $this->form_validation->set_error_delimiters('<span class="error_formulario_registro">','</span>');  
        $this->form_validation->set_rules('firstname', 'Nombre', 'trim|required|callback__alpha_dash_space');
        $this->form_validation->set_rules('telefon', 'Telefon', 'trim' );
        $this->form_validation->set_rules('email', 'email', 'trim|required|valid_email');
        $this->form_validation->set_rules('comentari', 'Comentari', 'trim|required|callback__alpha_dash_space');
            
        $this->form_validation->set_message('required', "Aquest camp es obligatori");
        $this->form_validation->set_message('alpha', "Només s'accepten lletres");
        $this->form_validation->set_message('valid_email', "Això no és una direcció de correu electronic.");
        $this->form_validation->set_message('very_correo', "Aquesta direcció de correu electronic no existeix.");

        
        if($this->form_validation->run() == FALSE){
        
        }else{      
          $this->load->view('frontend/mis_enviat');
        }
  }

  function alpha_dash_space($str){
        return ( ! preg_match("/^([-a-z_ ])+$/i", $str)) ? FALSE : TRUE;
  }

}

?>