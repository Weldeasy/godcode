
<div id="contenido_principal">
 <form class="form-container" action="<?= base_url()?>index.php/inicio/validar_contacte" method='post'>
	<div class="form-title"><h2>Contacte</h2></div>
	<div class="form-title">Nom</div>
		<input class="form-field" type="text" placeholder="Escriu el teu nom" value="<?= @set_value("nom")?>" name="nom" /><br /><?= form_error("nom"); ?>
	<div class="form-title">Correu</div>
		<input class="form-field" type="text" name="email" placeholder="Escriu el teu correu" value="<?= @set_value("email")?>"  /><br /><?= form_error("email"); ?>
	<div class="form-title">Telèfon</div>
		<input class="form-field" type="text" name="telefono" placeholder="Escriu el teu telèfon" value="<?= @set_value("telefono")?>"  /><br /><?= form_error("telefono"); ?>
	<div class="form-title">Missatge</div>
		<textarea name="missatge" placeholder="Escriu el teu missatge" value="<?= @set_value("missatge")?>" ></textarea><br /><?= form_error("missatge"); ?>
	<div class="submit-container">
		<input class="submit-button" type="submit" value="Submit" />
	</div>
</form>
</div>

