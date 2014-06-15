<div class="solicitud">
		<span>
			La solicitut que has fet per el servei: <b><?php echo $nom_servicio ?></b><br />
			encara esta en espera de ser acceptada o rebutjada.
		</span>
		<form method="post" action="<?=base_url()?>index.php/user_settings/xat/">
			<input type="hidden" value="<?= $id_solicitut ?>" name='id_solicitut' id='id_solicitut'/>	
			<input type="submit" value='XAT' class="buttonform" />
		</form>
</div>
