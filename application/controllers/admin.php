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
		$this->data=$this->headerSidebar();
		$this->load->database();
		$this->load->model('adm','',TRUE);
	}
	/**
	 * [headerSidebar header, sidebar]
	 * @return [array] [diferent vistes]
	 */
	public function headerSidebar(){
		$data["header"]="backend/sections/head";
		$data["sidebar"]=$this->load->view('backend/pages/sidebar',null,TRUE);   
		return $data; 
	}

	/**
	 * [index  admin panel]
	 * @return [void] [pagina inici del admin]
	 */
	
	public function index()
	{
		$estat = $this->session->userdata('estat');
		if($this->session->userdata('logged_in') && $estat==2) {

			$data=$this->data;
			$data['panel_admin']=$this->load->view('backend/pages/panel_admin');
			$this->load->view('backend/admin',$data);
		} else {
			echo "No tienes permisos";
		}
	}

	public function denuncies(){   
		$data=$this->data;    
		$this->load->view('backend/pages/denuncies',$data);	
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
		$data=$this->data;     
		$this->load->view('backend/pages/congelarusuaris',$data);	
	}

	/**
	 * [crearcategories vista]
	 * @return [void] [Es carrega la vista crearcategories]
	 */
	public function crearcategories(){
	    $data=$this->data;  
		$this->load->view('backend/pages/crearcategories',$data);	
	}
	/**
	 * [configSaldo vista]
	 * @return [void] [Es carrega la vista configSaldo]
	 */
	public function configSaldo(){
		$data=$this->data;        
		$this->load->view('backend/pages/configSaldo',$data);	
	}
	/**
	 * [zona vista]
	 * @return [void] [Es carrega la vista zona]
	 */
	public function zona(){
		$data=$this->data;        
		$this->load->view('backend/pages/zona',$data);	
	}
	/**
	 * [numServeis vista]
	 * @return [void] [Es carrega la vista numServeis]
	 */
	public function numServeis(){
		$data=$this->data;         
		$this->load->view('backend/pages/numServeis',$data);	
	}
	/**
	 * [numServeisConsumit vista]
	 * @return [void] [Es carrega la vista numServeisConsumit]
	 */
	public function numServeisConsumit(){
		$data=$this->data;        
		$this->load->view('backend/pages/numServeisConsumit',$data);	
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */