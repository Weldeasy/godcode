<?php /*
<div class="servicio">
	<div class="foto_servicio">
		<img src="<?=base_url()?>media/images/categorias/<?=$categoria?>.jpg" />
	</div>
	<div class="cuerpo_servicio">
		<div class="titulo_servicio">
			<span class="nom_servei"><?=$nom?></span>
			<span class="data_caducitat">Data caducitat: <?=$data_fi?></span>
		</div>
		<div class="descripcion_servicio">
			<p><?=$descripcio?></p>
			<div class="precio_servicio">
				<?=$preu?> punts
			</div>
		</div>
	</div>
	<div class="servei_actions">
		<a href="<?=base_url()?>index.php/user_settings/editar_servei/<?=$id?>"><input type="button" value="Editar" /></a>
		<input type="button" value="Eliminar" />
		<input type="button" value="Congelar" />
	</div>
</div>*/ 
?>

<div class="servicio">
	<div class="foto_servicio">
		<img src="<?=base_url()?>media/images/categorias/<?=$categoria?>.jpg" />
	</div>
	<div class="cuerpo_servicio">
		<div class="titulo_servicio">
			<?=$nom?>
		</div>
		<div class="descripcion_servicio">
			<p><?=$descripcio?></p>
		</div>
		<div class="precio_servicio">
			<?=$preu?> punts
		</div>
	</div>
	<div class="dispo_servicio">
			Disponible hasta el <?=$data_fi?> los 
			<table class="disp_dias">
				<tr>
					<td>L</td>
					<td>M</td>
					<td>X</td>
					<td>J</td>
					<td>V</td>
					<td>S</td>
					<td>D</td>
				</tr>
				<tr>
					<td><input type="checkbox" name="days[]" <?php if ( (isset($_POST['days'])) && (in_array('L', $_POST['days'])) ) print 'checked'; ?> value="L" /></td>
					<td><input type="checkbox" name="days[]" <?php if ( (isset($_POST['days'])) && (in_array('M', $_POST['days'])) ) print 'checked'; ?> value="M" /></td>
					<td><input type="checkbox" name="days[]" <?php if ( (isset($_POST['days'])) && (in_array('X', $_POST['days'])) ) print 'checked'; ?> value="X" /></td>
					<td><input type="checkbox" name="days[]" <?php if ( (isset($_POST['days'])) && (in_array('J', $_POST['days'])) ) print 'checked'; ?> value="J" /></td>
					<td><input type="checkbox" name="days[]" <?php if ( (isset($_POST['days'])) && (in_array('V', $_POST['days'])) ) print 'checked'; ?> value="V" /></td>
					<td><input type="checkbox" name="days[]" <?php if ( (isset($_POST['days'])) && (in_array('S', $_POST['days'])) ) print 'checked'; ?> value="S" /></td>
					<td><input type="checkbox" name="days[]" <?php if ( (isset($_POST['days'])) && (in_array('D', $_POST['days'])) ) print 'checked'; ?> value="D" /></td>
				</tr>
			</table>
			de <?=$horas[0]?> a <?=$horas[1]?>
		</div>
</div>