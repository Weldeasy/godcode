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
	
	function congelar_serveis_noConsumits() {
		$servicios = $this->servei->get_serveis_noConsumit();
		$data_actual = date("Y-m-d");
		$data_actual = strtotime($data_actual);
		$max_dies_noConsumit =  $this->administrador->getMax_dies_noConsumit()->max_dies_noConsumit;
		echo "<pre>";
		var_dump($data_actual);
		foreach($servicios as $servicio) {
			$data_inici = strtotime($servicio->data_inici);
			$diff = ($data_actual - $data_inici)/3600/24;
			var_dump($diff);
			if ($diff>=$max_dies_noConsumit) {
				//$this->servei->congelarServei($servicio->id);
			}
		}
		echo "</pre>";
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
				$diff = ($data_actual - $data_congelacio)/3600/24; // Dividir por segundos*horas para conseguir dias.
				if ($diff>=$max_dies_congelat) {
					$this->servei->eliminar_servicio($servicio->id);
				}
			}
		}
		echo "</pre>";
	}	
	
}

?>