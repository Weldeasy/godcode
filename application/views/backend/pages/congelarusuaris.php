<div class="tablaDatagrid">
	<h1> <b>Gestió usuaris</b></h1>
	    <ol class="breadcrumb">
	      	<li class="active">
	      		<i class="fa fa-bar-chart-o"></i> Coneglar usuaris
	      	</li>
	    </ol>  
		<center>
			<table rownumbers="true" data-options="toolbar:'#tbUsuari'" id="congelarDatagrid" style="auto">
			</table>
			<!--TOOLBAR DEL DATAGRID JEASYUI-->
			<div id="tbUsuari" style="padding:5px;height:auto">
                <div style="margin-bottom:5px">
                    <div onclick="congelarUsuari()" class="easyui-linkbutton" iconCls="icon-edit" plain="true"></div>
                </div>
            </div>
		</center>


		<!--FORMULARI PER USUARI-->
		<div id="finestraUsuari" class="easyui-dialog" style="width:300px;height:250px;padding:10px 20px" 
	closed="true" buttons="#finestraUsuari-buttons">
	    	<div class="ftitle">Estat usuari</div>
	        <form id="formulariUsuari" method="post" novalidate>
	            <div class="fitem">
	                <label>Esta congelat:</label>
	                <select id="esta_congelat_user"  name="esta_congelat_user">
					    <option value="1">Sí</option>
					    <option value="0">No</option>
					</select>
	            </div>
	        </form>
	    </div>
	</div>
		<!-- Botons per a Confirmar o Cancelar Nou Usuari o Edita Usuari -->
    <div id="finestraUsuari-buttons">
        <a href="#" class="easyui-linkbutton" iconCls="icon-ok" onclick="guardar_estat_Usuari()">Guardar</a>
        <a href="#" class="easyui-linkbutton" iconCls="icon-cancel" onclick="javascript:$('#finestraUsuari').dialog('close')">Cancel·lar</a>
    </div>


    <div class="info_estat">
			<b>* Congelat: </b>
			<div class="estat_adm" style="background-color:red;"></div>
			<b>* Pendent per verificar correu: </b>
			<div class="estat_adm" style="background-color:yellow;"></div>
			<b>* No està congelat: </b>
			<div class="estat_adm" style="background-color:green;"></div>
		</div>
</div>
