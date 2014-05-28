<div class="tablaDatagrid">
	<h1> <b>Banc de Temps</b></h1>
	    <ol class="breadcrumb">
	      	<li class="active">
	      		<i class="fa fa-bar-chart-o"></i> Saldo
	      	</li>
	    </ol>  
		<center>
			<form id='formulari' action="<?php echo base_url();?>index.php/admin/setSaldoMinim_control" method="post">
				<div class="easyui-panel" style="width:400px;padding:20px 100px 60px 100px;">
			        <label>Saldo mínim:</label><?php echo  "<b> ".$saldo_minim_BD."</b>" ?>
			        <input class="easyui-numberbox" name="saldo_minim" type="number" />
			        <br />
					<input type="submit" value='Guardar' />
  			    </div>
			</form>
			<form id='formulari2' action="<?php echo base_url();?>index.php/admin/setMax_dies_congelat" method="post">
				<div class="easyui-panel" style="width:400px;padding:20px 100px 60px 100px;">
			        <label>Maxim de dies que un servei pot estar congelat avans d'esborrar-se: <?php echo  "<b> ".$max_dies_congelat."</b>" ?></label>
			        <input class="easyui-numberbox" name="max_dies_congelat" type="number" min="0" max="99" placeholder="0-99"/>
			        <br />
					<input type="submit" value='Guardar' />
  			    </div>
			</form>
			<form id='formulari3' action="<?php echo base_url();?>index.php/admin/setMax_dies_noConsumit" method="post">
				<div class="easyui-panel" style="width:400px;padding:20px 100px 60px 100px;">
			        <label>Maxim de dies que un servei pot estar sense consumir-se: <?php echo  "<b> ".$max_dies_noConsumit."</b>" ?></label>
			        <input class="easyui-numberbox" name="max_dies_noConsumit" type="number" min="0" max="365" placeholder="0-365"/>
			        <br />
					<input type="submit" value='Guardar' />
  			    </div>
			</form>
		</center>
</div>
