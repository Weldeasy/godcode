<div class="servicio">
	<div class="foto_servicio">
		<img src="<?=base_url()?>media/images/categorias/<?=$categoria?>.jpg" />
	</div>
	<div class="cuerpo_servicio">
		<div class="titulo_servicio">
			<span class="nom_servei"><?=$nom?></span>
			<span class="data_caducitat" id='linkMap' >a <a  href="https://www.google.es/maps/place/<?=$poblacion?>"  target='_blank'><?=$poblacion?></a></span>
		</div>
		<div class="descripcion_servicio">
			<p><b>Descripci&oacute;: </b><?=$descripcio?></p>
		</div>
		<div class="precio_servicio">
			<?=$preu?> punts
		</div>
	</div>
	<div class="dispo_servicio">
			Disponible fins el <?=$data_fi?> els 
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
			de <?=$horas[0]?>:00 a <?=$horas[1]?>:00
		</div>
		<div class="servei_actions">
		<a href="<?=base_url()?>index.php/user_settings/editar_servei/<?=$id?>"><input type="button" value="Editar" /></a>
		<a href="<?=base_url()?>index.php/user_settings/eliminarServei/<?=$id?>"><input type="button" value="Eliminar" /></a>
		<?php if($data_congelacio==NULL){?>
			<a href="<?=base_url()?>index.php/user_settings/congelarServei/<?=$id?>"><input type="button" value="Congelar" /></a>
		<?php }else{ ?>
		<a href="<?=base_url()?>index.php/user_settings/descongelarServei/<?=$id?>"><input type="button" value="Descongelar" /></a>
		<?php } ?>
	</div>
</div>
<p>&nbsp;</p>