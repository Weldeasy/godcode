<div class="solicitud">
		<span>
			La solicitut que has fet per el servei: <b><?php echo $nom_servicio ?></b><br />
			encara esta en espera de ser acceptada o rebutjada.
		</span>
	<input type='button' value='Xat' onclick="xat()" name='xat' class="buttonform"/>
</div>

<script type="text/javascript" src="<?= base_url()?>media/js/solicitud.js"></script>


<div id="formXat" class="easyui-dialog" title="Xat" closed="true" style="width:800px;min-height:200px;padding:10px">
  <form id='formulariXat' method='post' action="<?=base_url()?>index.php/user_settings/xat">
		
		<textarea size='800' name='missatgeXat'></textarea>
		<input type='hidden' value='<?= $user_id; ?>' name='id_emisor'/>
		<input type='hidden' value='<?= $id_solicitut; ?>' name='id_solicitut'/>
		<input type='hidden' value='<?= $email_solicitant; ?>' name='email_receptor'/>

		<input type='submit' value='Envia' class="buttonform"/>
  </form>
</div>