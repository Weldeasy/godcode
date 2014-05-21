<div class="tablaDatagrid">
	<h1>Banc de Temps</h1>
	    <ol class="breadcrumb">
	      	<li class="active">
	      		<i class="fa fa-bar-chart-o"></i> Saldo minim
	      	</li>
	    </ol>  
		<center>
			<form id='formulari' action="<?php echo base_url(); ?>index.php/saldominim" method="post">
				<div class="easyui-panel" style="width:400px;padding:20px 100px 60px 100px;">
			        <label>Amount:</label>
			        <input class="easyui-numberbox" value="100"></input>
					<input type="submit" value='Guardar' />
  			    </div>
			</form>
		</center>
</div>
