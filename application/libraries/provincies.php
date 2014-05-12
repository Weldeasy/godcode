<?php
Class Provincies extends CI_Model
{
	function get_provincies() {
		$this->load->database();
		$this->db->select('idprovincia, provincia')->from('provincia');
		$query=$this->db->get();
		return $query->result_array();
	}
}
?>