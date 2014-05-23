<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Time Banking | Editar el meu servei</title>
		<link href="<?= base_url()?>media/css/usersettings.css" rel="stylesheet" type="text/css">
		<link href="<?= base_url()?>media/css/style.css" rel="stylesheet">
		<link href="<?= base_url()?>media/css/serveis.css" rel="stylesheet">
		<script src="<?= base_url()?>media/js/jquery.js"></script>
		<script src="<?= base_url()?>media/js/usersettings.js"></script>
		<script>var hora_inici = <?php echo json_encode($hora_inici); ?>;var hora_fi = <?php echo json_encode($hora_fi); ?>;</script>
		<link rel="stylesheet" href="http://code.jquery.com/ui/1.10.4/themes/smoothness/jquery-ui.css">
		<script src="http://code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
<script>
						$(function() {
						$( "#slider-hores" ).slider({
						range: true,
						min: 00,
						max: 24,
						values: [ hora_inici, hora_fi ],
						slide: function( event, ui ) {
						$( "#hores" ).val( ui.values[ 0 ] + ":00 - " + ui.values[ 1 ] + ":00" );
						}
						});
						$( "#hores" ).val( $( "#slider-hores" ).slider( "values", 0 ) +
						":00 - " + $( "#slider-hores" ).slider( "values", 1 ) + ":00" );
						});
						</script>
<style>
	.page_wrapper {
		overflow:auto;
		width:100%;
	}
	#slider-hores {
		width:300px;
	}
</style>
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
			<a class="back" href="<?= base_url()?>index.php/user_settings">
			<div id="back">
				<img src="<?= base_url()?>media/images/frontend/volver.png" />
				<span>TORNAR</span>
			</div>
			</a>
			<div class="sidebar-option-none">
			</div>
			<a href="<?= base_url()?>index.php/user_settings/serveis"><div class="sidebar-option">SERVEIS</div></a>
			<a><div class="sidebar-option">SOLICITUDS</div></a>
		</div>

		<div id="page-wrapper">
		</div>
	</body>
</html>