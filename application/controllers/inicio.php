<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
session_start();
class Inicio extends CI_Controller {

  private $data = array();

  function __construct()
  {
    parent::__construct();
  	$this->load->helper('url');
  	$this->load->library('form_validation');
  	$this->load->helper(array('form'));
  	$this->load->model('categorias');
    $this->load->model('user');
    $this->load->model('servei');
    
    $session_data = $this->session->userdata('logged_in');
    $this->data['email'] = $session_data['email'];
    $this->data['foto'] = $session_data['foto'];
    $this->data['es_admin'] = $session_data['es_admin'];
    $this->data['id_user'] = $session_data['id'];
  }

  function index(){
    	$data = array();
    	$login_view = "";
    	$estat = $this->session->userdata('estat');
    	if($this->session->userdata('logged_in')) {
            $data=$this->data;
            switch($estat) {
        			case '1':
        			case '2':
                $categorias = $this->categorias->get_categorias();
                  foreach($categorias as $row) {
                    $data['categorias'][$row['id']] = $row['nom'];
                  }
                $login_view = 'frontend/panel_inici/logued';
                $data['contingut']=$this->load->view('frontend/panel_inici/panel_principal',$data,TRUE);
        				break;
        			case '3':
                /*
        				$login_view = 'frontend/panel_inici/logued';
        				$data['contingut']=$this->load->view('frontend/panel_inici/congelat',$data,TRUE);*/
        			case '4':/*
        				$login_view = 'frontend/panel_inici/logued';
        				$data['contingut']=$this->load->view('frontend/panel_inici/verifica',$data,TRUE);*/
                    redirect('logout', 'refresh');
                break;
        		}
            $data['login_form'] = $login_view;
            $this->load->view('frontend/inicio', $data);
    
        }else{
      		$categorias = $this->categorias->get_categorias();
      		foreach($categorias as $row) {
      			$data['categorias'][$row['id']] = $row['nom'];
      		}
      		$data['login_form'] = 'frontend/login_form';
      		$data['contingut']=$this->load->view('frontend/panel_inici/panel_principal',$data,TRUE);
      		$this->load->view('frontend/inicio', $data);
      	}

  }
    public function aboutus() {
      $data = array();
        if($this->session->userdata('logged_in')) {
          $session_data = $this->session->userdata('logged_in');
          $data=$this->data;
          $data['login_form'] = 'frontend/panel_inici/logued';
        }else{
          $data['login_form'] = 'frontend/login_form';
        }
        $data['contingut']=$this->load->view('frontend/panel_inici/aboutus',$data,TRUE);
        $this->load->view('frontend/inicio', $data);
    }
    public function cercarusuari() {
      $data = array();
        if($this->session->userdata('logged_in')) {
            $session_data = $this->session->userdata('logged_in');
            $data=$this->data;
            $data['login_form'] = 'frontend/panel_inici/logued';
        }else{
            $data['login_form'] = 'frontend/login_form';
        }
        $data['contingut']=$this->load->view('frontend/panel_inici/cercarusuari',$data,TRUE);
        $this->load->view('frontend/inicio', $data);
  }
  public function contacte() {
        $data = array();
        if($this->session->userdata('logged_in')) {
           $data=$this->data;
           $data['login_form'] = 'frontend/panel_inici/logued';
        } else {
          $data['login_form'] = 'frontend/login_form';
        }
        $data['contingut']=$this->load->view('frontend/panel_inici/contacte',$data,TRUE);
        $this->load->view('frontend/inicio', $data);
  
  }
  function alpha_dash_space($str)
  {
    return ( ! preg_match("/^([-a-z_ ])+$/i", $str)) ? FALSE : TRUE;
  }
  function validar_contacte(){
        $this->form_validation->set_error_delimiters('<span class="error_formulario_registro">','</span>');
        $this->form_validation->set_rules('nom', 'Nom', 'trim|required|callback__alpha_dash_space|alpha');
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
        $this->form_validation->set_rules('missatge', 'Missatge', 'trim|required|callback__alpha_dash_space|alpha');


        $this->form_validation->set_message('required', "Aquest camp es obligatori");
        $this->form_validation->set_message('alpha', "Només s'accepten lletres");
        $this->form_validation->set_message('valid_email', "Això no és una direcció de correu electronic.");

        if ($this->form_validation->run() == FALSE)
        {
            $this->contacte();
        }
        else
        {

        }
  }
  function detailusuari() {
      if(isset($_POST['cercar_user'])){
        $cercar_user = $_POST['cercar_user'];  

        if($this->session->userdata('logged_in')) {
            $data=$this->data;
            $data['login_form'] = 'frontend/panel_inici/logued';
        }else{
            $data['login_form'] = 'frontend/login_form';
        }
        
        $users=$this->user->cercar_user_servei($cercar_user);
        
        $html="";

        if($users!=null){
            foreach($users as $row) {
              $data2 = array(
                'nom_usuari' => $row->nom_usuari,
                'cognom' => $row->cognom,
                'foto' => $row->foto,
                'poblacion' => $row->poblacion,
                'email' => $row->email
              );
              $html = $html.$this->load->view('frontend/panel_inici/detailusuari',$data2,TRUE);
            }
            $data3['detail_users']=$html;
            $data['contingut']=$this->load->view('frontend/panel_inici/mostra_detailusuari',$data3,TRUE);
        }else{
            $data['contingut']=$this->load->view('frontend/panel_inici/no_troba_users',NULL,TRUE);
        }
        $this->load->view('frontend/inicio', $data);
      }else{
         redirect('inicio/no_autentificat', 'refresh');
      }
  }

  function serveis_detail(){
     if(isset($_POST['email_user'])){
        $email_user = $_POST['email_user']; 

        if($this->session->userdata('logged_in')) {
            $session_data = $this->session->userdata('logged_in');
            $data=$this->data;
            $data['login_form'] = 'frontend/panel_inici/logued';
        }else{
            $data['login_form'] = 'frontend/login_form';
        }
        
        $servei=$this->user->servei_user($email_user);

        $html="";

        if($servei!=null){
            foreach($servei as $row) {
              $data2 = array(
                'id_servei' => $row->id_servei,
                'nom_servei' => $row->nom_servei,
                'descripcio_servei' => $row->descripcio_servei,
                'nom_categoria' => $row->nom_categoria,
                'data_inici' => $row->data_inici,
                'data_fi' => $row->data_fi,
                'disp_horaria' => $row->disp_horaria,
                'preu' => $row->preu,
                'user_oferit_servei' => $row->email, //email del users que oferit el servei
              );
              //email del session passem al vista,per poder solicitar servei;
              if(isset($data['email'])){
                  $data2['email']=$data['email'];
              }
              if(isset($data['id_user'])){
                  $data2['id_user']=$data['id_user'];
              }
              $html = $html.$this->load->view('frontend/panel_inici/detailservei',$data2,TRUE);
            }
            $data3['detail_servei']=$html;
            $data['contingut']=$this->load->view('frontend/panel_inici/mostra_detailservei',$data3,TRUE);
        }else{
            $data['contingut']=$this->load->view('frontend/panel_inici/no_troba_servei',NULL,TRUE);
        }
        $this->load->view('frontend/inicio', $data);
      }else{
         redirect('inicio', 'refresh');
      }
  }
  public function verifica_solicitut(){
        if(isset($_POST['email_user'])){
          $id_servei=$_POST['id_servei'];
          $email_user=$_POST['email_user'];
          $id_user=$_POST['id_user'];
          
          if($this->session->userdata('logged_in')) {
            $session_data = $this->session->userdata('logged_in');
            $data=$this->data;
            $data['login_form'] = 'frontend/panel_inici/logued';
          }else{
              $data['login_form'] = 'frontend/login_form';
          }
          $puntsServeiBD=$this->servei->getPreuServei($id_servei);   
          $saldoUserBD=$this->user->getSaldoUser($email_user);  
          $comprovaMinimServeiOfertBD=$this->servei->comprovaServeiOferts($email_user);

          //els punts del servei i els punts del usuari, comparem-les
          //comprova si usuari té un servei oferit
          foreach($puntsServeiBD as $row) {
            $puntsServei=$row->preu;
          }   
          foreach ($saldoUserBD as $key) {
            $saldoUser=$key->saldo;
          }
          foreach ($comprovaMinimServeiOfertBD as $key) {
            $comprovaMinimServeiOfert=$key->servei_minim_oferit;
          } 

          //Es solicita
          //Quan es loguejat + no solicitar si mateix //comprovat en altre funcio, serveis_detail(controllador)
          //Com minim usuari solicitant ha de oferir un servei
          //El preu del servei ha der més gran o igual saldo del usuari
          if($comprovaMinimServeiOfert>0){
            if($puntsServei<=$saldoUser){         
              $this->user->enviarSolicitut($id_user,$id_servei);     
              $data['contingut']=$this->load->view('frontend/panel_inici/enviat_solicitut',NULL,TRUE);
            }else{
              $data['contingut']=$this->load->view('frontend/panel_inici/error_saldo_minim_servei',NULL,TRUE);
            }
          }else{
              $data['contingut']=$this->load->view('frontend/panel_inici/error_minim_oferit_servei',NULL,TRUE);
          }
          $this->load->view('frontend/inicio', $data);
        }else{
           redirect('inicio', 'refresh');   
        }
  }

  public function introduccio() {
      $data = array();
      if($this->session->userdata('logged_in')) {
        $session_data = $this->session->userdata('logged_in');
        $data=$this->data;
        $data['login_form'] = 'frontend/panel_inici/logued';
      }else{
        $data['login_form'] = 'frontend/login_form';
      }
      $data['contingut']=$this->load->view('frontend/panel_inici/introduccio',$data,TRUE);
      $this->load->view('frontend/inicio', $data);
  }
  public function no_autentificat() {
      $data = array();
      $data['login_form'] = 'frontend/login_form';
      $this->load->view('frontend/no_autentificat',$data);
  }

}

?>