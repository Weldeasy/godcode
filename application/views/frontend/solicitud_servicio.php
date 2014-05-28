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
	<link href="<?= base_url()?>media/css/serveis.css" rel="stylesheet">
    <link href="navbar-fixed-top.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Droid+Sans' rel='stylesheet' type='text/css'>
    <link href='<?= base_url()?>media/css/login.css' rel='stylesheet' type='text/css'>
  </head>
 <body>
 <div id='cssmenu'>
  <ul>
    <li class='active'><a href='<?= base_url()?>'><span>Inici</span></a></li>
    <li class='active'><a href='<?= base_url()?>index.php/inicio/cercarusuari'><span>Buscar usuaris</span></a></li>
  <?php if ($this->session->userdata('logged_in') == FALSE) { ?>
    <li class='active'><a href='<?= base_url()?>index.php/formularioregistro/'><span>Registre</span></a></li>
  <?php } ?>
    <li class='active'><a href='<?= base_url()?>index.php/inicio/contacte/'><span>Contacte</span></a></li>
    <li class='active'><a href='<?= base_url()?>index.php/inicio/introduccio'><span>Què és un banc del temps?</span></a></li>
    
    <?= $this->load->view($login_form)?>
  </ul>
  <a href="#" id="pull"></a> 
 </div>
 <div id="contenido_principal">
  <div id="about_us">
        <?php echo $html; ?>      
  </div>
    <div id="footer">
      <div id="separador_degradado">
        
      </div>
      <div class="contenido_footer">
        <p>Projecte DAW M12. Producte desenvolupat per Oscar Marcos, Oriol Antón, Wilson Pinto, Alex Martin.<a href='<?= base_url()?>index.php/politica_privacidad/'>Política privacitat</a> </p>
      </div>
    </div>
</body>
</html>
    
</div>