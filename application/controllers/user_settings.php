<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
session_start();
class User_settings extends CI_Controller {

	private $data = array();
	
  function __construct()
  {
    parent::__construct();
	if ($this->session->userdata('logged_in') == FALSE)
		redirect('inicio');
	$this->load->helper(array('url', 'form'));
	$this->load->model(array('user', 'categorias', 'servei'));
	$this->load->library(array('form_validation', 'grocery_CRUD'));
	$session_data = $this->session->userdata('logged_in');
	$this->data['email'] = $session_data['email'];
  }

  function index()
  {
	$this->load->view('frontend/user_settings/inicio', $this->data);
  }
  function mostrar_missatge($m) {
	$this->data['missatge'] = $m;
	$this->load->view('frontend/user_settings/resultat', $this->data);
  }
  
  /***************************************************PERFIL*************************************************************/
  function perfil()
  {
	$dades = array();
	$dades = $this->user->get_user_by_email($this->data['email']);
	
	if ($this->input->post('nombre'))
		$nom = $this->input->post('nombre');
	else
		$nom = $dades->nom;
	
	if ($this->input->post('apellidos'))
		$cognom = $this->input->post('apellidos');
	else
		$cognom = $dades->cognom;
		
	if ($this->input->post('sexo'))
		$sexe = $this->input->post('sexo');
	else
		$sexe = $dades->sexe;
		
	if ($this->input->post('descrivete'))
		$presentacio = $this->input->post('descrivete');
	else
		$presentacio = $dades->presentacio;
	
	$this->data['id'] = $dades->id;
	$this->data['nom'] = $nom;
	$this->data['cognom'] = $cognom;
	$this->data['data_inscripcio'] = $dades->data_inscripcio;
	$this->data['saldo'] = $dades->saldo;
	$this->data['sexe'] = $sexe;
	$this->data['presentacio'] = $presentacio;
	$this->data['poblacio'] = $dades->poblacio;
	$this->data['cp'] = $dades->cp;
	$this->data['provincia'] = $dades->provincia;
	$this->data['foto'] = $dades->foto;
	
	$this->load->library(array('provincies', 'poblacions'));
	$provincies = $this->provincies->get_provincies();
	$prov = array();
	foreach ($provincies as $valor) {
		$prov[$valor['idprovincia']] = $valor['provincia'];
	}
	
	$this->data['provincies'] = $prov;
	$this->data['poblacions'] = $this->poblacions->get_poblacions();
	
	$this->load->view('frontend/user_settings/perfil', $this->data);
  }
  function validar_perfil()
  {
	$this->form_validation->set_error_delimiters('<span class="error_formulario_registro">','</span>');  
	$this->form_validation->set_rules('nombre', 'Nombre', 'trim|required|callback__alpha_dash_space|alpha');
	$this->form_validation->set_rules('apellidos', 'Apellidos', 'callback__alpha_dash_space|alpha');
	
	$this->form_validation->set_message('required', "Aquest camp es obligatori");
	$this->form_validation->set_message('alpha', "Nom&eacute;s s'accepten lletres");
	
	if ($this->form_validation->run() == FALSE)
	{
		$this->perfil();
	}
	else
	{
		if ($this->user->update_perfil($this->data['email'], $this->input->post('nombre'), $this->input->post('apellidos'), $this->input->post('sexo'), $this->input->post('provincia'), $this->input->post('poblacio'), $this->input->post('cp'), $this->input->post('descrivete')))
			$mensaje = "Perfil actualitzat correctament";
		else
			$mensaje = "S'ha produit un error, torna a provar-ho més tard. Si segueix passant contacte amb l'administrador.";
			
		$this->mostrar_missatge($mensaje);
	}
  }
  function alpha_dash_space($str)
	{
		return ( ! preg_match("/^([-a-z_ ])+$/i", $str)) ? FALSE : TRUE;
	}
	
  /***************************************************PERFIL*************************************************************/
  /***************************************************SERVEIS*************************************************************/
  
  function serveis() {
	$data = array();
	$id = $this->session->userdata('id');
	$serveis = $this->servei->get_serveis($id);
	if ($serveis) {
		foreach($serveis as $row) {
			$row->usuari;
		}
	}
	/*echo "<pre>";
	var_dump($serveis);
	echo "<pre>";*/
	

  }
  
  /***************************************************SERVEIS*************************************************************/
  /***************************************************OPCIONS*************************************************************/
  function opcions()
  {
	$this->load->view('frontend/user_settings/opcions', $this->data);
  }
  /***************************************************OPCIONS*************************************************************/
  
}

?>