<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Cercar_usuari extends CI_Controller {

	function __construct() {
	   	parent::__construct();
		  $this->load->model('user');
	}
	
  function index() {
    	if(isset($_POST['cercar_user'])){
    		$cercar_user = $_POST['cercar_user'];
        
   $data['users']=$this->user->cercar_user_servei($cercar_user);
        var_dump($data);
      }else{
        echo "no existe";
      }
  }
}
?>