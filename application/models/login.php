<?php
Class User extends CI_Model
{
	function login($email, $password)
	{
		$this -> db -> select('id, email, password, es_admin');
		$this -> db -> from('login');
		$this -> db -> from('usuari');
		$this -> db -> where('email = ' . "'" . $email . "'"); 
		$this -> db -> where('password = ' . "'" . MD5($password) . "'"); 
		$this -> db -> where('login.id = usuari.id'); 
		
		$this -> db -> limit(1);

		$query = $this -> db -> get();

		if($query -> num_rows() == 1)
		{
			return $query->result();
		}
		else
		{
			return false;
		}

	}
}
?>