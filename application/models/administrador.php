<?php
Class Administrador extends CI_Model
{
	
	/**
	 * [llistarDenuncies description]
	 * @return [objecte] [description]
	 */
	function llistarDenuncies(){      
		$query = $this->db->get_where('usuari', array('es_admin' => 0));
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
		$this->db->from('categoria');
		$query=$this->db->get();
		return $query->result();
	}
	function eliminarCategoria($id){
		$query = $this->db->query('DELETE FROM categoria WHERE id='.$id);
		if($query){
			$resultat=true;
		}else{
			$resultat=false;
		}
		return $resultat;
	}

	function afegirCategoria($nom,$descripcio){
		//antes de insertar comprova si existe
		$query = $this->db->query('INSERT INTO categoria (nom,descripcio) VALUES("'.$nom.'","'.$descripcio.'")');
		if($query){
			$resultat=true;
		}else{
			$resultat=false;
		}
		return $resultat;
	}
	function actualitzarCategoria($nom,$descripcio,$id){
		$query = $this->db->query('UPDATE categoria SET nom="'.$nom.'",descripcio="'.$descripcio.'" WHERE id="'.$id.'"');
		if($query){
			$resultat=true;
		}else{
			$resultat=false;
		}
		return $resultat;
	}

}
?>