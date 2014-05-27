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
	function congelar_serveis_noConsumits() {
		$servicios = $this->servei->get_serveis_noConsumit(null);
		$max_dies_congetal = $this->administrador->getMax_dies_congelat()->max_dias_congelado;
		$data_actual = date("Y-m-d");
		echo "<pre>";
		foreach($servicios as $servicio) {
			$data_congelacio = date($servicio->data_congelacio);
			$diff_noConsumits = date_diff(date_create($data_congelacio), date_create($data_actual))->days;
			var_dumb($data_congelacio);
		}
		
		

}

?>