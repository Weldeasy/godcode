<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Inicio extends CI_Controller {

  function __construct()
  {
    parent::__construct();
  }

  function index()
  {
	
	//$data['login_form'] = $this->load->view('frontend/login_form', null, TRUE);
    $this->load->view('frontend/inicio');
  }

}

?>