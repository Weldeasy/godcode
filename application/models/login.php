<?php
Class Login extends CI_Model
{
	function index($email, $password)
	{
		$this -> db -> select('id, email, password');
		$this -> db -> from('login');
		$this -> db -> where('email', $email); 
		$this -> db -> where('password', MD5($password)); 
		/* a*/
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