<div class="solicitud">
	<form id='formularisolicitud' method="post" action="<?=base_url()?>index.php/user_settings/estatSolicitut">
		<table>
			<tr>
				<td><b>Nom del solicitant:</b> <?= utf8_decode($nom_solicitant) ?><br />
				<b>Email del solicitant:</b> <?= $email_solicitant ?><br />
				<b>Nom del Servei:</b><?= utf8_decode($nom_servei) ?><br />
				<input type="hidden" value="<?= $id_solicitut ?>" name='id_solicitut'/>
                <input type='submit' value='Acceptar' name='accepta' class="buttonform" />
                <input type='submit' value='Rebujar' name='rebuja' class="buttonform" />
				</td>
			</tr>
		</table>
	</form>
	<input type='button' value='Xat' onclick="xat()" name='xat' class="buttonform"/>
	<span id="denuncia_span"><input type="button" onClick="denuncia()" value="Denunciar" name="denunciar" class="buttonform" /></span>
</div>
<script type="text/javascript">

function xat(){
    $('#formXat').dialog('open').dialog('setTitle','Xat');
	$('#denuncia').position({
	   my: "center",
	   at: "center",
	   of: window
	});
	
	$('#denuncia').dialog('close');
}	

function denuncia(){
    $('#denuncia').dialog('open').dialog('setTitle','Denuncia');
	$('#denuncia').position({
	   my: "center",
	   at: "center",
	   of: window
	});
	
	$('#formXat').dialog('close');
}

function guardarDenuncia() {
	var usuari_denunciat = $("#email_receptor").val();
	var usuari_denunciant = $("#id_emisor_d").val();
	var estat_reclamacio = 0;
	var motiu = $("#denunciaText").val();
	
	if (motiu.length < 1)
		alert("Els dos camps (nom i opinio) son obligatoris!");
	else
		peticioOpinio(nom, opinio)
}

</script>
<div id="formXat" class="easyui-dialog" title="Xat" closed="true" style="width:800px;min-height:200px;padding:10px">
  <form id='formulariXat' method='post' action="<?=base_url()?>index.php/user_settings/xat">
		<textarea size='800' name='missatgeXat'></textarea>
		<input type='hidden' value='<?= $user_id; ?>' name='id_emisor'/>
		<input type='hidden' value='<?= $id_solicitut; ?>' name='id_solicitut'/>
		<input type='hidden' value='<?= $email_solicitant; ?>' name='email_receptor'/>

		<input type='submit' value='Envia' class="buttonform"/>
  </form>
</div>
<div id="denuncia" class="easyui-dialog" title="Denuncia" closed="true" style="width:800px;min-height:200px;padding:10px">
		<textarea size='800' name='denunciaText'></textarea>
		<input type='hidden' value='<?= $user_id; ?>' name='id_emisor_d'/>
		<input type='hidden' value='<?= $id_solicitut; ?>' name='id_solicitut_d'/>
		<input type='hidden' value='<?= $email_solicitant; ?>' name='email_receptor_d'/>
		<input type='button' value='Fer denuncia' class="buttonform" onClick="guardarDenuncia()"/>
</div>