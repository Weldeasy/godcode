<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title>Registro completado</title>
		<script src="//code.jquery.com/jquery-1.10.2.js"></script>
		<link href="<?= base_url()?>media/css/style.css" rel="stylesheet">
		<link href='<?= base_url()?>media/css/login.css' rel='stylesheet' type='text/css'>
	</head>
	<body>
		<div id='cssmenu'>
			<ul>
				<img src="<?= base_url()?>media/images/frontend/logofinal.png" heigth="20px" align="left" style="padding-left:5px;padding-top:5px;"/>
				<li class='active'><a href='<?= base_url()?>'><span>Inici</span></a></li>
				<li class='active'><a href='<?= base_url()?>index.php/inicio/cercarusuari'><span>Usuaris</span></a></li>
				<?php if ($this->session->userdata('logged_in') == FALSE) { ?>
					<li class='active'><a href='<?= base_url()?>index.php/formularioregistro/'><span>Registre</span></a></li>
				<?php } ?>
				<li class='active'><a href='<?= base_url()?>index.php/inicio/contacte/'><span>Contacte</span></a></li>
				<li class='active'><a href='<?= base_url()?>index.php/inicio/introduccio'><span>Què és un banc del temps?</span></a></li>

				<?= $this->load->view($login_form)?>
			</ul>
			<a href="#" id="pull"></a> 
		</div>
		<div class="contenido_principal">
			<div id="about_us">
				<?php
				if (isset($mensaje)) {
					print_r($mensaje);
				} else {
					print "A ocurregut algun error, torna a provar-ho, si continua contacta amb <a href='mailto:gcbtv0@gmail.com'><b>gcbtv0@gmail.com</b></a>";
				}
				?>
				<a href="<?= base_url(); ?>">Sortir</a>
			</div>
		</div>
		<div id="footer">
			<div id="separador_degradado"></div>
			<div class="contenido_footer">
				<p>Projecte DAW M12. Producte desenvolupat per Oscar Marcos, Oriol Antón, Wilson Pinto, Alex Martin.<a href='<?= base_url()?>index.php/inicio/aboutus/'><span>Sobre GODCODE.</span></a></p>
			</div>
		</div>
	</body>
</html>