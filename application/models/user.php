<?php
Class User extends CI_Model
	{
	public function __construct()
    {
        parent::__construct();
		
		$this->load->database();
    }
	 
	 public function add_user($imagen, $code) {
		$email_user = $this->input->post("email", TRUE);
		$this->db->insert("usuari", array(
			"email"=>$email_user,
			"nom"=>$this->input->post("nombre", TRUE),
			"cognom"=>$this->input->post("apellidos", TRUE),
			"data_inscripcio" => date('Y-m-d', time()),
			"saldo" => 0,
			"sexe"=>$this->input->post("sexo"),
			"presentacio"=>$this->input->post("descrivete", TRUE),
			"poblacio"=>$this->input->post("poblacio", TRUE),
			"cp"=>$this->input->post("cp", TRUE),
			"provincia"=>$this->input->post("provincia", TRUE),
			"pais"=>"España",
			"foto" => $imagen,
			"esta_congelat" => 2,
			"es_admin" => 0,
			'codigo_registro' => $code
		));
		$passwd = MD5($this->input->post("pass", TRUE));
		$this->db->insert("login", array(
			'email' => $email_user,
			'password' => $passwd
		));
		
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
		
		//$this->email->initialize($config);
		//$this->email->clear();
		$this->email->set_newline("\r\n");
		$this->email->from('gcbtv0@gmail.com', 'Registre banc del temps');
		$this->email->to($email_user);
		//$this->email->cc($);
		//$this->email->bcc($);
		$this->email->subject('Confirma la teva identitat | Banc del temps');
		$this->email->message(
			"<h1>Confirmaci&oacute; registre banc del temps</h1><p>Hola ".$this->input->post("nombre", TRUE).",</p><p>Et donem la benvinguda al banc del temps, aquests s&oacute;n els teus identificadors d'acces:</p><p><ul><li><b>Usuari:</b>&nbsp;".$this->input->post("email", TRUE)."</li><li><b>Password:</b>&nbsp;".$this->input->post("pass", TRUE)."</li></ul></p><p>Per confirmar el registre accedeix al seguent link:<br/><a href='".base_url()."index.php/formularioregistro/confirmar/".$code."/".$this->input->post("email", TRUE)."'>CONFIRMAR REGISTRE</a></p><p>Si tens algun problema o dubte pots contactar amb el nostre suport tecnic: <a href='mailto:gcbtv0@gmail.com'><b>gcbtv0@gmail.com</b></a></p>"
		);
		if ($this->email->send())
			return true;
		else
			show_error($this->email->print_debugger());
	}
	
	public function verificar_registre($email, $code, $campo) {
		$consulta = $this->db->get_where("usuari", array('email'=>$email, $campo=>$code));
		if ($consulta->num_rows() == 1) {
			$data = array('esta_congelat'=>'0');
			$this->db->where("email", $email);
			$this->db->update('usuari', $data);
			return true;
		} else {
			return false;
		}
	}
	
	function login($email, $password)
	{
		$this -> db -> select('l.id, l.email, l.password, u.es_admin, u.esta_congelat');
		$this -> db -> from('login l');
		$this -> db -> from('usuari u');
		$this -> db -> where('l.email', $email); 
		$this -> db -> where('l.password', MD5($password)); 
		$this -> db -> where('l.id = u.id'); 
		/* a*/
		$this -> db -> limit(1);

		$query = $this -> db -> get();
		if($query -> num_rows() == 1)
		{
			return $query->result();
		}
		else
		{
			return false;
		}

	}
}
?>