<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Formularioregistro extends CI_Controller {
    
    public function __construct()
    {
        parent::__construct();
        
        $this->load->helper('form');
		$this->load->helper('url');
        $this->load->library('form_validation');
		$this->load->model('user');
        
    }

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$this->load->library(array('provincies', 'poblacions'));
		
		$provincies = $this->provincies->get_provincies();
		$prov = array();
		foreach ($provincies as $valor) {
			$prov[$valor['idprovincia']] = $valor['provincia'];
		}
		
		$data['provincies'] = $prov;
		$data['poblacions'] = $this->poblacions->get_poblacions();
		
		$this->load->view('frontend/registro_nuevo_usuario', $data);
	}
	
	
	function alpha_dash_space($str)
	{
		return ( ! preg_match("/^([-a-z_ ])+$/i", $str)) ? FALSE : TRUE;
	}
	public function validar()
	{
	   
        $this->form_validation->set_error_delimiters('<span class="error_formulario_registro">','</span>');  
	   
		$this->form_validation->set_rules('nombre', 'Nombre', 'trim|required|callback__alpha_dash_space');
        $this->form_validation->set_rules('apellidos', 'Apellidos', 'required|callback__alpha_dash_space');
		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|is_unique[usuari.email]');
		$this->form_validation->set_rules('pass', 'Contrasenya', 'trim|required|min_length[6]');
		$this->form_validation->set_rules('confirm_pass', 'Confimar contrasenya', 'trim|required|matches[pass]');
        $this->form_validation->set_rules('descrivete', 'Descrivete', 'trim|required');
        
        $this->form_validation->set_message('required', "Aquest camp es obligatori");
        $this->form_validation->set_message('alpha', "Només s'accepten lletres");
		$this->form_validation->set_message('valid_email', "Això no és una direcció de correu electronic.");
		$this->form_validation->set_message('very_correo', "Aquesta direcció de correu electronic no existeix.");
		$this->form_validation->set_message('min_length', "Contrasenya insegura, minim 6 caracters.");
		$this->form_validation->set_message('matches', "Les contrasenyes no coincideixen.");
		$this->form_validation->set_message('is_unique', "Aquest email ya esta registrat.");
        
        if ($this->form_validation->run() == FALSE)
        {
            $this->index();
        }
        else
        {
			$this->load->helper('load_controller');
			
			$code = rand(1000, 99999);//numero random de registro
			
			/*$name = $this->input->post('nombre');
			$surname = $this->input->post('apellidos');
			$email = $this->input->post('email');
			$sex = $this->input->post('sexo');
			$provincia = $this->input->post('provincia');
			$poblacion = $this->input->post('poblacio');
			$cp = $this->input->post('cp');
			$pais = "Espa&ntilde;a";
			$descrip = $this->input->post('descrivete');
			
			$datos = ['nom'=>$name, 'email'=>$email, 'cognom'=>$surname, 'sexe'=>$sex, 'presentacio'=>$descrip, 'provincia'=>$provincia, 'poblacio'=>$poblacion, 'cp'=>$cp, 'pais'=>$pais];
			print_r($datos);*/
			$mensaje = "Registre completat! Revisa el teu correu.";
			if ($_FILES['foto']['name'] != '') {
				$respuesta = $this->upload_image($code);
				if (!is_array($respuesta)) {
					$this->user->add_user($respuesta, $code);
				} else {
					$mensaje = $respuesta;
				}
			} else {
				$this->user->add_user("anonimo.jpg", $code);
			}
			
			$data['mensaje'] = $mensaje;
			$this->load->view('frontend/registro_completado', $data);
        }
        
	}
	
	function confirmar($code, $email) {
		$resultat = $this->user->verificar_registre($email, $code, 'codigo_registro');
		if ($resultat == false) {
			print "Hi ha hagut un error, torna a provar, si el problema continua ficat en contacte amb <a href='mailto:gcbtv0@gmail.com'><b>gcbtv0@gmail.com</b></a>.";
		} else {
			//crear sessio!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
			print "<p>Has finalitzat el registre correctament!</p><p><a href='".base_url()."'>Inici</a></p>";
		}
	}
	
	function upload_image($codigo) {
	
		$config['upload_path'] = "media/users_profile/";
		$config['allowed_types'] = "*";
		$config['max_size'] = 2*15000;
		$config['max_width'] = 1024;
		$config['max_height'] = 1024;
		$config['file_name'] = $this->input->post('nombre')."_".$codigo;
		$config['remove_spaces'] = TRUE;
		
		$this->load->library('upload', $config);
		
		if (!$this->upload->do_upload('foto')) {
			$error = array('error'=>$this->upload->display_errors());
			return $error;
		} else {
			$data = $this->upload->data();
			$this->create_thumb($data['file_name']);
			
			$img_type = substr($data['file_type'], strrpos($data['file_type'], '/') + 1);
			return $data['file_name'];
		}
		
	}
	function create_thumb($imagen) {
		$config['image_library'] = "gd2";
		$config['source_image'] = "media/users_profile/".$imagen;
		$config['new_image'] = "media/users_profile/thumbs/";
		$config['thumb_marker'] = "";
		$config['create_thumb'] = TRUE;
		$config['maintain_ratio'] = TRUE;
		$config['width'] = 150;
		$config['height'] = 150;
		
		$this->load->library("image_lib", $config);
		$this->image_lib->resize();
	}
	
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */