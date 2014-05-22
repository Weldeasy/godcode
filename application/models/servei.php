<?php
Class Servei extends CI_Model {

	public function __construct() {
        parent::__construct();
		$this->load->database();
    }
	 
	 public function get_serveis($id_user) {
		$this -> db -> select('*');
		$this -> db -> from('servei');
		if ($id_user != null) {
			$this -> db -> where('s.usuari', $id_user); 
		}

		$query = $this -> db -> get();
		return $query->result();
	 }
	 
	 
	 
	 public function add_servei() {
		$this->db->insert("servei", array(
			"nom"=>$this->input->post("nom", TRUE),
			"descripcio"=>$this->input->post("descripcio", TRUE),
			"preu"=>$this->input->post("preu", TRUE),
			"data_inici"=>$this->input->post("data_inici", TRUE),
			"data_fi" =>$this->input->post("data_fi", TRUE),
			"disp_horaria"=>$this->input->post("disp_horaria"),
			"categoria"=>$this->input->post("categoria", TRUE),
			"usuari"=>$this->input->post("usuari", TRUE)
		));
		return true;
	}
	
	public function actualitzar_servei($dades_servei) {
		$this->db->where('id', $dades_servei['id']);
		$this->db->update('servei' ,$dades_servei);
		return true;
	}

	public function busca_serveis($ciutat, $dataInici, $dataFi, $categoria) {
		/*$this -> db -> select(';');
		$this -> db -> from('servei s');
		$this -> db -> from('poblacion p');
		$this -> db -> where('s.cp = p.postal');*/

		$sql = "SELECT * FROM servei s, poblacion p WHERE s.cp = p.postal ";
		
		if($categoria != ""){
			//$this -> db -> where('s.categoria = '.$categoria);
			$sql .= 'AND s.categoria = '.$categoria.' ';
		}
		if ($ciutat != "") {
			if (is_numeric($ciutat)) {
				//$this -> db -> where('s.cp', $ciutat); 
				$sql .= 'AND s.cp = '.$ciutat.' ';
			}
			else {
				//$this -> db -> where('p.poblacion', $ciutat);
				$sql .= 'AND p.poblacion = "'.$ciutat.'" ';
			}
		}
		if($dataInici != '1970-01-01'){
			//$this -> db -> where('DATEDIFF( s.data_inici, '.$dataInici.') >=0');
			$sql .= 'AND DATEDIFF( s.data_inici, '.$dataInici.') >=0 ';
		}
		if($dataFi != '1970-01-01'){
			//$this -> db -> where('s.data_fi >= '.$dataFi);
			$sql .= 'AND DATEDIFF( s.data_fi, '.$dataFi.') <= 0';
		}
		$query = $this->db->query($sql);

		//$query = $this -> db -> get();
		return $query->result();
	 }
}
?>