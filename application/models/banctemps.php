<?php
Class BancTemps extends CI_Model {

	public function __construct() {
        parent::__construct();
		$this->load->database();
    }
	 
	 public function get_saldo() {
		return $this->db->query("SELECT * FROM banc_del_temps")->row()->saldo_minim;
	 }
}
?>