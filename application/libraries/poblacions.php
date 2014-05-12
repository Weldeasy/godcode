<?php
Class Poblacions extends CI_Model
{
	function get_poblacions() {
		$this->load->database();
		$this->db->select('idpoblacion, idprovincia, poblacion, postal')->from('poblacion');
		$query=$this->db->get();
		return $query->result_array();
	}
}
?>