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
	$('#formXat').position({
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
	var usuari_denunciat = $("#email_receptor_d").val();
	var usuari_denunciant = $("#id_emisor_d").val();
	var motiu = $("#denunciaText").val();
	
	//get url actual
	var href=window.location.href;
	var split=href.split("/");//to array
	split.pop();//eliminem ultim element perquè no necessitem
	var urlGlobal=split.join("/");//to string
	
	if (motiu.length < 1) {
		alert("Es obligatori indicar un motiu!");
	} else {
		var request = $.ajax({
			url: urlGlobal + "/enviarDenuncia",
			type: "POST",
			data: {usuari_denunciat : usuari_denunciat, usuari_denunciant : usuari_denunciant, motiu : motiu},
			dataType: "html"
		});
		request.done(function(data) {
			$("#denuncia_span").html( data );
			$('#denuncia').dialog('close');
		} );
	}
		
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
		<textarea size='800' id='denunciaText'></textarea>
		<input type='hidden' value='<?= $user_id; ?>' id='id_emisor_d'/>
		<input type='hidden' value='<?= $id_solicitut; ?>' id='id_solicitut_d'/>
		<input type='hidden' value='<?= $email_solicitant; ?>' id='email_receptor_d'/>
		<input type='button' value='Fer denuncia' class="buttonform" onclick="guardarDenuncia()"/>
</div>