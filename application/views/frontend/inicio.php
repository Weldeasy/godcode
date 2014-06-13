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

		<link href="<?= base_url()?>media/css/serveis.css" rel="stylesheet">
		<link rel="stylesheet" href="code.jquery.com/ui/1.10.4/themes/smoothness/jquery-ui.css">
		<script src="<?= base_url()?>media/js/jquery.js"></script>
		<link href="<?= base_url()?>media/css/jquery-ui-1.10.4.css" rel="stylesheet">
		<script src="<?= base_url()?>media/js/jquery-ui-1.10.4.js"></script>
		
		<!-- JEASYUI-->
		<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>media/easyui/themes/default/easyui.css">
		<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>media/easyui/themes/icon.css">
		
		<script type="text/javascript" src="<?php echo base_url();?>media/easyui/jquery.easyui.min.js"></script>
		<script id="script-lang" type="text/javascript" src="<?php echo base_url();?>media/easyui/locale/easyui-lang-ca.js"></script>
		<script type="text/javascript" src="<?php echo base_url();?>media/easyui/datagrid-detailview.js"></script>
		<!-- FI JEASYUI-->
		<script type="text/javascript" src="<?php echo base_url();?>media/js/frontend_inicio.js"></script>
		<script>
			$(function() {
				$("#datepicker1").datepicker({ dateFormat: 'yy-mm-dd' });
				$("#datepicker2").datepicker({ dateFormat: 'yy-mm-dd' });
			});
		</script>
		<title>Time Bank</title>
	</head>
	<body>
		<div id='cssmenu'>
			<ul>
				<li class='active logo'><a href='<?= base_url()?>'><span>Inici</span></a></li>
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
		
		<?= $contingut?>

		<div id="footer">
			<div id="separador_degradado"></div>
			<div class="contenido_footer">
				<p>Projecte DAW M12. Producte desenvolupat per Oscar Marcos, Oriol Antón, Wilson Pinto, Alex Martin.<a href='<?= base_url()?>index.php/inicio/aboutus/'><span>Sobre GODCODE.</span></a></p>
			</div>
		</div>
	</body>
</html>