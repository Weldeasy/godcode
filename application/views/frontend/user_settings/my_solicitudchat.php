<div class="solicitud">
		<span>
			La solicitut que has realitzat sobre el servei: <b><?php echo $nom_servicio ?></b>
			encara esta pendent de ser acceptada o rebutjada.
		</span>
		<form method="post" action="<?=base_url()?>index.php/user_settings/xat/">
			<input type="hidden" value="<?= $id_solicitut ?>" name='id_solicitut' id='id_solicitut'/>
			<input type="hidden" name="llegir" value="1" />
			<input type="submit" title="Tens missatges sense llegir en el chat" value='CHAT' class="buttonform" />&nbsp;<span class="missatgeNoLlegit"><?= $contador?></span>
		</form>
</div>
