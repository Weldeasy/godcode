<?php
Class Administrador extends CI_Model
{
	
	/**
	 * [llistarDenuncies description]
	 * @return [objecte] [description]
	 */
	function llistarDenuncies(){      
		$query = $this->db->query('SELECT * FROM `reclamacio`, usuari where reclamacio.usuari_denunciant=usuari.id');
		return $query->result();
	}
	/**
	 * [coneglarUsuaris description]
	 * @return [objecte] [description]
	 */
	function coneglarUsuaris(){
		//$query = $this->db->get_where('usuari', array('id' => $id));
		$query = $this->db->query('SELECT * FROM usuari WHERE es_admin=0');
		/*foreach ($query->result() as $row){
			echo $row->nom." ";
			echo $row->cognom."<br />";
		}*/
		//echo 'Resultados totales: ' . $query->num_fields();

		return $query->result();	
	}
	//CATEGORIES
	
	function llistarCategoria(){
		$this->db->select('*');
		$this->db->from('categoria_servei');
		$query=$this->db->get();
		return $query->result();
	}
	function eliminarCategoria($id){
		$query = $this->db->query('DELETE FROM categoria_servei WHERE id='.$id);
		if($query){
			$resultat=true;
		}else{
			$resultat=false;
		}
		return $resultat;
	}

	function afegirCategoria($nom,$descripcio){
		//antes de insertar comprova si existe
		$query = $this->db->query('INSERT INTO categoria_servei (nom,descripcio) VALUES("'.$nom.'","'.$descripcio.'")');
		if($query){
			$resultat=true;
		}else{
			$resultat=false;
		}
		return $resultat;
	}
	function actualitzarCategoria($nom,$descripcio,$id){
		$query = $this->db->query('UPDATE categoria_servei SET nom="'.$nom.'",descripcio="'.$descripcio.'" WHERE id="'.$id.'"');
		if($query){
			$resultat=true;
		}else{
			$resultat=false;
		}
		return $resultat;
	}
	function actualitzarUsuari($esta_congelat,$id){
		$query = $this->db->query('UPDATE usuari SET esta_congelat="'.$esta_congelat.'" WHERE id="'.$id.'"');
		if($query){
			$resultat=true;
		}else{
			$resultat=false;
		}
		return $resultat;
	}
	function getSaldoMinim(){
		$query=$this->db->query('SELECT saldo_minim FROM banc_del_temps');
		return $query->result();	
	}
	function getLlistarDenuncies(){
		$query=$this->db->query('SELECT COUNT(*) AS total_denuncia FROM reclamacio');
		return $query->result();	
	}
	function setsaldominim($saldo_minim){
		$query = $this->db->query('UPDATE banc_del_temps SET saldo_minim="'.$saldo_minim.'"');
		if($query){
			$resultat=true;
		}else{
			$resultat=false;
		}
		return $resultat;	
	}
}
?>