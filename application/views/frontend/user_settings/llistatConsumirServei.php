<div class="solicitud">
	<form id='formularisolicitud' method="post" action="<?=base_url()?>index.php/user_settings/consumit">
		<table>
			<tr>
				<td><b>Nom del Servei:</b> <?= utf8_decode($servei_nom) ?><br />
				<b>Preu:</b> <?= $preu ?><br />
				<b>Data de fi:</b><?= utf8_decode($data_fi) ?><br />
				<input type="hidden" value="<?= $usuari ?>" name='id_usuari_servei'/>
				<input type="hidden" value="<?= $id_consumidor ?>" name='id_consumidor'/>
				<input type="hidden" value="<?= $id_servei ?>" name='id_servei'/>
                <input type='submit' value='Consumir' name='consumir' class="buttonform" />
				</td>
			</tr>
		</table>
	</form>
</div>