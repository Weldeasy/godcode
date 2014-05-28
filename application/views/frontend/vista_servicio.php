<script type="text/javascript">

  function solicitut(){
        $('#formSolicitut').dialog('open').dialog('setTitle','Solicitut');
  }
</script>
<div class="servicio_vista">
	<div class="foto_servicio">
		<img src="<?=base_url()?>media/images/categorias/<?=$categoria?>.jpg" />
	</div>
	<div class="cuerpo_servicio_vista">
		<div class="titulo_servicio">
			<span class="nom_servei"><?=$nom?></span>
			<span class="data_caducitat">en <a href="https://www.google.es/maps/place/<?=$poblacion?>" target='_blank'><?=$poblacion?></a></span>
		</div>
		<div class="descripcion_servicio_vista">
			<span><?=$descripcio?></span>
		</div>
		<div class="precio_servicio">
			<?=$preu?> punts
		</div>
	</div>
	<div class="dispo_servicio_vista">
			<p>Disponible hasta el <?=$data_fi?> de <?=$horas[0]?>:00 a <?=$horas[1]?>:00</p>
			<table class="disp_dias">
				<tr>
					<td <?php if ( (isset($days)) && (!in_array('L', $days)) ) print 'style="background-color:#FA5858;"'; ?> value="L" >L</td>
					<td <?php if ( (isset($days)) && (!in_array('M', $days)) ) print 'style="background-color:#FA5858;"'; ?> value="L" >M</td>
					<td <?php if ( (isset($days)) && (!in_array('X', $days)) ) print 'style="background-color:#FA5858;"'; ?> value="L" >X</td>
					<td <?php if ( (isset($days)) && (!in_array('J', $days)) ) print 'style="background-color:#FA5858;"'; ?> value="L" >J</td>
					<td <?php if ( (isset($days)) && (!in_array('V', $days)) ) print 'style="background-color:#FA5858;"'; ?> value="L" >V</td>
					<td <?php if ( (isset($days)) && (!in_array('S', $days)) ) print 'style="background-color:#FA5858;"'; ?> value="L" >S</td>
					<td <?php if ( (isset($days)) && (!in_array('D', $days)) ) print 'style="background-color:#FA5858;"'; ?> value="L" >D</td>
				</tr>
			</table>
			<div class="servei_actions">
			<?php 
              /*Surtirà butò si usuari està loguejat i el user no pot sol·licitar si mateix i no sigui admin*/
              if(isset($email) && ($user_oferit_servei!=$email) && ($es_admin==0 && $logued)){
          ?>
          <td>
              <input type='submit' value='Solicitar' onclick="solicitut()" class="buttonform"/>
          </td>

          <?php } ?>
		</div>
	</div>
	<div id="formSolicitut" class="easyui-dialog" title="Missatge" data-options="iconCls:'icon-save'" closed="true" style="width:400px;height:200px;padding:10px">
      <form id='formulariservei' method='post' action="<?=base_url()?>index.php/inicio/verifica_solicitut">
            <textarea size='30' name='missatge'>
            </textarea>
            <input type='hidden' value='<?= $id; ?>' name='id_servei'/>
              <input type='hidden' value='<?= $email; ?>' name='email_user'/>
              <input type='hidden' value='<?= $id_user; ?>' name='id_user'/>
            <input type='submit' value='Solicitar' class="buttonform"/>
      </form>
    </div>
</div>
<hr />

