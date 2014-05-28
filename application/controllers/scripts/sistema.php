<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Sistema extends CI_Controller {

	function __construct() {
		parent::__construct();
		$this->load->helper('url');
		$this->load->model('servei');
		$this->load->model('user');
		$this->load->model('lugares');
		$this->load->model('administrador');
	}
	
	function index() {
		$this->congelar_serveis_caducats();
		$this->congelar_serveis_noConsumits();
		$this->eliminar_serveis_congelats();
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
		foreach($servicios as $servicio) {
			$data_inici = strtotime($servicio->data_inici);
			$diff = ($data_actual - $data_inici)/3600/24;
			if ($diff>=intval($max_dies_noConsumit)) {
				$this->servei->congelarServei($servicio->id);
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

	function enviar_ofertas_mail() {
		//$usuarios = $this->user->get_inactius();
		$usuarios = $this->user->get_users();
		echo "<pre>";
		//var_dump($usuarios);
		//Enviem correu confirmacio compte
		$config = array(
			'charset' => 'utf-8',
			'newline' => '\r\n',
			'mailtype' => 'html',
			'protocol' => 'smtp',
			'smtp_host' => 'ssl://smtp.googlemail.com',
			'smtp_port' => 465,
			'smtp_user' => 'gcbtv0@gmail.com',
			'smtp_pass' => 'pepe123456',
			'charset' => 'iso-8859-1',
			'wordwrap' => TRUE
		);
		
		$this->load->library('email', $config);
		foreach($usuarios as $user) {
			
			$idprovincia = $this->lugares->get_provincia_by_cp($user->cp);
			//$pueblos = $this->lugares->get_pueblos_by_idProvincia($idprovincia->idprovincia);
			var_dump($idprovincia->idprovincia);
			
			/*$this->email->set_newline("\r\n");
			$this->email->from('gcbtv0@gmail.com', 'Oferta banc del temps');
			$this->email->to($user->email);
			$this->email->subject('Oferta serveis | Banc del temps');
			$this->email->message(
				"<h1>Confirmaci&oacute; registre banc del temps</h1><p>Hola ".$this->input->post("nombre", TRUE).",</p><p>Et donem la benvinguda al banc del temps, aquests s&oacute;n els teus identificadors d'acces:</p><p><ul><li><b>Usuari:</b>&nbsp;".$this->input->post("email", TRUE)."</li><li><b>Password:</b>&nbsp;".$this->input->post("pass", TRUE)."</li></ul></p><p>Per confirmar el registre accedeix al seguent link:<br/><a href='".base_url()."index.php/formularioregistro/confirmar/".$code."/".$this->input->post("email", TRUE)."'>CONFIRMAR REGISTRE</a></p><p>Si tens algun problema o dubte pots contactar amb el nostre suport tecnic: <a href='mailto:gcbtv0@gmail.com'><b>gcbtv0@gmail.com</b></a></p>"
			);
			if ($this->email->send())
				return true;
			else
				show_error($this->email->print_debugger());*/
			
		}
		echo "</pre>";
	}
	
}

?>