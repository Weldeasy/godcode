<div class="solicitud">
	<div class="wrapper">
		<h2>CHAT</h2>
		<div class="tableXAT">
			<div class="row header green">
				<div class="cell">
				Emisor
				</div>
				<div class="cell">
				Receptor
				</div>
				<div class="cell">
				Missatge
				</div>
				<div class="cell">
				Data
				</div>
			</div>
				<?= $table ?>
		</div>
	</div>
	<input type='button' value='Chat' onclick="xat()" name='xat' class="buttonform"/>
</div>

<div id="formXat" class="easyui-dialog" title="Chat" closed="true" style="width:800px;min-height:200px;padding:10px">
  <form id='formulariXat' method='post' action="<?=base_url()?>index.php/user_settings/xat">
		
		<textarea size='800' name='missatgeXat' placeholder="Escriu aqui el teu missatge.."></textarea>
		<input type='hidden' value='<?= $id_emisor; ?>' name='id_emisor'/>
		<input type='hidden' value='<?= $id_solicitut; ?>' name='id_solicitut'/>
		<input type='hidden' value='<?= $id_receptor; ?>' name='id_receptor'/>

		<input type='submit' value='Envia' class="buttonform"/>
  </form>
</div>

