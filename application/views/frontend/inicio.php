<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <meta name="author" content="">
    <link href="<?= base_url()?>media/css/style.css" rel="stylesheet">
    <link href='<?= base_url()?>media/css/login.css' rel='stylesheet' type='text/css'>
	 <link rel="stylesheet" href="//code.jquery.com/ui/1.10.4/themes/smoothness/jquery-ui.css">
	<script src="//code.jquery.com/jquery-1.10.2.js"></script>
	<script src="//code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
	<link rel="stylesheet" href="/resources/demos/style.css">
	<script>
	$(function() {
	$( "#datepicker1" ).datepicker();
	$("#datepicker2").datepicker();
	});
	</script>
    <title>Time Bank</title>
  </head>
 <body>
 <div id='cssmenu'>
	<ul>
		<li class='active'><a href='<?= base_url()?>'><span>INICI</span></a></li>
		<li class='active'><a href='<?= base_url()?>index.php/introduccio'><span>QUÉ ES UN BANCO DEL TIEMPO?</span></a></li>
    <li class='active'><a href='<?= base_url()?>index.php/cercarusuari'><span>Usuaris</span></a></li>
		<li class='active'><a href='<?= base_url()?>index.php/aboutus/'><span>SOBRE GODCODE</span></a></li>
		<li class='active'><a href='<?= base_url()?>index.php/contacte/'><span>CONTACTA</span></a></li>
	 <?php if(isset($esta_loguejat)){ ?>
      <li class="welcome_msg" id="redondo"><img id="userfoto" src="<?php echo base_url().'media/users_profile/thumbs/'.$foto; ?>" /></li>
     <li class="welcome_msg"><?php echo "Hola,  ".$email; ?></li>
    <br/>
    <a class="logout_b" title="Tancar sessio" href="<?= base_url()?>index.php/logout"><img src="<?= base_url()?>media/images/frontend/close_session.png" /></a>
    <a class="user_settings" title="La meva conte" href="<?= base_url()?>index.php/user_settings"><img src="<?= base_url()?>media/images/frontend/user_settings.png" /></a>
  <?php }else{ ?>
    <li class='active'><a href='<?= base_url()?>index.php/formularioregistro/'><span>REGISTRA'T</span></a></li>
  <?php  } ?>

  </ul>
  <?php if(!isset($esta_loguejat)){ echo $this->load->view($login_form); } ?>
 
 </div>
<?php echo $contingut; ?>

<div id="footer">
      <div id="separador_degradado">
        
      </div>
      <div class="contenido_footer">
        <p>Projecte DAW M12. Producte desenvolupat per Oscar Marcos, Oriol Antón, Wilson Pinto.<a href='<?= base_url()?>index.php/politica_privacidad/'>Política privacitat</a> </p>
      </div>
    </div>
</body>
</html>