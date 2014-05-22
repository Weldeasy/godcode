<div class="tablaDatagrid">
	<h1>Banc de Temps</h1>
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
		</center>
</div>
