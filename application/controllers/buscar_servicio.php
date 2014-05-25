<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Buscar_servicio extends CI_Controller {

	function __construct() {
		parent::__construct();
		$this->load->model('servei');
		
	}
	
	function index() {
		$data = array();
		$serveis = $this->buscar();
		$html = "";

		foreach($serveis as $row) {
			$data2 = array(
			  'id' => $row->id,
			  'nom' => $row->nom,
			  'descripcio' => $row->descripcio,
			  'preu' => $row->preu,
			  'data_inici' => $row->data_inici,
			  'data_fi' => $row->data_fi,
			  'horas' => explode(";", $row->disp_horaria),
			  'days' => explode(";", $row->disp_dies),
			  'categoria' => $row->categoria,
			  'usuari' => $row->usuari,
			  'cp' => $row->cp
			);

			$html = $html.$this->load->view('frontend/vista_servicio', $data2, true);
		}
	
		
		$data['html'] = $html;
		$data['login_form'] = "frontend/login_form";
		if($this->session->userdata('logged_in')) {
			$data['login_form'] = 'frontend/panel_inici/logued';
			$session_data = $this->session->userdata('logged_in');
			$data['email'] = $session_data['email'];
			$data['foto'] = $session_data['foto'];
			$data['es_admin'] = $session_data['es_admin'];
		}
		$this->load->view('frontend/resultado_servicios', $data);
		/*echo "<pre>";
		var_dump($data);
		echo "<pre>";*/
	}
	
	function buscar() {
		$data = array();
		$ciutat = null;
		$dataInici = null;
		$dataFi = null;
		$categories = null;

		if(isset($_POST['city'])){
			$ciutat = $_POST['city'];
		}
		if (isset($_POST['datainici'])){
			$dataInici = date("Y-m-d", strtotime($_POST['datainici']));
		}
		if (isset($_POST['datafi'])){
			$dataFi = $_POST['datafi'];
			$dataFi = date("Y-m-d", strtotime($_POST['datafi']));
		}
		if (isset($_POST['categorias'])){
			$categories = $_POST['categorias'];
		}
		
		
		return $this->servei->busca_serveis($ciutat,$dataInici,$dataFi,$categories);
		
		
	}
}
?>