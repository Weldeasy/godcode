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
	


	//ESTADISTICAS
	function serveisPerProvincia(){      
		$query = $this->db->query('SELECT provincia, COUNT(*) as numero FROM servei s, poblacion p, provincia pr WHERE p.postal=s.cp AND pr.idprovincia=p.idprovincia GROUP BY pr.provincia');
		return $query->result();
	}
	
	function mitjaServeisPerUsuari(){  	     
		$query1 = $this->db->query('SELECT COUNT(*) as users FROM  usuari ');
		$query1 = $query1->row();
		$query2= $this->db->query('SELECT COUNT(*)  as serveis FROM servei');
		$query2 = $query2->row();
		$queryFinal=$query2->serveis/$query1->users;
		return $queryFinal;

	}
	function numeroServeisConsumits(){      
		$query = $this->db->query('SELECT COUNT(*) as numero_consumit FROM servei_consumit');
		$query = $query->row();
		$queryFinal = $query->numero_consumit;
		return $queryFinal;

	}
	/**
	 * [llistarCategoria description]
	 * @return [objecte] [retorna les dades del categoria del servei]
	 */
	function llistarCategoria(){

		$query = $this->db->query('SELECT * FROM categoria_servei WHERE NOT id=0');
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
	
	function getMax_dies_congelat(){
		$query=$this->db->query('SELECT max_dias_congelado  FROM banc_del_temps');
		return $query->row();	
	}
	function getMax_dies_noConsumit(){
		$query=$this->db->query('SELECT max_dies_noConsumit  FROM banc_del_temps');
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
	
	function setMax_dies_congelat($max_dies_congelat){
		$query = $this->db->query('UPDATE banc_del_temps SET max_dias_congelado ="'.$max_dies_congelat.'"');
		if($query){
			$resultat=true;
		}else{
			$resultat=false;
		}
		return $resultat;	
	}
	
	function setMax_dies_noConsumit($max_dies_noConsumit){
		$query = $this->db->query('UPDATE banc_del_temps SET max_dies_noConsumit ="'.$max_dies_noConsumit.'"');
		if($query){
			$resultat=true;
		}else{
			$resultat=false;
		}
		return $resultat;	
	}
	
}
?>