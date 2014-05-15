<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Class Admin
 */
class Admin extends CI_Controller {
	/**
	 * [__construct del Admin]
	 */
	function __construct(){
    	parent::__construct();
		$this->load->database();
		$this->load->model('adm','',TRUE);
		$session_data = array();
		$session_data = $this->session->userdata('logged_in');
	}


	/**
	 * [index  admin panel]
	 * @return [void] [pagina inici del admin]
	 */
	
	public function index()
	{
		$estat = $this->session->userdata('estat');
		if($this->session->userdata('logged_in') && $estat==2) {
			
			$data['email'] = "hola"; //$this->session_data['email'];
			$data['panel_admin']=$this->load->view('backend/pages/panel_admin', null, TRUE);
			$this->load->view('backend/admin',$data);
		} else {
			echo "No tienes permisos";
		}
	}

	public function denuncies(){
		$data = array();
		$data['panel_admin'] = $this->load->view('backend/pages/denuncies',null, TRUE);
		$this->load->view('backend/admin',$data);
	}
	/**
	 * [json llista denuncies]
	 * @return [void] [Es carrega la vista json ]
	 */
	function jsonllistarDenuncies(){
		echo $this->adm->llistarDenuncies();
	}
	/**
	 * [jsonconeglarUsuaris description]
	 * @return [void] [description]
	 */
	function jsonconeglarUsuaris(){
		echo $this->adm->coneglarUsuaris();
	}
	/**
	 * [jsonllistarCategoria description]
	 * @return [void] [description]
	 */
	function jsonllistarCategoria(){
		echo $this->adm->llistarCategoria();	
	}
	/**
	 * [congelarusuaris vista]
	 * @return [void] [Es carrega la vista congelarusuaris]
	 */
	public function congelarusuaris(){  
		$data = array();
		$data['panel_admin'] = $this->load->view('backend/pages/congelarusuaris',null, TRUE);
		$this->load->view('backend/admin',$data);
	}

	/**
	 * [crearcategories vista]
	 * @return [void] [Es carrega la vista crearcategories]
	 */
	public function crearcategories(){
		$data = array();
		$data['panel_admin'] = $this->load->view('backend/pages/crearcategories',null, TRUE);
		$this->load->view('backend/admin',$data);
	}
	/**
	 * [configSaldo vista]
	 * @return [void] [Es carrega la vista configSaldo]
	 */
	public function configSaldo(){
		$data = array();
		$data['panel_admin'] = $this->load->view('backend/pages/configSaldo',null, TRUE);
		$this->load->view('backend/admin',$data);
	}
	/**
	 * [zona vista]
	 * @return [void] [Es carrega la vista zona]
	 */
	public function zona(){
		$data = array();
		$data['panel_admin'] = $this->load->view('backend/pages/zona',null, TRUE);
		$this->load->view('backend/admin',$data);
	}
	/**
	 * [numServeis vista]
	 * @return [void] [Es carrega la vista numServeis]
	 */
	public function numServeis(){	
		$data = array();
		$data['panel_admin'] = $this->load->view('backend/pages/numServeis',null, TRUE);
		$this->load->view('backend/admin',$data);
	}
	/**
	 * [numServeisConsumit vista]
	 * @return [void] [Es carrega la vista numServeisConsumit]
	 */
	public function numServeisConsumit(){
		$data = array();
		$data['panel_admin'] = $this->load->view('backend/pages/numServeisConsumit',null, TRUE);
		$this->load->view('backend/admin',$data);
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */