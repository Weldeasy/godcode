<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Buscar_servicio extends CI_Controller {

	function __construct() {
		parent::__construct();
		$this->load->model('servei');
	}
	
  function index() {
  	$data = array();
  	$ciutat = null;
    $dataInici = null;
    $dataFi = null;
    $categories = null;

  	if(isset($_POST['city'])){
  		$ciutat = $_POST['city'];
  	}
  	if (isset($_POST['datainici'])){
  		$dataInici = $_POST['datainici'];
  	}
  	if (isset($_POST['datafi'])){
  		$dataInici = $_POST['datafi'];
  	}
  	if (isset($_POST['categorias'])){
  		$categories = $_POST['categorias'];
  	}
  	$data['serveis']=$this->servei->busca_serveis($ciutat,$dataInici,$dataFi,$categories);
  	echo('<pre>');
  	var_dump($data);
  	echo('</pre>');
  }
}
?>