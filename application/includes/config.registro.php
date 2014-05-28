<?php
    //Noms classes CSS
	$form_name = "formulario_registro";
	$label_class = "formulario_registro_label";
	$input_text_class = "formulario_registro_input_text";
    $input_textarea_class = "formulario_registro_textarea";
    $submit = "formulario_registro_submit";
	
	//Valor CI forms
	$nom_opts = array(
		'name' => 'nombre',
		'value' => @set_value("nombre"),
		'class' => $input_text_class,
		'placeholder' => 'Indica el teu nom..'
	);
	$cognoms_opts = array(
		'name' => 'apellidos',
		'value' => @set_value("apellidos"),
		'class' => $input_text_class,
		'placeholder' => 'Indica els teus cognoms..'
	);
	$email_opts = array(
		'name' => 'email',
		'value' => @set_value("email"),
		'class' => $input_text_class,
		'placeholder' => 'Indica la teva direcci&oacute; d\'email..'
	);
	$desc_opts = array(
		'name' => 'descrivete',
		'value' => @set_value("descrivete"),
		'class' => $input_textarea_class,
		'placeholder' => 'Descriu-te..'
	);
	$pass_opts = array(
		'name' => 'pass',
		'class' => $input_text_class,
		'placeholder' => 'Indica una contrasenya..'
	);
	$confirm_pass_opts = array(
		'name' => 'confirm_pass',
		'class' => $input_text_class,
		'placeholder' => 'Confirmaci&oacute; contrasenya..'
	);
	$provincia_opts = 'id = "provincies" onchange = "loadPoblacions()"';
	
	//Sexe seleccionat
	$sex_selected = "0";
	if (isset($_POST["sexo"]))
		$sex_selected = $_POST["sexo"];
?>