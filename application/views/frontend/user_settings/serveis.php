<html>
	<head>
		<title>Time Banking | Els meus serveis</title>
		<link href="<?= base_url()?>media/css/usersettings.css" rel="stylesheet" type="text/css">
		<link href="<?= base_url()?>media/css/style.css" rel="stylesheet">
		<link href="<?= base_url()?>media/css/serveis.css" rel="stylesheet">
		<script src="<?= base_url()?>media/js/jquery.js"></script>
		<script src="<?= base_url()?>media/js/usersettings.js"></script>
		<meta charset="utf-8">
	</head>
	<body>
		<div id="up-bar">
			<div id="user">
				<img src="<?= base_url()?>media/images/frontend/user_icon_mini2.png" />
				<span><?=$email?></span>
			</div>
		</div>
		
		<div id="user_nav">
			<a class="option" href="<?= base_url()?>index.php/user_settings/perfil">Perfil</a>
			<a class="option" href="<?= base_url()?>index.php/user_settings/opcions">Opcions</a>
			<div class="divisor_logout" ></div>
			<a class="option" href="<?= base_url()?>index.php/logout">Log Out</a>
		</div>
		
		<div id="sidebar">
			<a class="back" href="<?= base_url()?>">
			<div id="back">
				<img src="<?= base_url()?>media/images/frontend/volver.png" />
				<span>Tornar</span>
			</div>
			</a>
			<div class="sidebar-option-none">
			</div>
			<a href="<?= base_url()?>index.php/user_settings/serveis"><div class="sidebar-option">Els meus serveis</div></a>
			<a href="<?= base_url()?>index.php/user_settings/solicitud"><div class="sidebar-option">sol&middot;licituds rebudes</div></a>
			<a href="<?= base_url()?>index.php/user_settings/my_solicitud"><div class="sidebar-option">sol&middot;licituds enviades</div></a>
			<a  href="<?= base_url()?>index.php/user_settings/consumirServei"><div class="sidebar-option">Consumir sol&middot;licituds</div></a></a>
		</div>

		<div id="page-wrapper">
			<h1>Els meus serveis</h1>
			<a href="<?=base_url()?>index.php/user_settings/crear_servei" title="Crear un nou servei propi"><input type="button" value="Crear nou servei" /></a>
			<?php echo $html; ?>
		</div>
	</body>
</html>