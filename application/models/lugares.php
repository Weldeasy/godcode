<?php
Class Lugares extends CI_Model
{
	function get_poblacion_by_cp($cp) {
		$query = $this->db->query('SELECT * FROM poblacion WHERE postal = '.$cp.' LIMIT 1');
		return $query->row();
	}
}
?>