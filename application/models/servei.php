<?php
Class Servei extends CI_Model {

	public function __construct() {
        parent::__construct();
		$this->load->database();
    }
	 
	 public function get_serveis($id_user) {
		$this -> db -> select('*');
		$this -> db -> from('servei s');
		if ($id_user != null) {
			$this -> db -> where('s.usuari', $id_user); 
		}

		$query = $this -> db -> get();
		return $query->result();
	 }
	 
	 /* Funcion que devuelve el servicio por el id */
	 public function get_servei($id) {
		$query = $this->db->query('SELECT * FROM servei WHERE id = "'.$id.'"');
		return $query->row();
	 }
	 
	 public function comprovaServeiOferts($email){
		if($email!=null){
	 		$query = $this->db->query('SELECT COUNT(*) as servei_minim_oferit from servei,usuari where usuari.id=servei.usuari and usuari.email="'.$email.'"');
			return $query->result();
	 	}
	 }

	public function getPreuServei($id){
	 	if($id!=null){
	 		$this->db->select('preu');
			$this->db->from('servei');
			$this->db->where('id', $id); 	
			$query = $this->db->get();
			return $query->result();
	 	}
	}
	public function llistarServeis(){
		$query = $this->db->query('SELECT * FROM servei');
		return $query->result();
	}
	

	 
	 
	 public function add_servei($data_inici, $disponibilitat_horaria, $disponibilitat_dies, $usuari) {
		$this->db->insert("servei", array(
			"nom"=>$this->input->post("nom", TRUE),
			"descripcio"=>$this->input->post("descripcio", TRUE),
			"preu"=>$this->input->post("preu", TRUE),
			"data_inici"=>$data_inici,
			"data_fi" =>$this->input->post("data_fi", TRUE),
			"disp_horaria"=>$disponibilitat_horaria,
			"disp_dies"=>$disponibilitat_dies,
			"categoria"=>$this->input->post("categoria", TRUE),
			"usuari"=>$usuari,
			"cp"=>$this->input->post("cp", TRUE)
		));
		return true;
	}
	
	public function actualitzar_servei($id, $disponibilitat_horaria, $disponibilitat_dies) {
	
		$this->db->where('id', $id);
		$this->db->update('servei' ,array(
			"nom"=>$this->input->post("nom", TRUE),
			"descripcio"=>$this->input->post("descripcio", TRUE),
			"preu"=>$this->input->post("preu", TRUE),
			"data_fi" =>$this->input->post("data_fi", TRUE),
			"disp_horaria"=>$disponibilitat_horaria,
			"disp_dies"=>$disponibilitat_dies,
			"categoria"=>$this->input->post("categoria", TRUE),
			"cp"=>$this->input->post("cp", TRUE)
		));
		return true;
	}

	public function busca_serveis($ciutat, $dataInici, $dataFi, $categoria) {
		$this -> db -> select('*');
		$this -> db -> from('servei s');
		$this -> db -> from('poblacion p');
		$this -> db -> where('s.cp = p.postal');

		//$sql = "SELECT * FROM servei s, poblacion p WHERE s.cp = p.postal ";
		
		if($categoria != 0){
			$this -> db -> where('s.categoria = '.$categoria);
			//$sql .= 'AND s.categoria = '.$categoria.' ';
		}
		if ($ciutat != "") {
			if (is_numeric($ciutat)) {
				$this->db->where('s.cp', $ciutat); 
				//$sql .= 'AND s.cp = "'.$ciutat.'" ';
			}
			else {
				$this->db->where('p.poblacion', $ciutat);
				//$sql .= 'AND p.poblacion = "'.$ciutat.'" ';
			}
		}
		if($dataInici != '1970-01-01'){
			$this->db->where('DATEDIFF( s.data_inici, '.$dataInici.') <=0');
			//$sql .= 'AND DATEDIFF( s.data_inici, "'.$dataInici.'") <=0 ';
		}
		if($dataFi != '1970-01-01'){
			$this->db->where('s.data_fi >= '.$dataFi);
			//$sql .= 'AND DATEDIFF( s.data_fi, "'.$dataFi.'") >=0';
		}
		//$query = $this->db->query($sql);

		$query = $this->db->get();
		return $query->result();
		
	 }
}
?>