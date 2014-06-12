<div class="solicitud">
		<span>
			La solicitut que has fet per el servei: <b><?php echo $nom_servicio ?></b><br />
			encara esta en espera de ser acceptada o rebutjada.
		</span>
		<form>
			<input type="hidden" value="<?= $id_solicitut ?>" name='id_solicitut' id='id_solicitut'/>
		</form>
	<input type="button" value='XAT' onclick="Vistaxat()" class="buttonform" />
</div>
