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
		$this->load->helper('url');
        $this->load->library('gcharts');
        
	}
	/**
	 * [es_autentificat si comprova si usuari es admin amb el estat es igual a 2]
	 * @return [boolean] [description]
	 */
	function es_autentificat(){
		$estat= $this->session->userdata('estat');
		$this->session_data = $this->session->userdata('logged_in');

		if(!$this->session_data || $estat!=2) {
			 redirect('inicio/no_autentificat', 'refresh');
			return FALSE;
		}else{
			return TRUE;
		}
	}
	/**
	 * [vista_panel_admin description]
	 * @param  [type] $ruta [les rutes de les vistes]
	 * @return [void]       [es carrega la pagina inicial del admin]
	 */
	public function vista_panel_admin($ruta){
		$data['ruta']=$ruta;


		if($ruta=='configSaldo'){//quan tenim la vista configsaldo, pasem el saldo minim.
			$data['saldo_minim_BD']=$this->getSaldoMinim_control();
			$data['max_dies_congelat']=$this->getMax_dies_congelat_control();
		}

		$data['panel_admin']=$this->load->view('backend/pages/'.$ruta,$data,TRUE);
		$data['email'] = $this->session_data['email'];//també passem el email del admin al vista admin.
		$this->load->view('backend/admin',$data);	
	}

	/**
	 * [index  admin panel]
	 * @return [void] [es carrega pagina inici del admin i passem la ruta es diu 'panel_admin']
	 */
	
	public function index()
	{
		$this->vista_panel_admin('panel_admin');
	}
	/**
	 * [denuncies la vista denuncies]
	 * @return [type] [es carrega pagina inici del admin i passem la ruta es diu 'denuncies']
	 */
	public function denuncies(){
		$this->vista_panel_admin('denuncies');
	}
	/**
	 * [congelarusuaris vista]
	 * @return [void] [Es carrega la vista congelarusuaris]
	 */
	public function congelarusuaris(){  
		$this->vista_panel_admin('congelarusuaris');
	}

	/**
	 * [crearcategories vista]
	 * @return [void] [Es carrega la vista crearcategories]
	 */
	public function crearcategories(){
		$this->vista_panel_admin('crearcategories');
	}
	/**
	 * [configSaldo vista]
	 * @return [void] [Es carrega la vista configSaldo]
	 */
	public function configSaldo(){
		$this->vista_panel_admin('configSaldo');
	}
	/**
	 * [zona vista]
	 * @return [void] [Es carrega la vista zona]
	 */
	
	/**
	 * [numServeis vista]
	 * @return [void] [Es carrega la vista numServeis]
	 */
	public function numServeis(){	
		$this->vista_panel_admin('numServeis');
	}
	/**
	 * [numServeisConsumit vista]
	 * @return [void] [Es carrega la vista numServeisConsumit]
	 */
	public function numServeisConsumit(){
		$this->vista_panel_admin('numServeisConsumit');
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

	/**
	 * [eliminarCategoria_control si s'ha fet eliminat correctament o no]
	 * @return [json] [amb les dades true or false]
	 */
	function eliminarCategoria_control(){
		if(isset($_POST['id'])){
			$id=$_POST['id'];
			echo json_encode($this->adm->eliminarCategoria($id));
		}else{
			 redirect('/inicio', 'refresh');
		}
	}
	/**
	 * [crearCategoria_control si s'ha fet creat correctament o no]
	 * @return [json] [amb les dades true or false]
	 */
	function crearCategoria_control(){
		if(isset($_POST['nom_cat'])){
			$nom=mysql_real_escape_string($_POST['nom_cat']);
			$descripcio=mysql_real_escape_string($_POST['descripcio_cat']);
			echo json_encode($this->adm->afegirCategoria($nom,$descripcio));
		}else{
			 redirect('/inicio', 'refresh');	
		}
	}

	/**
	 * [actualitzarCategoria_control si s'ha fet actualizat correctament o no]
	 * @return [json] [amb les dades true or false]
	 */
	function actualitzarCategoria_control(){
		if(isset($_GET['id'])){
			$id=$_GET['id'];
			$nom=mysql_real_escape_string($_POST['nom_cat']);
			$descripcio=mysql_real_escape_string($_POST['descripcio_cat']);
			echo json_encode($this->adm->actualitzarCategoria($nom,$descripcio,$id));
		}else{
			 redirect('/inicio', 'refresh');
		}
	}
	/**
	 * [actualitzarEstatDenuncia_control si s'ha fet actualizat correctament o no]
	 * @return [json] [amb les dades true or false]
	 */
	function actualitzarEstatDenuncia_control(){
		if(isset($_GET['id_rec'])){
			$id=$_GET['id_rec'];
			$estat=$_POST['estat_denuncia'];
			echo json_encode($this->adm->actualitzarDenuncia($id,$estat));
		}else{
			 redirect('/inicio', 'refresh');
		}
	}
	/**
	 * [actualitzarUsuari_control si s'ha fet actualizat al estat del usuari correctament o no]
	 * @return [json] [amb les dades true or false]
	 */
	function actualitzarUsuari_control(){
		if(isset($_GET['id'])){
			$id=$_GET['id'];
			$esta_congelat=mysql_real_escape_string($_POST['esta_congelat_user']);
			echo json_encode($this->adm->actualitzarUsuari($esta_congelat,$id));
		}else{
			 redirect('/inicio', 'refresh');
		}	
	}
	/**
	 * [getSaldoMinim_control retorna un int, saldo minim]
	 * @return [int] [saldo minim del banc del temps]
	 */
	function getSaldoMinim_control(){
		$saldo_minim=$this->adm->getSaldoMinim()->saldo_minim;
		return $saldo_minim;
	}
	
	function getMax_dies_congelat_control() {
		$max_dies_congelat=$this->adm->getMax_dies_congelat()->max_dias_congelado ;
		return $max_dies_congelat;
	}
	
	/**
	 * [setSaldoMinim_control actualitzat el saldo minim]
	 */
	function setSaldoMinim_control(){
		$saldo_minim=mysql_real_escape_string($_POST['saldo_minim']);;	
		if($this->adm->setsaldominim($saldo_minim)){
			$this->configSaldo();
		}	
	}
	function setMax_dies_congelat() {
		$max_dies_congelat=mysql_real_escape_string($_POST['max_dies_congelat']);;	
		if($this->adm->setMax_dies_congelat($max_dies_congelat)){
			$this->configSaldo();
		}	
	}
	function zona(){
		$this->gcharts->load('ColumnChart');
        $zonas= $this->adm->serveisPerProvincia();
        
        $dataTable = $this->gcharts->DataTable('Provincia');

        $dataTable->addColumn('string', 'Provincia', 'provincias');
        $dataTable->addColumn('number', 'Provincia', 'population');
        foreach ($zonas as $row) {
        	echo $row ->provincia;
        	echo $row ->numero;
        	$dataTable->addRow(array($row->provincia, $row->numero));
        } 

        $config = array(
            'title' => 'provincias'
        );

        $data['grafica'] = $this->gcharts->ColumnChart('Provincia');
        $data['panel_admin'] = $this->load->view('backend/pages/zona', $data, TRUE);
        $data['email'] = $this->session_data['email'];
        $this->load->view('backend/admin', $data);
        
}

function mitjaServeis(){
		$data['mitja']=$this->adm->mitjaServeisPerUsuari(); 
		$data['panel_admin'] = $this->load->view('backend/pages/numServeis', $data, TRUE);
        $data['email'] = $this->session_data['email'];
        $this->load->view('backend/admin', $data);
        
}
function numeroServeisConsumit(){
		$data['numSC']=$this->adm->numeroServeisConsumits();
		$data['panel_admin']=$this->load->view('backend/pages/' ,$data,TRUE);
	}
		
}
/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */