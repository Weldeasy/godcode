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
              <h1>NO AUTENTIFICAT</h1>
              <hr />
              <br />
              <p> Sis plau, intenteu feu altre vegada, sino posi al contacte al admin </p>
    
  </div>
    <div id="footer">
      <div id="separador_degradado">
        
      </div>
      <div class="contenido_footer">
        <p>Esto es el footer</p>
      </div>
    </div>
    
</div>