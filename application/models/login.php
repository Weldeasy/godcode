<?php
Class Login extends CI_Model
{
	function login($email, $password)
	{
		$this -> db -> select('usuari.id, login.email, login.password, es_admin');
		$this -> db -> from('login');
		$this -> db -> from('usuari');
		$this -> db -> where('login.email =', $email); 
		$this -> db -> where('login.password = ', MD5($password)); 
		$this -> db -> where('login.id = usuari.id'); 
		
		$this -> db -> limit(1);

		$query = $this -> db -> get();
		//$query = $this->db->query('SELECT u.id, l.email, l.password, u.es_admin FROM login l, usuari u WHERE l.email = "'.$email.'" AND l.password = "'.$password.'" AND l.id = u.id');
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