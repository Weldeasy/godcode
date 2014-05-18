<!DOCTYPE html>
<?php
	//Noms classes CSS
	$form_name = "formulario_perfil";
	$label_class = "formulario_registro_label";
	$input_text_class = "formulario_registro_input_text";
    $input_textarea_class = "formulario_registro_textarea2";
    $submit = "formulario_registro_submit";
	
	//Valor CI forms
	$nom_opts = array(
		'name' => 'nombre',
		'value' => $nom,
		'class' => $input_text_class,
		'placeholder' => 'Indica el teu nom..'
	);
	$cognoms_opts = array(
		'name' => 'apellidos',
		'value' => $cognom,
		'class' => $input_text_class,
		'placeholder' => 'Indica els teus cognoms..'
	);
	$desc_opts = array(
		'name' => 'descrivete',
		'value' => $presentacio,
		'class' => $input_textarea_class,
		'placeholder' => 'Descriu-te..'
	);
	$provincia_opts = 'id = "provincies" onchange = "loadPoblacions()"';
	
	//Sexe seleccionat
	if (isset($_POST["sexo"]))
		$sex_selected = $_POST["sexo"];
?>
<html>
	<head>
		<title>Time Banking | La meva conte</title>
		<link href="<?= base_url()?>media/css/usersettings.css" rel="stylesheet" type="text/css">
		<script src="<?= base_url()?>media/js/jquery.js"></script>
		<script src="<?= base_url()?>media/js/usersettings.js"></script>
		
		<script src="<?= base_url(); ?>media/js/formularioregistro.js"></script>
		<link href="<?= base_url()?>media/css/formularioregistro.css" rel="stylesheet">
		<script src="<?= base_url(); ?>media/js/jquery.js"></script>
		<link href="<?= base_url()?>media/css/style.css" rel="stylesheet">
		<script>
			//array poblacions a javascript
			var poblacions = <?php echo json_encode($poblacions); ?>;
			var provincia = <?php echo json_encode($provincia); ?>;
			var poblacio = <?php echo json_encode($poblacio); ?>;
			function loadPP() {
				$("#provincies").val(provincia);
				loadPoblacions();
				$("#poblacio").val(poblacio);
			}
		</script>
	</head>
	<body onLoad="loadPP()">
		
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
			<div class="sidebar-option">
				<a>SERVEIS</a>
			</div>
			<div class="sidebar-option">
				<a>SOLICITUDS</a>
			</div>
		</div>

		<div id="page-wrapper">
		
			<?= form_open(base_url().'index.php/user_settings/validar_perfil', array('name'=>$form_name, 'id'=>$form_name, 'class'=>$form_name)); ?>
			
			<table class="center">
		
				<tr><td colspan="3">
				<?= form_label("Nom:", "", array('for'=>'apellidos', 'class'=>$label_class)); ?>
				</td></tr>
				<tr><td>
				<?= form_input($nom_opts); ?>
				</td><td>
				<?= form_error("nombre"); ?>
				</td></tr>
				
				<tr><td colspan="3">&nbsp;</td></tr>
				
				<tr><td colspan="3">
				<?= form_label("Cognoms:", "", array('for'=>'nombre', 'class'=>$label_class)); ?>
				</td></tr>
				<tr><td>
				<?= form_input($cognoms_opts); ?>
				</td><td>
				<?= form_error("apellidos"); ?>
				</td></tr>
				
				<tr><td colspan="3">&nbsp;</td></tr>
			
				<tr><td>
				<?= form_label("Sexe:", "", array('for'=>'sexo', 'class'=>$label_class)); ?>
				</td><td>
				<label id="sexo1" <?php if ( ( (isset($sex_selected)) && ($sex_selected == "0") ) || ($sexe == 0) ) echo 'class="checkedd"'; ?> for="sexo1"><img src="<?= base_url(); ?>media/images/frontend/sr.png" title="Home" name="sexo1" onClick="changeClass(this)" /></label>
				&nbsp;
				<label id="sexo2" <?php if ( ( (isset($sex_selected)) && ($sex_selected == "1") ) || ($sexe == 1) ) echo 'class="checkedd"'; ?> for="sexo2"><img src="<?= base_url(); ?>media/images/frontend/sra.png" title="Dona" name="sexo2" onClick="changeClass(this)" /></label>
				<?php
					if ( ( (isset($sex_selected)) && ($sex_selected == "0") ) || ($sexe == 0) ) {
						print form_radio("sexo", "0", TRUE, "id = 'sexo1_r'");
						print form_radio("sexo", "1", FALSE, "id = 'sexo2_r'");
					} else {
						print form_radio("sexo", "0", FALSE, "id = 'sexo1_r'");
						print form_radio("sexo", "1", TRUE, "id = 'sexo2_r'");
					}
				?>
				</td><td>&nbsp;</td></tr>
				
				<tr><td colspan="3">&nbsp;</td></tr>
				
				<tr><td>
				<?= form_label("Provincia:", "", array('for'=>'provincia', 'class'=>$label_class)); ?>
				</td><td colspan="2">
				<?= form_dropdown('provincia', $provincies, 'large', $provincia_opts); ?>
				</td></tr>
				
				<tr><td colspan="3">&nbsp;</td></tr>
				
				<tr><td>
				<?= form_label("Poblaci&oacute;:", "", array('for'=>'poblacio', 'class'=>$label_class)); ?>
				</td><td colspan="2">
				<select name="poblacio" id="poblacio" onChange="loadCP(this)"></select>
				<input type="hidden" id="cp" name="cp" />
				</td></tr>
				
				<tr><td colspan="3">&nbsp;</td></tr>
			
				<tr><td colspan="3">
				<?= form_label("La teva descripci&oacute;:", "", array('for'=>'descrivete', 'class'=>$label_class)); ?>
				</td></tr>
				<tr><td colspan="3">
				<?= form_textarea($desc_opts); ?>
				</td></tr>
				
				<tr><td colspan="3">&nbsp;</td></tr>
			
				<tr><td colspan="3">
					<?= form_submit('submit', 'Canviar', 'class = '.$submit); ?>
				</td></tr>
			
			</table>
			
			<?= form_close(); ?>
			
		</div>

	</body>
</html>