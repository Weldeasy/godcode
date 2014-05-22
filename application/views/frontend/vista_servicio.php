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
			<?=$descripcio?>
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
</div>