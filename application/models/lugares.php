<?php
Class Lugares extends CI_Model
{
	function get_poblacion_by_cp($cp) {
		$query = $this->db->query('SELECT * FROM poblacion WHERE postal = '.$cp.' LIMIT 1');
		return $query->row();
	}
	
	function get_provincia_by_cp($cp) {
		$query = $this->db->query('SELECT  provincia.* FROM provincia, poblacion WHERE poblacion.idprovincia = provincia.idprovincia 
															AND poblacion.postal = '.$cp);
		return $query->row();
	}
	
	function get_pueblos_by_idProvincia($id) {
		$query = $this->db->query('SELECT  poblacion.* FROM provincia, poblacion WHERE poblacion.idprovincia = provincia.idprovincia 
															AND provincia.idprovincia = '.$id);
		return $query->result();
	}
}
?>