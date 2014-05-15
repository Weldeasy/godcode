<?php
Class Adm extends CI_Model
{
	/**
	 * [llistarDenuncies description]
	 * @return [objecte] [json]
	 */
	function llistarDenuncies(){      
		$this->db->select('*');
		$this->db->from('usuari');
		$query=$this->db->get();
		return json_encode($query->result());
	}
	/**
	 * [coneglarUsuaris description]
	 * @return [json] [description]
	 */
	function coneglarUsuaris(){
		//$query = $this->db->get_where('usuari', array('id' => $id));
		$query = $this->db->query('SELECT * FROM usuari WHERE es_admin=0');
		/*foreach ($query->result() as $row){
			echo $row->nom." ";
			echo $row->cognom."<br />";
		}*/
		//echo 'Resultados totales: ' . $query->num_fields();

		return json_encode($query->result());	
	}
	function llistarCategoria(){
		$this->db->select('*');
		$this->db->from('usuari');
		$query=$this->db->get();
		return json_encode($query->result());
	}
}
?>