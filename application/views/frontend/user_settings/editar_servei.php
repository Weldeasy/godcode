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
		'value' => $nom,
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
		
		 <link rel="stylesheet" href="//code.jquery.com/ui/1.10.4/themes/smoothness/jquery-ui.css">
<script src="//code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
 <script>
$(function() {
$( "#slider-range" ).slider({
range: true,
min: 10,
max: 999,
values: [ 75, 300 ],
slide: function( event, ui ) {
$( "#amount" ).val( "$" + ui.values[ 0 ] + " - $" + ui.values[ 1 ] );
}
});
$( "#amount" ).val( "$" + $( "#slider-range" ).slider( "values", 0 ) +
" - $" + $( "#slider-range" ).slider( "values", 1 ) );
});
</script>
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
					
					<tr><td colspan="3">
						<?= form_submit('submit', 'Canviar', 'class = '.$submit); ?>
					</td></tr>
					
					</td></tr>
				</table>
			<?= form_close(); ?>
		</div>
	</body>
</html>