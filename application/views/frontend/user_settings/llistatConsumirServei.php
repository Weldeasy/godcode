<div class="solicitud">
	<form id='formularisolicitud' method="post" action="<?=base_url()?>index.php/user_settings/consumit">
		<table>
			<tr>
				<td><b>Servei:</b> <?= utf8_decode($servei_nom) ?><br />
				<b>Preu:</b> <?= $preu ?><br />
				<b>Data expiraci&oacute;:</b><?= utf8_decode($data_fi) ?><br />
				<input type="hidden" value="<?= $usuari ?>" name='id_usuari_servei'/>
				<input type="hidden" value="<?= $id_consumidor ?>" name='id_consumidor'/>
				<input type="hidden" value="<?= $id_servei ?>" name='id_servei'/>
				<p>&nbsp;</p>
				<b>Valora el servei</b><br/><select name="valoracio" id="valoracio"><option value="0">Selecciona opcio..</option><option value="1">Molt b&eacute;</option><option value="2">B&eacute;</option><option value="3">Molt Malament</option></select>
                <input type='submit' value='Consumir' name='consumir' class="buttonform" />
				</td>
			</tr>
		</table>
	</form>
</div>