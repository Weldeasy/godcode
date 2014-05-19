<?php
Class Categorias extends CI_Model
{
	function get_categorias() {
		$this->load->database();
		$this->db->select('id, nom')->from('categoria_servei');
		$query=$this->db->get();
		return $query->result();
	}
}
?>