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