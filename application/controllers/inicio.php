<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
session_start();
class Inicio extends CI_Controller {
  /**
   * [$data se guarda les dades del usuari a partir del session]
   * @var array
   */
  private $data = array();

  /**
   * [__construct Inici]
   * Carregem la libraria i els models i tambe les session
   */
  function __construct(){
    parent::__construct();
    $this->load->library(array('form_validation'));
    $this->load->helper(array('form', 'url'));
    $this->load->model(array('categorias', 'user', 'servei','lugares'));
    
    $session_data = $this->session->userdata('logged_in');
    $this->data['email'] = $session_data['email'];
    $this->data['foto'] = $session_data['foto'];
    $this->data['es_admin'] = $session_data['es_admin'];
  }
  /**
   * [contingut es carrega la pagina principal, amb les vistes i les dades]
   * @param  [void] $form  [el formulari del login]
   * @param  [void] $vista [la vista del pàgina principal]
   * @param  [void] $data  [les dades que necessiten a la vista]
   * @return [void]        [una vista inici]
   */
  function contingut($form,$vista,$data){
      $data['contingut']=$this->load->view('frontend/panel_inici/'.$vista,$data,TRUE);
      $data['login_form'] = 'frontend/'.$form;
      $this->load->view('frontend/inicio', $data);
  }
  /**
   * [es_autentificat si existeiz la session 'logued_in']
   * @return [boolean] [si usuari esta loguejat o no]
   */
  function es_autentificat(){
      if($this->session->userdata('logged_in')){
          return TRUE;
      }else{
          return FALSE;
      }
  }
  /**
   * [index la pàgina principal del web]
   * @return [void] [es carrega la categoria al inici]
   */
  function index(){
     $data = array();
      $login_view = "";
      $estat = $this->session->userdata('estat');
      $data=$this->data;
      $categorias = $this->categorias->get_categorias();
      foreach($categorias as $row) {
        $data['categorias'][$row['id']] = $row['nom'];
      }
      $vista='panel_principal';

      if($this->es_autentificat()) {
            switch($estat) {
              case '1':
              case '2':
                        $login_view = 'panel_inici/logued'; //si el estat és 1 o 2, vol dir que està loguejat
                break;
              case '3': //sino 3=congelat
						$this->session->unset_userdata('logged_in');
                        $login_view = 'login_form';
                        $vista='congelat';
                break;
              case '4': //4 = ha de verificar el correu
					  $this->session->unset_userdata('logged_in');
                      $login_view = 'login_form';
                      $vista='verifica';
                break;
            }
    
        }else{//si no existeix la sessio
          $login_view='login_form';
        }
        $this->contingut($login_view,$vista,$data);//si crida la funcio contingut
  }
  /**
   * [mostraContingut ]
   * @param  [void] $vistaCont [passem el nom del vista]
   * @return [void]            [es carrega inici amb la vista concreta]
   */
  public function mostraContingut($vistaCont){
        $login_view='';
        $data=$this->data;
        
        if($this->es_autentificat()){
            $login_view = 'panel_inici/logued';
        }else{
          $login_view = 'login_form';
        }
        $vista=$vistaCont;
        $this->contingut($login_view,$vista,$data);
  }
  /**
   * [aboutus crida la funcio mostraContingut]
   * @return [void] [passen el nom del vista]
   */
  public function aboutus() {
      $this->mostraContingut('aboutus');
  }
  /**
   * [cercarusuari crida la funcio mostraContingut]
   * @return [void] [passen el nom del vista]
   */
  public function cercarusuari() {
      $this->mostraContingut('cercarusuari');
  }
  /**
   * [contacte crida la funcio mostraContingut]
   * @return [void] [passen el nom del vista]
   */
  public function contacte() {
       $this->mostraContingut('contacte');  
  }
  /**
   * [introduccio crida la funcio mostraContingut]
   * @return [type] [passen el nom del vista]
   */
  public function introduccio() {
       $this->mostraContingut('introduccio');  
  }
  /**
   * [no_autentificat ]
   * @return [type] [es carrega la vista no_autenifica]
   */
  public function no_autentificat(){
      $data = array();
      $data['login_form'] = 'frontend/login_form';
      $this->load->view('frontend/no_autentificat',$data);
  }
  /**
   * [alpha_dash_space expression regular]
   * @param  [String] $str [el nom del camp]
   * @return [boolean]      [true o false]
   */
  function alpha_dash_space($str){
    return (!preg_match("/^([-a-z_ ])+$/i", $str)) ? FALSE : TRUE;
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
			$config = array(
				'charset' => 'utf-8',
				'newline' => '\r\n',
				'mailtype' => 'html',
				'protocol' => 'smtp',
				'smtp_host' => 'ssl://smtp.googlemail.com',
				'smtp_port' => 465,
				'smtp_user' => 'gcbtv0@gmail.com',
				'smtp_pass' => 'pepe123456',
				'charset' => 'iso-8859-1',
				'wordwrap' => TRUE
			);
			$this->load->library('email', $config);
			$this->email->set_newline("\r\n");
			$this->email->from('gcbtv0@gmail.com', 'Contacte | Banc del temps');
			$this->email->to('gcbtv0@gmail.com');
			$this->email->subject('Contacte | Banc del temps');
			$this->email->message(
				"<h1>Contacte</h1><p>Nom: ".$this->input->post("nom")."<br/>Email: ".$this->input->post("email")."<br/>Missatge: ".$this->input->post("missatge")."<br/></p>"
			);
			?><script>alert("Missatge enviat, et contestarem lo\nmes aviat possible.");</script><?php
			$this->email->send();
			redirect('inicio', 'refresh');
        }
  }
  /**
   * [detailusuari informació del usuari cercat]
   * @return [void] [description]
   */
   function perfilusuari ($uemail = NULL) {
    if($this->es_autentificat()) {
            $data=$this->data;
            $data['login_form'] = 'frontend/panel_inici/logued';
        }else{
            $data['login_form'] = 'frontend/login_form';
        }
    if ($uemail != NULL) {
        $ausuari = $this->user->get_user_by_email($uemail);
        if (!empty($ausuari)) {
            $data_perfil = array();
            $data_perfil['nom_usuari'] = ucfirst($ausuari->nom);
            $data_perfil['cognom_usuari'] = strtolower($ausuari->cognom);
            $data_perfil['presentacio_usuari'] = $ausuari->presentacio;
            $data_perfil['provincia_usuari'] = $this->user->provincia_user_by_id($ausuari->provincia);
            $data_perfil['foto_usuari'] = $ausuari->foto;
            $perfil = $this->load->view('frontend/panel_inici/perfilusuari', $data_perfil, TRUE);
            
            $data['contingut'] = $perfil;
            
            $data_historial['id_usuari'] = $this->user->get_user_by_email($uemail)->id;
            $data_historial['consumits_usuari'] = $this->user->get_user_consumits($data_historial['id_usuari']);
            $historial = "<table class='history' border='1'><tr><th>Nom consumidor</th><th>Data</th><th>Valoracio</th></tr>";
                if (count($data_historial['consumits_usuari']) > 0) {
                    foreach ($data_historial['consumits_usuari'] as $consumit) {
                        $consumit->nom_consumidor = $this->user->get_user_by_Id($consumit->id_consumidor)->nom;
                        $historial .= $this->load->view('frontend/panel_inici/historialusuari', $consumit, TRUE);
                    }
                } else {
                    $historial .= "<tr><td colspan='3'>No hi ha historia</td></tr>";
                }
            $historial .= "</table><p>&nbsp;</p>";
            $data['contingut'] .= $historial;
            $data['contingut'] .= "</div>";
        } else {
            //$data[]
            $data['contingut'] = "L'usuari que has solicitat no esta disponible.";
        }
    } else {
        $data['contingut'] = "No has indicat cap usuari.";
    }
    $this->load->view('frontend/inicio', $data);
   }
   
  /**
   * [detailusuari informació del usuari cercat]
   * @return [void] [description]
   */
  function detailusuari() {
      if(isset($_POST['cercar_user'])){
        $cercar_user = $_POST['cercar_user'];  

        if($this->es_autentificat()) {
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
  /**
   * [serveis_detail es mostra la informació dels serveis del usuari concret]
   * @return [type] [description]
   */
  function serveis_detail(){
     if(isset($_POST['email_user'])){
        $email_user = $_POST['email_user']; 

        if($this->es_autentificat()) {
            $data=$this->data;
            $data['login_form'] = 'frontend/panel_inici/logued';
        }else{
            $data['login_form'] = 'frontend/login_form';
        }
        
        $servei=$this->user->servei_user($email_user);

        $html="";

        if($servei!=null){
            foreach($servei as $row) {
              $pueblo = $this->lugares->get_poblacion_by_cp($row->cp);
              $data2 = array(
                'id_servei' => $row->id_servei,
                'nom_servei' => $row->nom_servei,
                'categoria' => $row->categoria,
                'descripcio_servei' => $row->descripcio_servei,
                'nom_categoria' => $row->nom_categoria,
                'data_inici' => $row->data_inici,
                'data_fi' => $row->data_fi,
                'horas' => explode(";", $row->disp_horaria),
                'days' => explode(";", $row->disp_dies),
                'preu' => $row->preu,
                'user_oferit_servei' => $row->email, //email del users que oferit el servei
                'poblacion' => $pueblo->poblacion,
              );
              //email del session passem al vista,per poder solicitar servei;
              if(isset($data['email'])){
                  $data2['email']=$data['email'];
                  $data2['id_user']=$this->user->get_user_by_email($data2['email'])->id;
                  $data2['es_admin']=$data['es_admin'];                 
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
  /**
   * [verifica_solicitut el usuari solicita un servei]
   * @return [void] [description]
   */
  public function verifica_solicitut(){
        if(isset($_POST['email_user'])){
          $id_servei=$_POST['id_servei'];
          $email_user=$_POST['email_user'];
          $id_user=$_POST['id_user'];
          $missatge=$_POST['missatge'];
          $login_view='';
          $vista='';
          if($this->es_autentificat()) {
                $data=$this->data;
                $login_view = 'panel_inici/logued';
          }else{
                $login_view= 'login_form';
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
              //comprovo si abans  ha enviat el mateix usuari amb el mateix servei
               if($this->user->unic_solicitut($id_user,$id_servei)->total_solicitut_user_servei==0){   
                  $this->user->enviarSolicitut($id_user,$id_servei);  
                  $id_solictut=$this->user->getIdSolictut($id_user,$id_servei)->id;
                  $dataAvui=date('Y-m-d'); 
                  $id_emisor=$id_user;
                  $id_receptor=$this->servei->get_servei($id_servei)->usuari;
                  $this->user->enviaMissatge($id_emisor,$id_receptor,$missatge,$dataAvui,$id_solictut);
                $vista='enviat_solicitut';
               }else{
                  $vista='error_ja_enviada_solicitut';
               }
            }else{
               $vista='error_saldo_minim_servei';
            }
          }else{
              $vista='error_minim_oferit_servei';
          }
          $this->contingut($login_view,$vista,$data);
        }else{
           redirect('inicio', 'refresh');   
        }
  }

}

?>