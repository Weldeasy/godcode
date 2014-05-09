<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Inicio extends CI_Controller {

  function __construct()
  {
    parent::__construct();
  }

  function index()
  {
	$data = $this->load->view('login-form');
    $this->load->view('inicio', $data);
  }

}

?>