<?php
	//Noms classes CSS
	$form_name = "formulario_perfil";
	$label_class = "formulario_registro_label";
	$input_text_class = "formulario_registro_input_text";
    $input_textarea_class = "formulario_registro_textarea2";
    $submit = "formulario_registro_submit";
	
	//Valor CI forms
	$nom_opts = array(
		'name' => 'nom',
		'value' => utf8_encode($nom),
		'class' => $input_text_class,
		'placeholder' => 'Indica el nom del servei..'
	);
	$preu_opts = array(
		'name' => 'preu',
		'value' => $preu,
		'class' => $input_text_class,
		'placeholder' => 'Indica el preu del servei..'
	);
	$desc_opts = array(
		'name' => 'descripcio',
		'value' => $descripcio,
		'class' => $input_textarea_class,
		'placeholder' => 'Descripcio del servei..'
	);
	$punts_opts = array(
		'name' => 'punts',
		'min' => 10,
		'max' => 999,
		'class' => 'range'
	);
?>
<html>
	<head>
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
			<?php if(isset($missatge)) print $missatge."<br>"; ?>
			<?= form_open(base_url().'index.php/user_settings/validar_servei', array('name'=>$form_name, 'id'=>$form_name, 'class'=>$form_name)); ?>
				<input type="hidden" name="id" value="<?=$id?>" />
				<table class="center">
					<tr><td colspan="3">
					<?= form_label("Nom del servei:", "", array('for'=>'nom', 'class'=>$label_class)); ?>
					</td></tr>
					<tr><td>
					<?= form_input($nom_opts); ?>
					</td><td>
					<?= form_error("nom"); ?>
					</td></tr>
					
					<tr><td colspan="3">&nbsp;</td></tr>
					
					<tr><td colspan="3">
					<?= form_label("Categoria:", "", array('for'=>'categoria', 'class'=>$label_class)); ?>
					</td></tr>
					<tr><td>
					<?= form_dropdown('categoria', $categories, $categoria); ?>
					</td><td>
					<?= form_error("categoria"); ?>
					</td></tr>
					
					<tr><td colspan="3">&nbsp;</td></tr>
					
					<tr><td colspan="2">
					<?= form_label("Descripci&oacute; del servei:", "", array('for'=>'descripcio', 'class'=>$label_class)); ?>
					</td></tr>
					<tr><td colspan="2">
					<?= form_textarea($desc_opts); ?>
					</td></tr>
					
					<tr><td colspan="2">
					<?= form_label("Punts:", "", array('for'=>'punt', 'class'=>$label_class)); ?>
					</td></tr>
					<tr><td>&nbsp;</td></tr>
					<tr><td colspan="2">
					10&nbsp;<input id="range_value" type="range" value="<?=$preu?>" min="10" max="999" onChange="showValue(this.value);" />&nbsp;999
					<input id="input_value" type="number" name="preu" max="999" value="<?=$preu?>" onChange="showValue2(this.value);" onKeyUp="showValue2(this.value);" />
					<script>
						function showValue(num)
							$("#input_value").val(num);
						function showValue2(num)
							$("#range_value").val(num);
					</script>
					
					<tr><td colspan="3">&nbsp;</td></tr>
					
					<tr><td colspan="2">
					<?= form_label("Disponibilitat horaria:", "", array('for'=>'disponibilitat', 'class'=>$label_class)); ?>
					</td></tr>				
					
					<tr><td>
						<input type="checkbox" name="days[]" value="L" <?php if (in_array('L',$disponibilitat_dies)) print "checked"; ?> >Dilluns&nbsp;
						<input type="checkbox" name="days[]" value="M" <?php if (in_array('M',$disponibilitat_dies)) print "checked"; ?> >Dimarts&nbsp;
						<input type="checkbox" name="days[]" value="X" <?php if (in_array('X',$disponibilitat_dies)) print "checked"; ?> >Dimecres&nbsp;
						<input type="checkbox" name="days[]" value="J" <?php if (in_array('J',$disponibilitat_dies)) print "checked"; ?> >Dijous&nbsp;
						<input type="checkbox" name="days[]" value="V" <?php if (in_array('V',$disponibilitat_dies)) print "checked"; ?> >Divendres&nbsp;
						<input type="checkbox" name="days[]" value="S" <?php if (in_array('S',$disponibilitat_dies)) print "checked"; ?> >Dissabte&nbsp;
						<input type="checkbox" name="days[]" value="D" <?php if (in_array('D',$disponibilitat_dies)) print "checked"; ?> >Diumenge
					</td><td>
						<?= form_error("days"); ?>
					</td></tr>
					
					<tr><td colspan="3">&nbsp;</td></tr>
					
					<tr><td colspan="3">
						<input type="text" name="hores" id="hores" style="border:0;width:300px;" readonly />
					</td></tr>
				</table>
				<table>
					<tr><td>00:00&nbsp;&nbsp;</td><td>
					<div id="slider-hores"></div>
					</td><td>24:00</td></tr>
					
					<tr><td colspan="3">&nbsp;</td></tr>
					
					<tr><td colspan="3">
						<?= form_submit('submit', 'Canviar', 'class = '.$submit); ?>
					</td></tr>
				</table>
			<?= form_close(); ?>
		</div>
	</body>
</html>