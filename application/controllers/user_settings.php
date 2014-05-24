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
	
  function index() {
	$this->load->view('frontend/user_settings/inicio', $this->data);
  }
  
  function mostrar_missatge($m) {
	$this->data['missatge'] = $m;
	$this->load->view('frontend/user_settings/resultat', $this->data);
  }
  
  /***************************************************PERFIL*************************************************************/
  function perfil() {
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
  
  function validar_perfil() {
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
		$temp = $this->user->get_user_by_email($this->data['email']);
		$foto = $temp->foto;
		if ($_FILES['foto']['name'] != '') {
			$this->load->library('upload_img');
			$this->upload_img->upload_image($temp->codigo_registro, $this->input->post('nombre'));
			$img_type = substr($_FILES['foto']['type'], strrpos($_FILES['foto']['type'], '/') + 1);
			$foto = $this->input->post('nombre')."_".$temp->codigo_registro.".".$img_type;
		}
		$temp = array();
		if ($this->user->update_perfil($this->data['email'], $this->input->post('nombre'), $this->input->post('apellidos'), $this->input->post('sexo'), $this->input->post('provincia'), $this->input->post('poblacio'), $this->input->post('cp'), $this->input->post('descrivete'), $foto))
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
	$data2 = array();
	$id = $this->session->userdata('id');
	$serveis = $this->servei->get_serveis($id);
	$html = "";

		foreach($serveis as $row) {
			$data2 = array(
			  'id' => $row->id,
			  'nom' => $row->nom,
			  'descripcio' => $row->descripcio,
			  'preu' => $row->preu,
			  'data_inici' => $row->data_inici,
			  'data_fi' => $row->data_fi,
			  'disp_horaria' => $row->disp_horaria,
			  'categoria' => $row->categoria,
			  'usuari' => $row->usuari
			);

			$html = $html.$this->load->view('frontend/vista_servicio', $data2, true);
		}
	
	
	$this->data['html'] = $html;
	
	$this->load->view('frontend/user_settings/serveis', $this->data);

  }
  
  function crear_servei() {
	$this->load->view('frontend/user_settings/alta_servei', $this->data);
  }
  
  //function validar_editar_servei() {
	function validar_servicio() {
	
	echo "yea";
	$this->form_validation->set_rules('nombreServicio', 'Nom del servei', 'required');
	$this->form_validation->set_rules('descripcionServicio', 'descripcionServicio', 'required');
	$this->form_validation->set_rules('precioServicio', 'Nom del servei', 'required');
	$this->form_validation->set_rules('dataFi', 'Nom del servei', 'required');
	$this->form_validation->set_rules('dispHorServicio', 'Nom del servei', 'required');
	$this->form_validation->set_rules('diaServicio', 'Nom del servei', 'required');
	$this->form_validation->set_rules('categoriaServicio', 'Nom del servei', 'required');
	$this->form_validation->set_rules('cpServicio', 'Nom del servei', 'required');
	if ($this->form_validation->run() == FALSE)	{
		echo "YES";
		
	} else {
		echo "NOPE";
			
	}
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	/*$this->form_validation->set_rules('days', 'Dias', 'required');
	$this->form_validation->set_message('required', "No has seleccionat cap dia");
	if ($this->form_validation->run() == FALSE)
	{
		$this->editar_servei($this->input->post("id"));
	}else
	{
		$disponibilitat_horaria = $this->input->post("hores");
		$disponibilitat_dies = "";
		$dies = $this->input->post("days");
		foreach ($dies as $key => $value) {
			$disponibilitat_dies .= $dies[$key].";";
		}
		$dades_servei = array(
			"id" => $this->input->post("id"),
			"nom" => $this->input->post("nom"),
			"descripcio" => $this->input->post("descripcio"),
			"preu" => $this->input->post("preu"),
			"categoria" => $this->input->post("categoria"),
			"disp_horaria" => $disponibilitat_horaria,
			"disp_dies" => $disponibilitat_dies
		);
		
		if ($this->servei->actualitzar_servei($dades_servei))
			$missatge = "Servei actualitzat Ok!";
		else
			$missatge = "S'ha produit un error, torna a provar-ho.";
			
		$this->editar_servei($dades_servei['id'], $missatge);
	}*/
  }
  
  function editar_servei($id, $missatge = null) {
		$this->db->select('*');
		$this->db->from('servei s');
		$this->db->where('s.id = '.$id);
		$query = $this->db->get();
		$dades_servei = $query->result();
	
		$dies = explode(';', $dades_servei[0]->disp_dies);
		$hores = explode('-', $dades_servei[0]->disp_horaria);
		$hora1 = explode(':', $hores[0]);
		$hora1 = $hora1[0];
		$hora2 = explode(':', $hores[1]);
		$hora2 = $hora2[0];
		
		$data = array();
		$data['email'] = $this->data['email'];
		$data['id'] = $dades_servei[0]->id;
		$data['nom'] = utf8_encode($dades_servei[0]->nom);
		$data['preu'] = $dades_servei[0]->preu;
		$data['hora_inici'] = $hora1;
		$data['hora_fi'] = $hora2;
		$data['disponibilitat_dies'] = $dies;
		$data['categoria'] = $dades_servei[0]->categoria;
		$data['descripcio'] = $dades_servei[0]->descripcio;
		
		$categories = $this->categorias->get_categorias();
		foreach ($categories as $valor) {
			$data['categories'][$valor['id']] = $valor['nom'];
		}
		
		if (!is_null($missatge)) { $data['missatge'] = $missatge; }
		
		$this->load->view("frontend/user_settings/editar_servei", $data);
	}
  
  /***************************************************SERVEIS*************************************************************/
  /***************************************************OPCIONS*************************************************************/
  function opcions() {
	$this->load->view('frontend/user_settings/opcions', $this->data);
  }
  /***************************************************OPCIONS*************************************************************/
  
}

?>