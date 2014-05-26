<?php
Class Administrador extends CI_Model{
	
	/**
	 * [llistarDenuncies description]
	 * @return [objecte] [description]
	 */
	function llistarDenuncies(){      
		$query = $this->db->query('SELECT *,reclamacio.id as id_rec FROM `reclamacio`, usuari where reclamacio.usuari_denunciant=usuari.id');
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
	
	/**
	 * [llistarCategoria description]
	 * @return [objecte] [retorna les dades del categoria del servei]
	 */
	function llistarCategoria(){
		$this->db->select('*');
		$this->db->from('categoria_servei');
		$query=$this->db->get();
		return $query->result();
	}
	/**
	 * [eliminarCategoria elimina la categoria]
	 * @param  [int] $id [id del categoria]
	 * @return [boolean]     [si ha eliminat correctament o no]
	 */
	function eliminarCategoria($id){
		$query = $this->db->query('DELETE FROM categoria_servei WHERE id='.$id);
		if($query){
			$resultat=true;
		}else{
			$resultat=false;
		}
		return $resultat;
	}
	/**
	 * [afegirCategoria inserta categoria]
	 * @param  [String] $nom        [nom del categoria]
	 * @param  [String] $descripcio [descripcio del categoria]
	 * @return [boolean]             [description]
	 */
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
	/**
	 * [actualitzarCategoria update categoria ]
	 * @param  [String] $nom        [nom de la categoria]
	 * @param  [String] $descripcio [descripcio del categoria]
	 * @param  [int] $id         [id del categoria]
	 * @return [boolean]             [si ha actualitzat correctament o no]
	 */
	function actualitzarCategoria($nom,$descripcio,$id){
		$query = $this->db->query('UPDATE categoria_servei SET nom="'.$nom.'",descripcio="'.$descripcio.'" WHERE id="'.$id.'"');
		if($query){
			$resultat=true;
		}else{
			$resultat=false;
		}
		return $resultat;
	}
	//DENUNCIA
	/**
	 * [actualitzarDenuncia update la taula denuncia]
	 * @param  [int] $id    [id del taula reclamacio]
	 * @param  [int] $estat [ id_estat del taula reclamacio ]
	 * @return [boolean]        [si s'ha actualitzat correctament o no]
	 */
	function actualitzarDenuncia($id,$estat){
		$query = $this->db->query('UPDATE reclamacio SET estat_reclamacio="'.$estat.'" WHERE id="'.$id.'"');
		if($query){
			$resultat=true;
		}else{
			$resultat=false;
		}
		return $resultat;
	}

	/**
	 * [actualitzarUsuari congelar usuari ]
	 * @param  [String] $esta_congelat [estat_user]
	 * @param  [int] $id            [id_user]
	 * @return [boolean]                [si ha actualitzat el estat del usuari o no]
	 */
	function actualitzarUsuari($esta_congelat,$id){
		$query = $this->db->query('UPDATE usuari SET esta_congelat="'.$esta_congelat.'" WHERE id="'.$id.'"');
		if($query){
			$resultat=true;
		}else{
			$resultat=false;
		}
		return $resultat;
	}
	/**
	 * [getSaldoMinim obtenim saldo minim del banc del temps ]
	 * @return [objecte] [saldo minim]
	 */
	function getSaldoMinim(){
		$query=$this->db->query('SELECT saldo_minim FROM banc_del_temps');
		return $query->row();	
	}

	/**
	 * [getLlistarDenuncies total denuncia]
	 * @return [objecte] [total denuncia]
	 */
	function getLlistarDenuncies(){
		$query=$this->db->query('SELECT COUNT(*) AS total_denuncia FROM reclamacio');
		return $query->result();	
	}
	/**
	 * [setsaldominim actualitzar saldo minim]
	 * @param  [int] $saldo_minim [saldo minim del banc del temps]
	 * @return [boolean]              [Si s'ha actualitzat o no]
	 */
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