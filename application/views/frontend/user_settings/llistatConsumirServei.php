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
				<b>Si esta consumit, valora el servei:</b><br /><br />
				Puntuaci&oacute;:
				<br/>0&nbsp;<input id="valoracio" name="valoracio" type="range" min="0" max="10" step="1" />&nbsp;10
				<br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				<input type="text" value="5" name="valoracioTxt" id="valoracioTxt" style="text-align:center;" size="1" />
				<br/>Comentari:
				<br /><textarea cols="25" rows="10" name="comentari" id="comentari"></textarea>
                <br /><br /><input type='button' value="Valorar el servei" name='consumir' id="consumirBtn" class="buttonform" />
				</td>
			</tr>
		</table>
	</form>
</div>