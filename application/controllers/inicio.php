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
    	$login_view = "";
    	$estat = $this->session->userdata('estat');
    	if($this->session->userdata('logged_in')) {
        		switch($estat) {
        			case '1':
        			case '2':
        				$session_data = $this->session->userdata('logged_in');
        				$data['email'] = $session_data['email'];
        				$data['foto'] = $session_data['foto'];
                $data['esta_loguejat']=true;


                $categorias = $this->categorias->get_categorias();
                  foreach($categorias as $row) {
                    $data['categorias'][$row['id']] = $row['nom'];
                  }
                $login_view = 'frontend/panel_inici/logued';
                $data['contingut']=$this->load->view('frontend/panel_inici/panel_principal',$data,TRUE);
        		
        				break;
        			case '3':
        				$login_view = 'frontend/panel_inici/logued';
        				$data['contingut']=$this->load->view('frontend/panel_inici/congelat',$data,TRUE);
   
        			case '4':
        				$login_view = 'frontend/panel_inici/logued';
        				$data['contingut']=$this->load->view('frontend/panel_inici/verifica',$data,TRUE);
        				break;
        		}
            $data['login_form'] = $login_view;
            $this->load->view('frontend/inicio', $data);
    
        }else{
      		$categorias = $this->categorias->get_categorias();
      		foreach($categorias as $row) {
      			$data['categorias'][$row['id']] = $row['nom'];
      		}
      		$data['login_form'] = 'frontend/login_form';
      		$data['contingut']=$this->load->view('frontend/panel_inici/panel_principal',$data,TRUE);
      		$this->load->view('frontend/inicio', $data);
      	}
  }
}

?>