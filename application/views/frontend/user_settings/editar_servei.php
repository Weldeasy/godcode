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
				
				$("#datepicker1").datepicker();
				
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
				<span>TORNAR</span>
			</div>
			</a>
			<div class="sidebar-option-none">
			</div>
			<a href="<?= base_url()?>index.php/user_settings/serveis"><div class="sidebar-option">SERVEIS</div></a>
			<a><div class="sidebar-option">SOLICITUDS</div></a>
		</div>
		<div style="margin-left:450px; margin-top:50px;">
		<?php
			$attributes = array('class' => 'formY', 'id' => 'editarServicio');
			echo form_open('user_settings/validar_editar_servicio/'.$id, $attributes);
		?>	
			Nombre:<span><?php echo set_value('disp_horaria');?></span>
			<input type="text" name="nom" value="<?php echo set_value('nom'); if(isset($nom)) {echo $nom;} ?>"  />
			<?php echo form_error('nom'); ?><br />
			Descripcion:
			<input type="text" name="descripcio" value="<?php echo set_value('descripcio'); if(isset($descripcio)) {echo $descripcio;}?>"  />
			<?php echo form_error('descripcio'); ?><br />
			Precio:
			<input type="number" name="preu" value="<?php echo set_value('preu'); if(isset($preu)) {echo $preu;} ?>"  />
			<?php echo form_error('preu'); ?><br />
			Data_fi:
			<input type="text" name="data_fi" id="datepicker1" value="<?php echo set_value('data_fi'); if(isset($data_fi)) {echo $data_fi;} ?>" />
			<?php echo form_error('data_fi'); ?><br />
			Disponibilidad Horaria:
			<div id="slider-hores">
			<input type="text" id="disp_horaria" name="disp_horaria" value="" value="<?php echo set_value('disp_horaria'); ?>"  /></div>
			<?php echo form_error('disp_horaria'); ?><br />
			Disponibilidad Dias semana:
			<input type="checkbox" name="days[]" value="L"  <?php if(isset($disponibilitat_dies)) {if (in_array('L',$disponibilitat_dies)) {print "checked";}} ?>/>Dilluns&nbsp;<br />
			<input type="checkbox" name="days[]" value="M"  <?php  if(isset($disponibilitat_dies)) {if (in_array('M',$disponibilitat_dies)) {print "checked";}} ?>/>Dimarts&nbsp;<br />
			<input type="checkbox" name="days[]" value="X"  <?php  if(isset($disponibilitat_dies)) {if (in_array('X',$disponibilitat_dies)) {print "checked";}} ?>/>Dimecres&nbsp;<br />
			<input type="checkbox" name="days[]" value="J"  <?php  if(isset($disponibilitat_dies)) {if (in_array('J',$disponibilitat_dies)) {print "checked";}} ?>/>Dijous&nbsp;<br />
			<input type="checkbox" name="days[]" value="V"  <?php  if(isset($disponibilitat_dies)) {if (in_array('V',$disponibilitat_dies)) {print "checked";}} ?>/>Divendres&nbsp;<br />
			<input type="checkbox" name="days[]" value="S"  <?php  if(isset($disponibilitat_dies)) {if (in_array('S',$disponibilitat_dies)) {print "checked";}} ?>/>Dissabte&nbsp;<br />
			<input type="checkbox" name="days[]" value="D"  <?php  if(isset($disponibilitat_dies)) {if (in_array('D',$disponibilitat_dies)) {print "checked";}} ?>/>Diumenge<br />
			<?php echo form_error('days'); ?><br />
			Categoria:
			<?php echo form_dropdown('categoria', $categorias, ''); ?><br />
			<?php echo form_error('categoria'); ?><br />
			CP:
			<input type="text" name="cp" value="<?php echo set_value('cp'); if(isset($cp)) {echo $cp;} ?>" />
			<?php echo form_error('cp'); ?><br />
			<input type="hidden" name="data_inici" value="<?php echo set_value('data_inici'); if(isset($data_inici)) {echo $data_inici;} ?>" />
			<input type="submit" name="submit" value="Editar Servicio" />

		</div>
		<div id="page-wrapper">
		</div>
	</body>
</html>