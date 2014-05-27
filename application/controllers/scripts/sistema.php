<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Sistema extends CI_Controller {

	function __construct() {
		parent::__construct();
		$this->load->helper('url');
		$this->load->model('servei');
		$this->load->model('administrador');
	}

	function congelar_serveis() {
		$servicios = $this->servei->get_serveis_noConsumit(null);
		$max_dies_congetal = $this->administrador->getMax_dies_congelat()->max_dias_congelado;
		$data_actual = date("Y-m-d");
		echo "<pre>";
		foreach($servicios as $servicio) {
			$data_inici = date($servicio->data_inici);
			$diff = date_diff(date_create($data_inici), date_create($data_actual))->days;
			var_dump($diff);
		}
		echo "</pre>";
	}

}

?>