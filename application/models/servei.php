<?php
Class Servei extends CI_Model {

	public function __construct() {
        parent::__construct();
		$this->load->database();
    }
	 
	 public function get_serveis($id_user) {
		$this -> db -> select('*');
		$this -> db -> from('servei s');
		if ($id_user == null) {
			$this -> db -> where('s.usuari', $id_user); 
		}

		$query = $this -> db -> get();
		return $query->result();
	 }
	 
	 
	 public function add_servei() {
		$this->db->insert("servei", array(
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
}
?>