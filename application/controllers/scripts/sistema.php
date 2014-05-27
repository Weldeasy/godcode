<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Sistema extends CI_Controller {

	function __construct() {
		parent::__construct();
		$this->load->helper('url');
		$this->load->model('servei');
		$this->load->model('administrador');
	}
	
	
	/**
	* Este metodo congela los servicios que han superado la data_fi
	*/
	function congelar_serveis_caducats() {
		$servicios = $this->servei->get_serveis(null);
		$data_actual = date("Y-m-d");
		foreach($servicios as $servicio) {
			$data_fi = date($servicio->data_fi);
			if ($data_actual>$data_fi) {
				$this->servei->congelarServei($servicio->id);
			}
		}
	}
	
	/**
	* Este metodo elimina los servicios congelados que han superado el tiempo determinado por el admin
	*/
	function eliminar_serveis_congelats() {
		$servicios = $this->servei->get_serveis(null);
		$data_actual = date("Y-m-d");
		$max_dies_congelat = $this->administrador->getMax_dies_congelat()->max_dias_congelado;
		echo "<pre>";
		foreach($servicios as $servicio) {
			$data_congelacio = date($servicio->data_congelacio);
			if($data_congelacio != null) {
				$data_congelacio = strtotime($data_congelacio);
				$data_actual = strtotime($data_actual);
				$diff = $data_actual - $data_congelacio;
				var_dump($diff);
			}
			/*if ($data_actual>$data_fi) {
				$this->servei->congelarServei($servicio->id);
			}*/
		echo "</pre>";
		}
	}	

}

?>