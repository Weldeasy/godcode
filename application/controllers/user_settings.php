<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
session_start();
class User_settings extends CI_Controller {

  private $data = array();
	
  function __construct(){
    parent::__construct();
	if ($this->session->userdata('logged_in') == FALSE)
		redirect('inicio');
		$this->load->helper(array('url', 'form'));
		$this->load->model(array('user', 'categorias', 'servei', 'lugares'));
		$this->load->library(array('form_validation', 'grocery_CRUD'));
		$session_data = $this->session->userdata('logged_in');
		$this->data['email'] = $session_data['email'];
  }
	
  function index() {
	$this->load->view('frontend/user_settings/inicio', $this->data);
  }
  
  function mostrar_missatge($m) {
	$this->data['missatge'] = $m;
	$this->load->view('frontend/user_settings/resultat', $this->data);
  }
  
  /***************************************************PERFIL*************************************************************/
  function perfil() {
	$dades = array();
	$dades = $this->user->get_user_by_email($this->data['email']);
	
	if ($this->input->post('nombre'))
		$nom = $this->input->post('nombre');
	else
		$nom = $dades->nom;
	
	if ($this->input->post('apellidos'))
		$cognom = $this->input->post('apellidos');
	else
		$cognom = $dades->cognom;
		
	if ($this->input->post('sexo'))
		$sexe = $this->input->post('sexo');
	else
		$sexe = $dades->sexe;
		
	if ($this->input->post('descrivete'))
		$presentacio = $this->input->post('descrivete');
	else
		$presentacio = $dades->presentacio;
	
	$this->data['id'] = $dades->id;
	$this->data['nom'] = $nom;
	$this->data['cognom'] = $cognom;
	$this->data['data_inscripcio'] = $dades->data_inscripcio;
	$this->data['saldo'] = $dades->saldo;
	$this->data['sexe'] = $sexe;
	$this->data['presentacio'] = $presentacio;
	$this->data['poblacio'] = $dades->poblacio;
	$this->data['cp'] = $dades->cp;
	$this->data['provincia'] = $dades->provincia;
	$this->data['foto'] = $dades->foto;
	
	$this->load->library(array('provincies', 'poblacions'));
	$provincies = $this->provincies->get_provincies();
	$prov = array();
	foreach ($provincies as $valor) {
		$prov[$valor['idprovincia']] = $valor['provincia'];
	}
	
	$this->data['provincies'] = $prov;
	$this->data['poblacions'] = $this->poblacions->get_poblacions();
	
	$this->load->view('frontend/user_settings/perfil', $this->data);
  }
  
  function validar_perfil() {
	$this->form_validation->set_error_delimiters('<span class="error_formulario_registro">','</span>');  
	$this->form_validation->set_rules('nombre', 'Nombre', 'trim|required|callback__alpha_dash_space|alpha');
	$this->form_validation->set_rules('apellidos', 'Apellidos', 'callback__alpha_dash_space|alpha');
	
	$this->form_validation->set_message('required', "Aquest camp es obligatori");
	$this->form_validation->set_message('alpha', "Nom&eacute;s s'accepten lletres");
	
	if ($this->form_validation->run() == FALSE)
	{
		$this->perfil();
	}
	else
	{
		$temp = $this->user->get_user_by_email($this->data['email']);
		$foto = $temp->foto;
		if ($_FILES['foto']['name'] != '') {
			$this->load->library('upload_img');
			$this->upload_img->upload_image($temp->codigo_registro, $this->input->post('nombre'));
			$img_type = substr($_FILES['foto']['type'], strrpos($_FILES['foto']['type'], '/') + 1);
			$foto = $this->input->post('nombre')."_".$temp->codigo_registro.".".$img_type;
		}
		$temp = array();
		if ($this->user->update_perfil($this->data['email'], $this->input->post('nombre'), $this->input->post('apellidos'), $this->input->post('sexo'), $this->input->post('provincia'), $this->input->post('poblacio'), $this->input->post('cp'), $this->input->post('descrivete'), $foto))
			$mensaje = "Perfil actualitzat correctament";
		else
			$mensaje = "S'ha produit un error, torna a provar-ho més tard. Si segueix passant contacte amb l'administrador.";
			
		$this->mostrar_missatge($mensaje);
	}
  }
  function alpha_dash_space($str)
	{
		return ( ! preg_match("/^([-a-z_ ])+$/i", $str)) ? FALSE : TRUE;
	}
	
  /***************************************************PERFIL*************************************************************/
  /***************************************************SERVEIS*************************************************************/
  
  function serveis() {
	$data2 = array();
	$temp = $this->user->get_user_by_email($this->data['email']);
	$id = $temp->id;
	$temp = array();
	$serveis = $this->servei->get_serveis($id);
	
	if (count($serveis) > 0) {
		$html = "";
		foreach($serveis as $row) {
			$pueblo = $this->lugares->get_poblacion_by_cp($row->cp);
			$data2 = array(
			  'id' => $row->id,
			  'nom' => $row->nom,
			  'descripcio' => $row->descripcio,
			  'preu' => $row->preu,
			  'data_inici' => $row->data_inici,
			  'data_fi' => $row->data_fi,
			  'horas' => explode(";", $row->disp_horaria),
			  'days' => explode(";", $row->disp_dies),
			  'categoria' => $row->categoria,
			  'usuari' => $row->usuari,
			  'cp' => $row->cp,
			  'poblacion' => $pueblo->poblacion
			);
			$html = $html.$this->load->view('frontend/vista_servicio', $data2, true);
		}
	} else {
		$html = "No estas oferint cap servei actualment.";
	}
	
	
	$this->data['html'] = $html;
	
	$this->load->view('frontend/user_settings/serveis', $this->data);

  }
  
  //funcion que valida si una data es correcta (en el alta_servei), esta en el formato correcto (Y-m-d)
  function dataFi_check($date) {
	if (count(explode('-', $date)) == 3) {
		list($anyo, $mes, $dia) = explode('-', $date);
		$valida = checkdate($mes, $dia, $anyo);
		$data_fi = date_create($anyo."-".$mes."-".$dia);
		$data_inici = date_create(date('Y-m-d'));
		$diff = date_diff($data_fi,$data_inici)->format('%R%a');
		$dias = date_diff($data_fi,$data_inici)->format('%a');
		if ($valida) {
			if (strrpos($diff, "-") === false || $dias>="365") {
				$this->form_validation->set_message('dataFi_check', '%s tiene que ser posterior a hoy y como maximo 1 año mas');
				return false;
			} else {
				return true;
			}
		} else {
			$this->form_validation->set_message('dataFi_check', '%s es una fecha NO valida');
			return false;
		}
	} else {
		$this->form_validation->set_message('dataFi_check', '%s no es ni una fecha<br>[2015-06-25]');
		return false;
	}
	
  }
  
  function crear_servei() {
	$categorias = $this->categorias->get_categorias();
	foreach($categorias as $row) {
		$this->data['categorias'][$row['id']] = $row['nom'];
	}
	$this->load->view('frontend/user_settings/alta_servei', $this->data);
  }
  
  
  //function validar_editar_servei() {
	function validar_alta_servicio() {
		$this->form_validation->set_error_delimiters('<span class="error_formulario_registro">','</span>');  
		$this->form_validation->set_message('required', "%s es obligatori.");
		$this->form_validation->set_message('max_length', "%s no pot tenir més %s caracters.");
		$this->form_validation->set_message('min_length', "%s ha de tenir %s caracters.");
		$this->form_validation->set_message('integer', "%s només pot contenir números.");
		$this->form_validation->set_message('is_natural_no_zero', "%s que has seleccionat no es correcte.");
		$this->form_validation->set_message('exact_length', "%s ha de tenir exactament %s numeros.");
		$this->form_validation->set_message('numeric', "%s ha de ser númeric.");
		$this->form_validation->set_message('greater_than', "%s ha de ser major que %s.");
	
		$this->form_validation->set_rules('nom', 'El nom del servei', 'required|max_length[25]');
		$this->form_validation->set_rules('descripcio', 'La descripció', 'required|min_length[50]|max_length[500]');
		$this->form_validation->set_rules('preu', 'El preu', 'required|integer|greater_than[0]');
		//Valida que la data_fi sea Y-m-d (xxxx-xx-xx)
		$this->form_validation->set_rules('data_fi', 'la data de fi', 'required|callback_dataFi_check');
		$this->form_validation->set_rules('disp_horaria', 'L\'horari', 'required');
		$this->form_validation->set_rules('days', 'Els dies', 'required');
		//La categoria es un natural != 0
		$this->form_validation->set_rules('categoria', 'La categoria', 'required|is_natural_no_zero');
		$this->form_validation->set_rules('cp', 'El codi postal', 'required|exact_length[5]|numeric');
		if ($this->form_validation->run() == FALSE)	{
			$categorias = $this->categorias->get_categorias();
			foreach($categorias as $row) {
				$this->data['categorias'][$row['id']] = $row['nom'];
			}
			$this->load->view('frontend/user_settings/alta_servei', $this->data);
			
		} else {
			$disponibilitat_horaria = $this->input->post("disp_horaria");
			$disponibilitat_dies = "";
			$dies = $this->input->post("days");
			foreach ($dies as $key => $value) {
				$disponibilitat_dies .= $dies[$key].";";
			}
			$data_inici = date('Y-m-d');
			$usuari = $this->session->userdata('logged_in');
			$this->servei->add_servei($data_inici, $disponibilitat_horaria, $disponibilitat_dies, $usuari['id']);
			redirect('user_settings/serveis','refresh');
		}
  }
  
  function validar_editar_servicio($id = null) {
		$this->form_validation->set_rules('nom', 'Nom del servei', 'required|max_length[25]');
		$this->form_validation->set_rules('descripcio', 'descripcionServicio', 'required|min_length[50]|max_length[500]');
		$this->form_validation->set_rules('preu', 'Nom del servei', 'required|integer');
		//Valida que la data_fi sea Y-m-d (xxxx-xx-xx)
		$this->form_validation->set_rules('data_fi', 'Nom del servei', 'required|callback_dataFi_check');
		$this->form_validation->set_rules('disp_horaria', 'Nom del servei', 'required');
		$this->form_validation->set_rules('days', 'Nom del servei', 'required');
		//La categoria es un natural != 0
		$this->form_validation->set_rules('categoria', 'Nom del servei', 'required|is_natural_no_zero');
		$this->form_validation->set_rules('cp', 'Nom del servei', 'required|exact_length[5]|numeric');
		
		if ($this->form_validation->run() == FALSE)	{
			$categorias = $this->categorias->get_categorias();
			foreach($categorias as $row) {
				$this->data['categorias'][$row['id']] = $row['nom'];
			}
			$this->data['id'] = $id;
			$this->load->view('frontend/user_settings/editar_servei', $this->data);
			
		} else {
			$disponibilitat_horaria = $this->input->post("disp_horaria");
			$disponibilitat_dies = "";
			$dies = $this->input->post("days");
			foreach ($dies as $key => $value) {
				$disponibilitat_dies .= $dies[$key].";";
			}
			$this->servei->actualitzar_servei($id, $disponibilitat_horaria, $disponibilitat_dies);
			redirect('user_settings/serveis','refresh');
		}
  }
  
  function editar_servei($id, $missatge = null) {
		$session_data = $this->session->userdata('logged_in');
		$servicio = $this->servei->get_servei($id);
		
		//Esta condicion evita que cualquier otro que no sea el dueño del servicio pueda editarlo.
		if ($servicio->usuari == $session_data['id']) {
			
			
			$data = array();
			$this->data['disponibilitat_dies'] = explode(';', $servicio->disp_dies);
			$this->data['horas'] = explode(';', $servicio->disp_horaria);
			$this->data['nom'] = $servicio->nom;
			$this->data['descripcio'] = $servicio->descripcio;
			$this->data['preu'] = $servicio->preu;
			$this->data['categoria'] = $servicio->categoria;
			$this->data['data_inici'] = $servicio->data_inici;
			$this->data['data_fi'] = $servicio->data_fi;
			$this->data['usuari'] = $servicio->usuari;
			$this->data['cp'] = $servicio->cp;
			$this->data['id'] = $servicio->id;
			
			$categories = $this->categorias->get_categorias();
			foreach ($categories as $valor) {
				$this->data['categorias'][$valor['id']] = $valor['nom'];
			}
			
			$this->load->view("frontend/user_settings/editar_servei", $this->data);
			
			

		} else {
			redirect('user_settings/serveis','refresh');
		}		
	}
  
  /***************************************************SERVEIS*************************************************************/
  /***************************************************OPCIONS*************************************************************/
  function opcions() {
  	$data=$this->data;
	$data['panel_user']=$this->load->view('frontend/user_settings/opcions',$data,TRUE);
	$this->load->view('frontend/user_settings/inicio', $data);
  }

  function donarBaixaUser_control(){
  	if(isset($_POST['email'])){
  		$data=$this->data;
	  	$email=$_POST['email'];
	  	if($this->user->donarBaixaUsuari($email)){//quan es borra usuari, hay que borrar login
			redirect('logout','refresh');
		}else{
			redirect('user_settings','refresh');	
		}
	}else{
		redirect('user_settings','refresh');
	}
  }
<<<<<<< HEAD
=======
  function canviaContrasenya_control(){
  		$this->form_validation->set_rules('passOriginal', 'Password original', 'required|trim|callback_comprovaPassword[passOriginal]');
		$this->form_validation->set_rules('passNou', 'Password nou', 'required|min_length[6]|trim');

		$this->form_validation->set_message('required', "%s es obligatori");
		$this->form_validation->set_message('min_length', "%s ha de tenir %s caracters");
		$this->form_validation->set_message('comprovaPassword', "%s no es el teu password");
		
		$data=$this->data;
		if ($this->form_validation->run()==TRUE){
			$data['mensaje'][0]="Contrasenya canviada correctament";
			$this->user->canviarPassword($data['email'],md5($this->input->post('passNou')));
	  	}else{
	  		$data['mensaje'][0]=form_error('passOriginal');
	  		$data['mensaje'][1]=form_error('passNou');
	  	}

		$data['panel_user']=$this->load->view('frontend/user_settings/opcions',$data,TRUE);
		$this->load->view('frontend/user_settings/inicio', $data);
  }
  function comprovaPassword($pass){
  	$pass = MD5($pass);
  	$email=$_POST['email'];
  	$consulta = $this->db->get_where("login", array('email'=>$email, 'password'=>$pass));
	if ($consulta->num_rows() == 1) {
		return true;
	} else {
		return false;
	}
  }
>>>>>>> ee3b3bffc5dcb0e6ffe3721d2db1e2a4758610ef
  /***************************************************SOLICITUD*************************************************************/

  function estatSolicitut(){
  	$estatSolicitut=false;
  	if(isset($_POST['id_solicitut'])){
  		$id_solicitut=$_POST['id_solicitut'];
  	}
  	if(isset($_POST['accepta'])){
  		$accepta=$_POST['accepta'];
  		$estatSolicitut=TRUE;
  	}
  	if(isset($_POST['rebuja'])){
  		$rebuja=$_POST['rebuja'];
  		$estatSolicitut=FALSE;
  	}
  	$data=$this->data;
  	$data2['estatSolicitut']=$estatSolicitut;
  	if($estatSolicitut){
  		$this->user->aceptaSolicitut($id_solicitut);
  	}
	$data['panel_user']=$this->load->view('frontend/user_settings/actualitzaSolicitut',$data2,TRUE);
	$this->load->view('frontend/user_settings/inicio', $data);

  }
  function solicitud(){
  	$data=$this->data;
  	$email=$data['email'];
   	$html="";
   	
   	$total_solicitut=$this->user->comprovaSolicitut($email)->total_solicitut;
   	if($total_solicitut>0){
   			$infoSolicitut=$this->user->getIdSolicitant($email);
   			foreach ($infoSolicitut as $key){ 
   				 $data2 = array(
                'nom_solicitant' => $this->user->get_user_by_Id($key->id_solicitant)->nom,
                'email_solicitant' => $this->user->get_user_by_Id($key->id_solicitant)->email,
                'nom_servei' => $this->servei->get_servei($key->servei_id)->nom,
                'id_solicitut' => $key->id,
            	);
            	$html = $html.$this->load->view('frontend/user_settings/solicitud',$data2,TRUE);
            }	
	        $data['panel_user']=$html;
   	}else{
		$data['panel_user']=$this->load->view('frontend/user_settings/error_cap_solicitut',NULL,TRUE);
   	}
	$this->load->view('frontend/user_settings/inicio', $data);
  }

}

?>