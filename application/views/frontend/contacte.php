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
	 <li class='active'><a href='<?= base_url()?>index.php/formularioregistro/'><span>REGISTRA'T</span></a></li>
  </ul>
  <?php echo $this->load->view($login_form); ?>
 </div>
 <form class="form-container" id="form_contacte">
<div class="form-title"><h2>Contacte</h2></div>
<div class="form-title">Nombre</div>
<input class="form-field" type="text" name="firstname" /><?= form_error("firstname"); ?><br />
<div class="form-title">Email</div>
<input class="form-field" type="text" name="email" /><?= form_error("email"); ?><br />
<div class="form-title">Telefono</div>
<input class="form-field" type="text" name="telefono" /><?= form_error("telefono"); ?><br />
<div class="form-title">Telefono</div>
<input class="form-field" type="text-area" name="telefono" /><?= form_error("telefono"); ?><br />
<div class="submit-container">
<input class="submit-button" type="submit" value="Submit" />
</div>
</form>
<textarea name="comment" form="form_contacte">Escriu el teu missatge</textarea>

<div id="footer">
      <div id="separador_degradado">
        
      </div>
      <div class="contenido_footer">
        <p>Projecte DAW M12. Producte desenvolupat per Oscar Marcos, Oriol Antón, Wilson Pinto.<a href='<?= base_url()?>index.php/politica_privacidad/'>Política privacitat</a> </p>
      </div>
    </div>
</body>
</html>