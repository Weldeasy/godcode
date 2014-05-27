<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Sistema extends CI_Controller {

	function __construct() {
		parent::__construct();
		$this->load->helper('url');
		$this->load->model('servei');
		$this->load->model('administrador');
	}
	
	
	/**
	* Este metodo congela los servicios que no se han consumido nunca pasado cierto tiempo.
	* Tambien congela los servicios que han superado la data_fi
	*/
	function congelar_serveis_caducats() {
		$servicios = $this->servei->get_serveis(null);
		$data_actual = date("Y-m-d");
		echo "<pre>";
		foreach($servicios as $servicio) {
			$data_fi = date($servicio->data_fi);
			if ($data_actual>$data_fi) {
				$this->servei->congelarServei($servicio->id);
			}
		}
	}
		
		

}

?>