<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Cercar_usuari extends CI_Controller {

	function __construct() {
	   	parent::__construct();
		  $this->load->model('user');
	}
	
  function index() {
    	if(isset($_POST['email_user'],$_POST['nom_user'])){
    		$email_user = $_POST['email_user'];
    		$nom_user = $_POST['nom_user'];
        echo $nom_user."-".$email_user;
 //   	  $data['users']=$this->user->cercar_user_servei($email_user,$nom);
   //     var_dump($data);
      }else{
        echo "no existe";
      }
  }
}
?>