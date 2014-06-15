<html>
	<head>
		<meta charset="utf-8">
		<title>Time Banking | Editar el meu servei</title>
		<link href="<?= base_url()?>media/css/usersettings.css" rel="stylesheet" type="text/css">
		<link href="<?= base_url()?>media/css/style.css" rel="stylesheet">
		<link href="<?= base_url()?>media/css/normalize.min.css" rel="stylesheet">
		<link href="<?= base_url()?>media/css/ion.rangeSlider.css" rel="stylesheet">
		<link href="<?= base_url()?>media/css/ion.rangeSlider.skinSimple.css" rel="stylesheet">
		<link href="<?= base_url()?>media/css/serveis.css" rel="stylesheet">
		<script src="<?= base_url()?>media/js/jquery.js"></script>
		<script src="<?= base_url()?>media/js/usersettings.js"></script>
		<script src="<?= base_url()?>media/js/ion-rangeSlider/ion.rangeSlider.min.js"></script>
		<link href="<?= base_url()?>media/css/jquery-ui-1.10.4.css" rel="stylesheet">
		<script src="<?= base_url()?>media/js/jquery-ui-1.10.4.js"></script>
		
		<script>
		<?php 
		if (!isset($horas)) {
			$aux = set_value('disp_horaria');
			$horas = explode(';', $aux);
		}
		if (!isset($disponibilitat_dies)) {
			$aux = set_value('days[]');
			$disponibilitat_dies = explode(';', $aux);
		}
		?>
		window.onload = function(){
				$("#disp_horaria").ionRangeSlider({
					min: 0,
					max: 24,
					from: <?php if(isset($horas)) {echo $horas[0];} else { echo 0; } ?>,
					to: <?php if(isset($horas)) {echo $horas[1];} else { echo 24; } ?>,
					type: 'double',
					postfix: ":00",
					prettify: false,
					hasGrid: true
				});
				
				$("#datepicker1").datepicker({ dateFormat: 'yy-mm-dd' });
				
			}
		</script>
<style>
	.page_wrapper {
		overflow:auto;
		width:100%;
	}
	#slider-hores {
		width:350px;
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
				<span>Tornar</span>
			</div>
			</a>
			<div class="sidebar-option-none">
			</div>
			<a href="<?= base_url()?>index.php/user_settings/serveis"><div class="sidebar-option">Els meus serveis</div></a>
			<a href="<?= base_url()?>index.php/user_settings/solicitud"><div class="sidebar-option">Solicituts rebudes</div></a>
			<a href="<?= base_url()?>index.php/user_settings/my_solicitud"><div class="sidebar-option">Solicituts enviades</div></a>
			<a  href="<?= base_url()?>index.php/user_settings/consumirServei"><div class="sidebar-option">Consumir solicituts</div></a></a>
	
		</div>
		<div id="page-wrapper">
		<?php
			$attributes = array('class' => 'formY', 'id' => 'editarServicio');
			echo form_open('user_settings/validar_editar_servicio/'.$id, $attributes);
		?>	
			Nom:
			<input type="text" name="nom" value="<?php echo set_value('nom'); if(isset($nom)) {echo $nom;} ?>"  />
			<?php echo form_error('nom'); ?><br />
			Descripci&oacute;:
			<input type="text" name="descripcio" value="<?php echo set_value('descripcio'); if(isset($descripcio)) {echo $descripcio;}?>"  />
			<?php echo form_error('descripcio'); ?><br />
			Preu:
			<input type="number" name="preu" value="<?php echo set_value('preu'); if(isset($preu)) {echo $preu;} ?>"  />
			<?php echo form_error('preu'); ?><br />
			Data finalització:
			<input type="text" name="data_fi" id="datepicker1" value="<?php echo set_value('data_fi'); if(isset($data_fi)) {echo $data_fi;} ?>" />
			<?php echo form_error('data_fi'); ?><br />
			Disponibilitat horaria:
			<div id="slider-hores">
			<input type="text" id="disp_horaria" name="disp_horaria" value="" value="<?php echo set_value('disp_horaria'); ?>"  /></div>
			<?php echo form_error('disp_horaria'); ?><br />
			Disponibilitat dies:
			<table id="disp_dias">
				<tr>
					<td>L</td>
					<td>M</td>
					<td>X</td>
					<td>J</td>
					<td>V</td>
					<td>S</td>
					<td>D</td>
				</tr>
				<tr>
					<td><input type="checkbox" name="days[]" <?php if ( (isset($_POST['days'])) && (in_array('L', $_POST['days'])) ) print 'checked'; ?> value="L" /></td>
					<td><input type="checkbox" name="days[]" <?php if ( (isset($_POST['days'])) && (in_array('M', $_POST['days'])) ) print 'checked'; ?> value="M" /></td>
					<td><input type="checkbox" name="days[]" <?php if ( (isset($_POST['days'])) && (in_array('X', $_POST['days'])) ) print 'checked'; ?> value="X" /></td>
					<td><input type="checkbox" name="days[]" <?php if ( (isset($_POST['days'])) && (in_array('J', $_POST['days'])) ) print 'checked'; ?> value="J" /></td>
					<td><input type="checkbox" name="days[]" <?php if ( (isset($_POST['days'])) && (in_array('V', $_POST['days'])) ) print 'checked'; ?> value="V" /></td>
					<td><input type="checkbox" name="days[]" <?php if ( (isset($_POST['days'])) && (in_array('S', $_POST['days'])) ) print 'checked'; ?> value="S" /></td>
					<td><input type="checkbox" name="days[]" <?php if ( (isset($_POST['days'])) && (in_array('D', $_POST['days'])) ) print 'checked'; ?> value="D" /></td>
				</tr>
			</table>
			<?php echo form_error('days'); ?><br />
			<?php if (isset($_POST['categoria'])) $c = $_POST['categoria']; else $c = $categoria; echo form_dropdown('categoria', $categorias, $c); ?><br />
			<?php echo form_error('categoria'); ?><br /><br />
			Codi postal:
			<input type="text" name="cp" value="<?php echo set_value('cp'); if(isset($cp)) {echo $cp;} ?>" />
			<?php echo form_error('cp'); ?><br />
			<input type="hidden" name="data_inici" value="<?php echo set_value('data_inici'); if(isset($data_inici)) {echo $data_inici;} ?>" />
			<input type="submit" name="submit" value="Editar servei" />

		</div>
	</body>
</html>