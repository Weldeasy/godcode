<div class="solicitud">
	<form id='formularisolicitud' method="post" action="<?=base_url()?>index.php/user_settings/estatSolicitut">
		<table>
			<tr>
				<td><b>Nom del solicitant:</b> <?= utf8_decode($nom_solicitant) ?><br />
				<b>Email del solicitant:</b> <?= $email_solicitant ?><br />
				<b>Nom del Servei:</b><?= utf8_decode($nom_servei) ?><br />
				<input type="hidden" value="<?= $id_solicitut ?>" name='id_solicitut' id='id_solicitut'/>
                <input type="hidden" value="<?= $user_id ?>" name='id_emisor' id='id_emisor'/>
                <input type="hidden" value="<?= $email_solicitant ?>" name='email_receptor' id='email_receptor'/>
                <input type='submit' value='Acceptar' name='accepta' class="buttonform" />
                <input type='submit' value='Rebujar' name='rebuja' class="buttonform" />
				</td>
			</tr>
		</table>
	</form>
	<!--Formulari XAT-->
	<form id="formXat" method="post" action="<?=base_url()?>index.php/user_settings/xat/">
			<input type="hidden" value="<?= $id_solicitut ?>" name='id_solicitut' id='id_solicitut'/>	
			<input type="submit" value='CHAT' class="buttonform" />
	</form>
	
	<span id="denuncia_span"><input type="button" onClick="denuncia()" value="Denunciar" name="denunciar" class="buttonform" /></span>
	
	<!-- Ultim missatge <p style="margin-top:-15px;margin-left:5px;padding-bottom:5px;"><b>&Uacute;ltim missatge:</b>&nbsp; utf8_decode($ultim_misatge->missatge)</p>-->
	
</div>

<script type="text/javascript" src="<?= base_url()?>media/js/solicitud.js"></script>

<div id="denuncia" class="easyui-dialog" title="Denuncia" closed="true" style="width:800px;min-height:200px;padding:10px">
		<textarea size='800' id='denunciaText'></textarea>
		<input type='hidden' value='<?= $user_id; ?>' id='id_emisor_d'/>
		<input type='hidden' value='<?= $id_solicitut; ?>' id='id_solicitut_d'/>
		<input type='hidden' value='<?= $email_solicitant; ?>' id='email_receptor_d'/>
		<input type='button' value='Fer denuncia' class="buttonform" onclick="guardarDenuncia()"/>
</div>