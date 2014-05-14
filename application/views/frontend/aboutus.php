<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html lang="es" xmlns="http://www.w3.org/1999/xhtml">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <meta name="author" content="">
    <link href="<?= base_url()?>media/css/style.css" rel="stylesheet">
    <link href="navbar-fixed-top.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Droid+Sans' rel='stylesheet' type='text/css'>
    <link href='<?= base_url()?>media/css/login.css' rel='stylesheet' type='text/css'>
  </head>
 <body>
 <div id='cssmenu'>
   <ul>
	<li class='active'><a href='<?= base_url()?>'><span>INICI</span></a></li>
     <li class='active'><a href='#'><span>QUÉ ES UN BANCO DEL TIEMPO?</span></a></li>
     <li class='active'><a href='<?= base_url()?>index.php/aboutus/'><span>SOBRE GODCODE</span></a></li>
     <li class='active'><a href='#'><span>CONTACTA</span></a></li>
	 <?php
	if ($login_form != null) {
		echo $this->load->view($login_form);
		?><li class='active'><a href='<?= base_url()?>index.php/formularioregistro/'><span>REGISTRE'T</span></a></li><?php
	} else {
		echo $this->load->view('frontend/welcome');
	}
?>
  </ul>
 </div>
 <div id="contenido_principal">
  <div id="about_us">
              <h1>SOBRE NOSALTRES</h1>
              <hr />
              <br />
              <p>Godcode és una empresa impulsada per un jove grup de programadors web. Malgrat ser un grup tan jove, podem encarrilar qualsevol projecte gràcies a les nostres ganes i professionalitat. Tenim un gran ventall de projectes nostres, si vulgues més informació posi's en contacte amb nosaltres o miri en la nostra web.</p>
            </div>
        </div>
      </center>
    </div>
    <div id="contenido_principal">
    <div class="sombra_zona_busqueda"></div>
    <div id="contenido_principal_izquierda">
      <a link="#"><img src="<?= base_url()?>media/images/frontend/mas_votados.png" align="center" alt="Top votados" width="100%"></a>
    </div>
    <div id="contenido_principal_derecha">
      <a link="#"><img src="<?= base_url()?>media/images/frontend/categories.png" align="center" alt="Top votados" width="100%"></a>
    </div>
  </div>
</div>