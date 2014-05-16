<html>
	<head>
		<title>4</title>
		<link href="<?= base_url()?>media/css/usersettings.css" rel="stylesheet" type="text/css">
		<script src="<?= base_url()?>media/js/jquery.js"></script>
		<script src="<?= base_url()?>media/js/usersettings.js"></script>
	</head>
	<body>
		
		<div id="up-bar">
			<div id="user">
				<img src="<?= base_url()?>media/images/frontend/user_icon_mini2.png" />
				<span>nom usuari</span>
			</div>
		</div>
		
		<div id="user_nav">
			<div class="option">Perfil</div>
			<div class="option">Opcions</div>
			<div class="divisor_logout" ></div>
			<div class="option"><a href="<?= base_url()?>index.php/logout">Log Out</a></div>
		</div>
		
		<div id="sidebar">
			<a href="<?= base_url()?>">
			<div id="back">
				<img src="<?= base_url()?>media/images/frontend/volver.png" />
				<span>TORNAR</span>
			</div>
			</a>
			<div class="sidebar-option-none">
			</div>
			<div class="sidebar-option">
				<a>SERVEIS</a>
			</div>
			<div class="sidebar-option">
				<a>SOLICITUDS</a>
			</div>
		</div>

		<div id="page-wrapper">
		</div>

	</body>
</html>