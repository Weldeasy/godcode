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
</div>
<script type="text/javascript">

function xat(){
    $('#formXat').dialog('open').dialog('setTitle','Xat');
}	

</script>
<div id="formXat" class="easyui-dialog" title="Xat" closed="true" style="width:400px;height:200px;padding:10px">
      <form id='formulariXat' method='post' action="<?=base_url()?>index.php/user_settings/xat">
            <textarea size='30' name='missatgeXat'>
            </textarea>
            <input type='hidden' value='<?= $user_id; ?>' name='id_emisor'/>
            <input type='hidden' value='<?= $id_solicitut; ?>' name='id_solicitut'/>
            <input type='hidden' value='<?= $email_solicitant; ?>' name='email_receptor'/>

            <input type='submit' value='Envia' class="buttonform"/>
      </form>
    </div>