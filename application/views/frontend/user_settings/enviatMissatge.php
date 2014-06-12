<div class="solicitud">
	<h3>XAT</h3>
	<table border="2" style="text-align:center;">
		<tr>
			<td>Emisor</td>
			<td>Receptor</td>
			<td>Data</td>
			<td>Missatge</td>
		</tr>
		<?= $table ?>
	</table>

	<input type='button' value='Xat' onclick="xat()" name='xat' class="buttonform"/>
</div>

<div id="formXat" class="easyui-dialog" title="Xat" closed="true" style="width:800px;min-height:200px;padding:10px">
  <form id='formulariXat' method='post' action="<?=base_url()?>index.php/user_settings/xat">
		
		<textarea size='800' name='missatgeXat'></textarea>
		<input type='hidden' value='<?= $id_emisor; ?>' name='id_emisor'/>
		<input type='hidden' value='<?= $id_solicitut; ?>' name='id_solicitut'/>
		<input type='hidden' value='<?= $id_receptor; ?>' name='id_receptor'/>

		<input type='submit' value='Envia' class="buttonform"/>
  </form>
</div>

