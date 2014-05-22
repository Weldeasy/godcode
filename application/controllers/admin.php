<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Class Admin
 */
class Admin extends CI_Controller {
	/**
	 * [$session_data té la informació del login]
	 * @var [array]
	 */
	 private $session_data; 
	 
	 /**
	  * [__construct del Admin]
	  */
	function __construct(){
    	parent::__construct();
 		$this->es_autentificat();//crida la funció aqui, perquè es validar tots els controladors del admin.
		$this->load->database();//es carrega la BD
		$this->load->model('administrador','adm',TRUE);//també el model del admin
	}
	/**
	 * [es_autentificat si comprova si usuari es admin amb el estat es igual a 2]
	 * @return [boolean] [description]
	 */
	function es_autentificat(){
		$estat= $this->session->userdata('estat');
		$this->session_data = $this->session->userdata('logged_in');

		if(!$this->session_data || $estat!=2) {
			 redirect('no_autentificat', 'refresh');
			return FALSE;
		}else{
			return TRUE;
		}
	}
	/**
	 * [passemVistaAlPanelAdmin description]
	 * @param  [array] $data [alla es guarda una vista carregada]
	 * @return [void]       [es carrega una vista del panel del admin]
	 */
	public function passemVistaAlPanelAdmin($data){ //passem una vista concreta al admin.php
		$data['email'] = $this->session_data['email'];//també passem el email del admin
		$this->load->view('backend/admin',$data);	
	}

	/**
	 * [index  admin panel]
	 * @return [void] [pagina inici del admin]
	 */
	
	public function index()
	{
		$data['panel_admin']=$this->load->view('backend/pages/panel_admin', $data, TRUE);
		$this->passemVistaAlPanelAdmin($data);
	}

	public function denuncies(){
		$data['panel_admin'] = $this->load->view('backend/pages/denuncies',null, TRUE);
		$this->passemVistaAlPanelAdmin($data);
	}
	/**
	 * [congelarusuaris vista]
	 * @return [void] [Es carrega la vista congelarusuaris]
	 */
	public function congelarusuaris(){  
		$data['panel_admin'] = $this->load->view('backend/pages/congelarusuaris',null, TRUE);
		$this->passemVistaAlPanelAdmin($data);
	}

	/**
	 * [crearcategories vista]
	 * @return [void] [Es carrega la vista crearcategories]
	 */
	public function crearcategories(){
		$data['panel_admin'] = $this->load->view('backend/pages/crearcategories',null, TRUE);
		$this->passemVistaAlPanelAdmin($data);
	}
	/**
	 * [configSaldo vista]
	 * @return [void] [Es carrega la vista configSaldo]
	 */
	public function configSaldo(){
		$data['panel_admin'] = $this->load->view('backend/pages/configSaldo',null, TRUE);
		$this->passemVistaAlPanelAdmin($data);
	}
	/**
	 * [zona vista]
	 * @return [void] [Es carrega la vista zona]
	 */
	public function zona(){
		$data['panel_admin'] = $this->load->view('backend/pages/zona',null, TRUE);
		$this->passemVistaAlPanelAdmin($data);
	}
	/**
	 * [numServeis vista]
	 * @return [void] [Es carrega la vista numServeis]
	 */
	public function numServeis(){	
		$data['panel_admin'] = $this->load->view('backend/pages/numServeis',null, TRUE);
		$this->passemVistaAlPanelAdmin($data);
	}
	/**
	 * [numServeisConsumit vista]
	 * @return [void] [Es carrega la vista numServeisConsumit]
	 */
	public function numServeisConsumit(){
		$data['panel_admin'] = $this->load->view('backend/pages/numServeisConsumit',null, TRUE);
		$this->passemVistaAlPanelAdmin($data);
	}
	/**
	 * SON LES VISTES QUE RETORNA JSON, UTILITZA PER CARREGAR-SE DATAGRID JEASYUI (/media/jquery/admin.js)
	 */

	/**
	 * [json llista denuncies]
	 * @return [void] [Es carrega la vista json ]
	 */
	function jsonllistarDenuncies(){
		echo json_encode($this->adm->llistarDenuncies());
	}
	/**
	 * [jsonconeglarUsuaris description]
	 * @return [void] [description]
	 */
	function jsonconeglarUsuaris(){
		echo json_encode($this->adm->coneglarUsuaris());
	}
	/**
	 * [jsonllistarCategoria description]
	 * @return [void] [description]
	 */
	function jsonllistarCategoria(){
		echo json_encode($this->adm->llistarCategoria());	
	}

	function eliminarCategoria_control(){
		if(isset($_POST['id'])){
			$id=$_POST['id'];
			echo json_encode($this->adm->eliminarCategoria($id));
		}else{
			echo json_encode("error al via post");
		}
	}
	function crearCategoria_control(){
		$nom=mysql_real_escape_string($_POST['nom_cat']);
		$descripcio=mysql_real_escape_string($_POST['descripcio_cat']);
		echo json_encode($this->adm->afegirCategoria($nom,$descripcio));
	}
	function actualitzarCategoria_control(){
		$id=$_GET['id'];
		$nom=mysql_real_escape_string($_POST['nom_cat']);
		$descripcio=mysql_real_escape_string($_POST['descripcio_cat']);
		echo json_encode($this->adm->actualitzarCategoria($nom,$descripcio,$id));
	}
	
	function actualitzarUsuari_control(){
		$id=$_GET['id'];
		$esta_congelat=mysql_real_escape_string($_POST['esta_congelat_user']);
		echo json_encode($this->adm->actualitzarUsuari($esta_congelat,$id));	
	}
<<<<<<< HEAD
	function getSaldoMinim_control(){
		$array=$this->adm->getSaldoMinim();
		$saldo_minim=0;
		foreach ($array as $key) {
			return $key->saldo_minim;
		}
	}	

	function setSaldoMinim_control(){
		$saldo_minim=mysql_real_escape_string($_POST['saldo_minim']);;	
		if($this->adm->setSaldoMinim($saldo_minim)){
			$this->configSaldo();
		}	
	}
=======
>>>>>>> parent of 05ff5ed... changes admin
}
	public function numero_denuncies(){
			return $this->getNumeroDenuncies_control();
		}

	function getNumeroDenuncies_control(){
		$array=$this->adm->getLlistarDenuncies();
		var_dump($array);
		}

	function getSaldoMinim_control(){
		$array=$this->adm->getLlistarDenuncies();
		$denuncies_num=0;
		foreach ($array as $key) {
			return $key->denuncies_num;
		}
	}	
	}
/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */