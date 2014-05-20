<div class="tablaDatagrid">
	<h1>Categories</h1>
	    <ol class="breadcrumb">
	      	<li class="active">
	      		<i class="fa fa-bar-chart-o"></i> Crear Categories
	      	</li>
	    </ol>  

		<center>
			<!--DATAGRID-->
			<table class="easyui-datagrid" data-options="toolbar:'#tbCategoria'" rownumbers="true" id="categoriaDatagrid" style="auto">
			</table>
			<!--TOOLBAR DEL DATAGRID JEASYUI-->
			<div id="tbCategoria" style="padding:5px;height:auto">
                <div style="margin-bottom:5px">
                    <div onclick="afegirCategoria()" class="easyui-linkbutton" iconCls="icon-add" plain="true"></div>
                    <div onclick="modificarCategoria()" class="easyui-linkbutton" iconCls="icon-edit" plain="true"></div>
                   <div onclick="eliminarCategoria()" class="easyui-linkbutton" iconCls="icon-remove" plain="true"></div>
                </div>
            </div>
		</center>

		<!--FORMULARI PER CATEGORIA-->
		<div id="finestraCategoria" class="easyui-dialog" style="width:300px;height:250px;padding:10px 20px" 
	closed="true" buttons="#finestraCategoria-buttons">
	    	<div class="ftitle">Categoria</div>
	        <form id="formulariCategoria" method="post" novalidate>
	            <div class="fitem">
	                <label>Nom:</label>
	                <input name="nom_cat" id="nom_cat" class="easyui-validatebox" required="true">
	            </div>
	            <div class="fitem">
	                <label>Descripció:</label>
	                <input name="descripcio_cat" id="descripcio_cat" class="easyui-validatebox" required="true">
	            </div>
	        </form>
	    </div>
	</div>
		<!-- Botons per a Confirmar o Cancelar Nou Usuari o Edita Usuari -->
    <div id="finestraCategoria-buttons">
        <a href="#" class="easyui-linkbutton" iconCls="icon-ok" onclick="guardarCategoria()">Guardar</a>
        <a href="#" class="easyui-linkbutton" iconCls="icon-cancel" onclick="javascript:$('#finestraCategoria').dialog('close')">Cancel·lar</a>
    </div>
</div>
