<html>
	<head>
		<title>Time Banking | La meva conte</title>
		<link href="<?= base_url()?>media/css/usersettings.css" rel="stylesheet" type="text/css">
		<script src="<?= base_url()?>media/js/jquery.js"></script>
		<script src="<?= base_url()?>media/js/usersettings.js"></script>
			  <!-- JEASYUI-->
	    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>media/easyui/themes/default/easyui.css">
	    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>media/easyui/themes/icon.css">
	    <script type="text/javascript" src="<?php echo base_url();?>media/easyui/jquery.min.js"></script>
	    <script type="text/javascript" src="<?php echo base_url();?>media/easyui/jquery.easyui.min.js"></script>

	    <script id="script-lang" type="text/javascript" src="<?php echo base_url();?>media/easyui/locale/easyui-lang-ca.js"></script>
	    <script type="text/javascript" src="<?php echo base_url();?>media/easyui/datagrid-detailview.js"></script>
 
		
		<link href="<?= base_url()?>media/css/style.css" rel="stylesheet">
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
			<a href="<?= base_url()?>index.php/user_settings/solicitud"><div class="sidebar-option">Solicituts pendents</div></a>
			<a  href="<?= base_url()?>index.php/user_settings/consumirServei"><div class="sidebar-option">Consumir un Servei</div></a></a>
		</div>

		<div id="page-wrapper">
			<?php if(isset($panel_user)){
			 		 echo $panel_user; 
			 	}
			 ?>
		</div>

	</body>
</html>