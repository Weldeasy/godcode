<br />
<table  class="tabla_servei">
	<tr>
		<th><div class="nom_servei"><?=$nom?></div></th>
		<th colspan="2" style="text-align: right;">a <a href="https://www.google.es/maps/place/<?=$poblacion?>" target='_blank'><?=$poblacion?></a></th>
	</tr>
	<tr>
		<td>
			<div class="foto_servicio">
				<img src="<?=base_url()?>media/images/categorias/<?=$categoria?>.jpg" />
			</div>
		</td>
		<td><div class="descripcion_servicio_vista"><?=$descripcio?></div></td>
		<td><div class="precio_servicio"><?=$preu?> punts</div></td>
		</tr>
		<tr>
			<td>
				<div class="dispo_servicio_vista">
					<p>Disponible fins el <?=$data_fi?> de <?=$horas[0]?>:00 a <?=$horas[1]?>:00</p>
				</div>
			</td>
			<td>
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
			</td>
			<td>
				<?php 
             	 /*Surtirà butò si usuari està loguejat i el user no pot sol·licitar si mateix i no sigui admin*/
			  	 if($logued) {
    	         	 if(isset($email) && ($user_oferit_servei!=$email) && $es_admin==0){
                ?>

			<div class="servei_actions">
				 <form id='formulariservei' method='post' action="<?=base_url()?>index.php/inicio/verifica_solicitut">
        	      <input type='hidden' value='<?= $id; ?>' name='id_servei'/>
	              <input type='hidden' value='<?= $email; ?>' name='email_user'/>
	              <input type='hidden' value='<?= $id_user; ?>' name='id_user'/>	
	              <input type='hidden' value='Solicito el teu servei,espero la teva resposta aviat possible.' name='missatge'/>	
	              <input type='submit' value='Solicitar' class="buttonform"/>
	           	</form> 
          	</div>
          <?php }}
          	?>
			</td>
		</tr>
</table>