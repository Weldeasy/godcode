<?php
Class Lugares extends CI_Model
{
	function get_poblacion_by_cp($cp) {
		$this->load->database();
		$this->db->select('*');
		$this->db->from('poblacion');
		$this->db->where('postal', $cp);
		$query=$this->db->get();
		return $query->result_array();
	}
}
?>