<div class="solicitud">
		<span>
			La sol·licitud que has realitzat sobre el servei: <b><?php echo $nom_servicio ?></b>
			encara esta pendent de ser acceptada o rebutjada.
		</span>
		<form method="post" action="<?=base_url()?>index.php/user_settings/xat/">
			<input type="hidden" value="<?= $id_solicitut ?>" name='id_solicitut' id='id_solicitut'/>	
			<input type="submit" value='CHAT' class="buttonform" />
		</form>
</div>
