<div class="tablaDatagrid">
	<h1> <b>Denúncies</b></h1>
	    <ol class="breadcrumb">
	      	<li class="active">
	      		<i class="fa fa-bar-chart-o"></i> Llistar Denúncies
	      	</li>
	    </ol>  
		<center>
			<table rownumbers="true" data-options="toolbar:'#tbDenuncia'" id="llistaDenuncies" style="auto">
			</table>
			<div id="tbDenuncia" style="padding:5px;height:auto">
                <div style="margin-bottom:5px">
                    <div onclick="modificarEstatDenuncia()" class="easyui-linkbutton" iconCls="icon-edit" plain="true"></div>
                </div>
            </div>
		</center>

			<!--FORMULARI PER DENUCIA-->
			<div id="finestraDenuncia" class="easyui-dialog" style="width:300px;height:250px;padding:10px 20px" 
		closed="true" buttons="#finestraDenuncia-buttons">
		    	<div class="ftitle">Denuncia</div>
		        <form id="formulariDenuncia" method="post" novalidate>
		            <div class="fitem">
		                <label>Estat:</label>
		                <select id="estat_denuncia"  name="estat_denuncia">
						    <option value="0">Pendent</option>
						    <option value="1">Resolt</option>
						    <option value="2">Rebujat</option>
						</select>
		            </div>
		        </form>
		    </div>
		</div>
			<!-- Botons per a Confirmar o Cancelar Nou Usuari o Edita Usuari -->
	    <div id="finestraDenuncia-buttons">
	        <a href="#" class="easyui-linkbutton" iconCls="icon-ok" onclick="guardarDenuncia()">Guardar</a>
	        <a href="#" class="easyui-linkbutton" iconCls="icon-cancel" onclick="javascript:$('#finestraDenuncia').dialog('close')">Cancel·lar</a>
	    </div>
		<div class="info_estat">
			<b>* Rebujat: </b>
			<div class="estat_adm" style="background-color:red;"></div>
			<b>* Pendent: </b>
			<div class="estat_adm" style="background-color:yellow;"></div>
			<b>* Resolt: </b>
			<div class="estat_adm" style="background-color:green;"></div>
		</div>
</div>
