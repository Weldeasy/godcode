
<div id="contenido_principal">
 <form class="form-container" action="<?= base_url()?>index.php/inicio/validar_contacte" method='post'>
	<div class="form-title"><h2>Contacte</h2></div>
	<div class="form-title">Nombre</div>
		<input class="form-field" type="text" name="nom" /><br /><?= form_error("nom"); ?>
	<div class="form-title">Email</div>
		<input class="form-field" type="text" name="email" /><br /><?= form_error("email"); ?>
	<div class="form-title">Telefono</div>
		<input class="form-field" type="text" name="telefono" /><br /><?= form_error("telefono"); ?>
	<div class="form-title">Missatge</div>
		<textarea name="missatge">Escriu el teu missatgea</textarea><br /><?= form_error("missatge"); ?>

	<div class="submit-container">
		<input class="submit-button" type="submit" value="Submit" />
	</div>
</form>
</div>

