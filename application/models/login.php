<?php
Class User extends CI_Model
{
	function login($username, $password)
	{
		$this -> db -> select('id, username, password, es_admin');
		$this -> db -> from('login');
		$this -> db -> from('usuari');
		$this -> db -> where('username = ' . "'" . $username . "'"); 
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