<!DOCTYPE html>
<?php include("application/includes/config.registro.php"); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="ca" lang="ca">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<meta http-equiv="Content-Language" content="es" />
	<title>Formulari registre nou usuari</title>
	<link href="<?= base_url()?>media/css/style.css" rel="stylesheet">
	<link href="<?= base_url()?>media/css/formularioregistro.css" rel="stylesheet">
	<link href='<?= base_url()?>media/css/login.css' rel='stylesheet' type='text/css'>
	<script src="<?= base_url(); ?>media/js/jquery.js"></script>
	<script src="<?= base_url(); ?>media/js/formularioregistro.js"></script>
	<script>
		//array poblacions a javascript
		var poblacions = <?php echo json_encode($poblacions); ?>;
	</script>
</head>
<body onLoad="loadPoblacions()">
	<div id='cssmenu'>
	<ul>
	<img src="<?= base_url()?>media/images/frontend/logofinal.png" heigth="20px" align="left" style="padding-left:5px;padding-top:5px;"/>
	<li class='active'><a href='<?= base_url()?>'><span>Inici</span></a></li>
    <li class='active'><a href='<?= base_url()?>index.php/inicio/cercarusuari'><span>Usuaris</span></a></li>
	<?php if ($this->session->userdata('logged_in') == FALSE) { ?>
		<li class='active'><a href='<?= base_url()?>index.php/formularioregistro/'><span>Registre</span></a></li>
	<?php } ?>
    <li class='active'><a href='<?= base_url()?>index.php/inicio/contacte/'><span>Contacte</span></a></li>
    <li class='active'><a href='<?= base_url()?>index.php/inicio/introduccio'><span>Què és un banc del temps?</span></a></li>
    
    <?= $this->load->view($login_form)?>
  </ul>
	<a href="#" id="pull"></a> 
 </div>
	<div id="container">
		<?= form_open_multipart(base_url().'index.php/formularioregistro/validar', array('name'=>$form_name, 'id'=>$form_name, 'class'=>$form_name)); ?>
		<center><h1><u>Formulari nou usuari</u></h1></center>
		<table>
		
            <tr><td colspan="3">
    		<?= form_label("Nom:", "", array('for'=>'nombre', 'class'=>$label_class)); ?>
            </td></tr><tr><td>
    		<?= form_input($nom_opts); ?>
            </td><td>
    		<?= form_error("nombre"); ?>
            </td></tr>
			
			<tr><td colspan="3">&nbsp;</td></tr>
            
            <tr><td colspan="3">
            <?= form_label("Cognoms:", "", array('for'=>'apellidos', 'class'=>$label_class)); ?>
            </td></tr><tr><td>
    		<?= form_input($cognoms_opts); ?>
            </td><td>
    		<?= form_error("apellidos"); ?>
            </td></tr>
			
			<tr><td colspan="3">&nbsp;</td></tr>
			
			<tr><td colspan="3">
            <?= form_label("Email:", "", array('for'=>'email', 'class'=>$label_class)); ?>
            </td></tr><tr><td>
    		<?= form_input($email_opts); ?>
            </td><td>
    		<?= form_error("email"); ?>
            </td></tr>
			
			<tr><td colspan="3">&nbsp;</td></tr>
			
			<tr><td colspan="3">
            <?= form_label("Contrasenya:", "", array('for'=>'pass', 'class'=>$label_class)); ?>
            </td></tr><tr><td>
    		<?= form_password($pass_opts); ?>
            </td><td>
    		<?= form_error("pass"); ?>
            </td></tr>
			
			<tr><td colspan="3">&nbsp;</td></tr>
			
			<tr><td colspan="3">
            <?= form_label("Confirmar la contrasenya:", "", array('for'=>'confirm_pass', 'class'=>$label_class)); ?>&nbsp;
            </td></tr><tr><td>
    		<?= form_password($confirm_pass_opts); ?>
            </td><td>
    		<?= form_error("confirm_pass"); ?>
            </td></tr>
			
			<tr><td colspan="3">&nbsp;</td></tr>
			
			<tr><td>
            <?= form_label("Sexe:", "", array('for'=>'sexo', 'class'=>$label_class)); ?>
            </td><td>
            <label id="sexo1" <?php if ($sex_selected == "0") echo 'class="checkedd"'; ?> for="sexo1"><img src="<?= base_url(); ?>media/images/frontend/sr.png" title="Home" name="sexo1" onClick="changeClass(this)" /></label>
			&nbsp;
    		<label id="sexo2" <?php if ($sex_selected == "1") echo 'class="checkedd"'; ?> for="sexo2"><img src="<?= base_url(); ?>media/images/frontend/sra.png" title="Dona" name="sexo2" onClick="changeClass(this)" /></label>
			<?php
				if ($sex_selected == "0") {
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
			
			<tr><td>
    		<?= form_label("Foto:", "", array('for'=>'foto', 'class'=>$label_class)); ?>
            </td><td colspan="2">
			<label id="image" for="foto"><img src="<?= base_url(); ?>media/images/frontend/user_image.png" id="img" title="Imatge perfil" /></label>
    		<input type="file" name="foto" id="foto" accept='image/*' />
            </td></tr>
            
			<tr><td colspan="3">&nbsp;</td></tr>
			
            <tr><td colspan="3">
            <?= form_label("Descriu-te:", "", array('for'=>'descrivete', 'class'=>$label_class)); ?>
            </td></tr>
            <tr><td colspan="3">
    		<?= form_textarea($desc_opts); ?>
            </td></tr>
            
			<tr><td colspan="3">&nbsp;</td></tr>
			
            <tr><td colspan="3">
                <?= form_submit('submit', 'Registre\'m', 'class = '.$submit); ?>
            </td></tr>
            
        </table>
		<?= form_close(); ?>
	</div>
	<div id="footer">
      <div id="separador_degradado">
        
      </div>
      <div class="contenido_footer">
        <p>Projecte DAW M12. Producte desenvolupat per Oscar Marcos, Oriol Antón, Wilson Pinto, Alex Martin.<a href='<?= base_url()?>index.php/inicio/aboutus/'><span>Sobre GODCODE.</span></a></p>
      </div>
    </div>
</body>
</html>