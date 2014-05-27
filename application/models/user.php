<?php
Class User extends CI_Model
	{
	public function __construct()
    {
        parent::__construct();
		
		$this->load->database();
		$this->load->model(array('banctemps'));
    }
	
	public function get_user_by_email($email) {
		try {
			$data = $this->db->query("SELECT * FROM usuari WHERE email='".$email."' LIMIT 1");
			return $data->row();
		} catch (Exception $e) {
			return;
		}
	}
	public function get_user_by_Id($id) {
		try {
			$data = $this->db->query("SELECT * FROM usuari WHERE id='".$id."' LIMIT 1");
			return $data->row();
		} catch (Exception $e) {
			return;
		}
	}
	public function comprovaSolicitut($email){
		if($email!=null){
	 		$query = $this->db->query('SELECT COUNT(*) as total_solicitut FROM usuari,servei,solicitut_servei
	 		 where servei.usuari=usuari.id and solicitut_servei.servei_id=servei.id and  usuari.email="'.$email.'"');
			return $query->row();
	 	}
	}
	public function getIdSolicitant($email){
		if($email!=null){
	 		$query = $this->db->query('SELECT solicitut_servei.id,id_solicitant,servei_id FROM usuari,servei,solicitut_servei where servei.usuari=usuari.id and solicitut_servei.servei_id=servei.id and usuari.email="'.$email.'"');
			return $query->result();
	 	}
	}
	public function aceptaSolicitut($id){
		$query = $this->db->query('UPDATE solicitut_servei SET estat=1 WHERE id="'.$id.'"');
		if($query){
			$resultat=true;
		}else{
			$resultat=false;
		}
		return $resultat;
	}

	public function cercar_user_servei($cercar_user){
		try {
			$data = $this->db->query(
				'SELECT  distinct foto,cognom,poblacion,email,usuari.nom as nom_usuari
				 FROM usuari,poblacion
				 where usuari.poblacio=poblacion.idpoblacion and 
				 (usuari.email LIKE "'.$cercar_user.'%" OR usuari.nom LIKE "'.$cercar_user.'%") and usuari.es_admin=0
				');
			return $data->result();
		} catch (Exception $e) {
			return;
		}
	}
	public function get_user_consumits($idu){
		try {
			$data = $this->db->query(
				'SELECT  distinct id_consumidor, data_consumit
				 FROM servei_consumit, servei
				 WHERE servei_consumit.id_servei=servei.id AND servei.usuari = '.$idu.'
				 ORDER BY data_consumit DESC
				');
			return $data->result();
		} catch (Exception $e) {
			return;
		}
	}
	public function provincia_user_by_id($provincia){
		try {
			return $this->db->query("SELECT provincia FROM provincia WHERE idprovincia = ".$provincia)->row()->provincia;
		} catch (Exception $e) {
			return;
		}
	}
	function servei_user($email){
		$data = $this->db->query(
			'SELECT  distinct categoria,data_inici,data_fi,disp_horaria,preu,usuari.id as id_user,usuari.email,servei.id as id_servei,categoria_servei.id as id_categoria,servei.nom as nom_servei,servei.descripcio as descripcio_servei,categoria_servei.nom as nom_categoria 
			 FROM usuari,servei,categoria_servei where usuari.id=servei.usuari and categoria_servei.id=servei.categoria 
			 and usuari.email="'.$email.'"');

		return $data->result();
	}
	public function enviarSolicitut($id_usuari,$id_servei){
		$this->db->insert("solicitut_servei", array(
			"id_solicitant"=>$id_usuari,
			"servei_id"=>$id_servei,
			"estat" => 0
		));
	}

	public function getSaldoUser($email){
	 	if($email!=null){
	 		$this->db->select('saldo');
			$this->db->from('usuari');
			$this->db->where('email', $email); 	
			$query = $this->db->get();
			return $query->result();
	 	}
	 }
	
	public function update_perfil($email, $nom, $cognom, $sexe, $pr, $po, $cp, $desc, $foto) {
		$actualitzar = array(
		   'nom' => $nom,
		   'cognom' => $cognom,
		   'sexe' => $sexe,
		   'provincia' => $pr,
		   'poblacio' => $po,
		   'cp' => $cp,
		   'presentacio' => $desc,
		   'foto' => $foto
		);
		try {
			$this->db->where('email', $email);
			$this->db->update('usuari', $actualitzar);
			return true;
		} catch (Exception $e) {
			return false;
		}
	}
	 
	 public function add_user($imagen, $code) {
		//FER TRANSACTION
		$email_user = $this->input->post("email", TRUE);
		$this->db->insert("usuari", array(
			"email"=>$email_user,
			"nom"=>$this->input->post("nombre", TRUE),
			"cognom"=>$this->input->post("apellidos", TRUE),
			"data_inscripcio" => date('Y-m-d', time()),
			"saldo" => $this->banctemps->get_saldo(),
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

<<<<<<< HEAD
=======
  	function canviarPassword($email,$pass){
  		$query = $this->db->query('UPDATE login SET password="'.$pass.'" WHERE email="'.$email.'"');
		if($query){
			$resultat=true;
		}else{
			$resultat=false;
		}
		return $resultat;
	  	
  	}

>>>>>>> ee3b3bffc5dcb0e6ffe3721d2db1e2a4758610ef
	function donarBaixaUsuari($email){
		$query = $this->db->query('DELETE FROM usuari WHERE email="'.$email.'"');
		if($query){
			$resultat=true;
		}else{
			$resultat=false;
		}
		return $resultat;
	}
	
	function login($email, $password)
	{
		$this -> db -> select('u.id, l.email, l.password, u.es_admin, u.esta_congelat, u.foto');
		$this -> db -> from('login l');
		$this -> db -> from('usuari u');
		$this -> db -> where('l.email', $email); 
		$this -> db -> where('l.password', MD5($password)); 
		$this -> db -> where('l.email = u.email'); 
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