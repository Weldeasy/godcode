//get url actual
var href=window.location.href;
var split=href.split("/");//to array
split.pop();//eliminem ultim element perquè no necessitem
var urlGlobal=split.join("/");//to string


$(document).ready(function(){
	$('#llistaDenuncies').datagrid({
		    url:urlGlobal+'/jsonllistarDenuncies', //agafa dades des de servidor
		    title:"Denuncies", //titol del taula
			fitColumns:true, //encaixar amb l'amplada DataGrid
			singleSelect:true, //permetre la selecció d'una sola fila.
			pagination:true, // mostrar una barra d'eines a la part inferior de paginació DataGrid
			loadMsg:'', //message per carregar-se
			height:'auto',
			width:'1000',
		    columns:[[ 
		        {field:'motiu',title:'Motiu',sortable:true,width:60,align:'left'},
		        {field:'data_reclamacio',title:'Data reclamació',sortable:true,width:60,align:'left'},
		        {field:'nom',title:'Denunciant',sortable:true,width:60,align:'left'},
		        {field:'estat_reclamacio',title:'Estat',sortable:true,width:60,align:'left',
						formatter:function(value,row,index){
								if(value==2){
		                  			return '<div style="background-color:red;" class="estat_adm"></div>';
								}else if(value==0){	
		                  			return '<div style="background-color:yellow;" class="estat_adm"></div>';
								}else if(value==1){	
		                  			return '<div style="background-color:green;" class="estat_adm"></div>';
								}
		              	},
	    		},
		    ]]
	});

	$('#congelarDatagrid').datagrid({
	    url:urlGlobal+'/jsonconeglarUsuaris', //agafa dades des de servidor
	    title:"Usuaris", //titol del taula
		fitColumns:true, //encaixar amb l'amplada DataGrid
		singleSelect:true, //permetre la selecció d'una sola fila.
		pagination:true, // mostrar una barra d'eines a la part inferior de paginació DataGrid
		loadMsg:'', //message per carregar-se
		height:'auto',
		width:'1000',
	    columns:[[ 
	        {field:'nom',title:'Nom',sortable:true,width:50,align:'left'},
	        {field:'cognom',title:'Cognom',sortable:true,width:50,align:'left'},
	    	{field:'esta_congelat',title:'Estat',sortable:true,width:50,align:'left',
				formatter:function(value,row,index){
						if(value==1){
                  			return '<div style="background-color:red;" class="estat_adm"></div>';
						}else if(value==2){	
                  			return '<div style="background-color:yellow;" class="estat_adm"></div>';
						}else if(value==0){	
                  			return '<div style="background-color:green;" class="estat_adm"></div>';
						}
              	},
	    	},
	    ]],
	    view: detailview,
			detailFormatter:function(index,row){
				if(row.sexe==1){
					row.sexe="Home";
				}else{
					row.sexe="Dona";
				}
				var pintaDetaill='<table class="f"><tr>';
				pintaDetaill+="<td> <p> <b class='detail'>Saldo:</b> "+ row.saldo +"</p></td>";
				pintaDetaill+="<td> <p> <b class='detail'>Data Inscripcio:</b> "+ row.data_inscripcio +"</p></td>";
				pintaDetaill+="<td> <p> <b class='detail'>Sexe:</b> "+ row.sexe +"</p></td>";
				pintaDetaill+="<td> <p> <b class='detail'>Poblacio:</b> "+ row.poblacio +"</p></td>";
				pintaDetaill+="<td> <p> <b class='detail'>Codigo postal:</b> "+ row.cp +"</p></td>";
				pintaDetaill+="<td> <p> <b class='detail'>Provincia:</b> "+ row.provincia +"</p></td>";
				pintaDetaill+="<td> <p> <b class='detail'>País:</b> "+ row.pais +"</p></td>";
				pintaDetaill+="</tr></table>"

				return pintaDetaill;
		},
	});
	$('#categoriaDatagrid').datagrid({
		    url:urlGlobal+'/jsonllistarCategoria', //agafa dades des de servidor
		    title:"Categories", //titol del taula
			fitColumns:true, //encaixar amb l'amplada DataGrid
			singleSelect:true, //permetre la selecció d'una sola fila.
			pagination:true, // mostrar una barra d'eines a la part inferior de paginació DataGrid
			loadMsg:'', //message per carregar-se
			height:'auto',
			width:'1000',
		    columns:[[ 
		        {field:'nom',title:'Nom',sortable:true,width:60,align:'left'},
		        {field:'descripcio',title:'Descripcio',sortable:true,width:60,align:'left'}
		    ]]
	});
})
/////////////////////////////////////////////////////
			///CATEGORIA///
/////////////////////////////////////////////////////

/**
 * [eliminarCategoria eliminar un categoria]
 * @return {[type]} [description]
 */
function eliminarCategoria(){
	var row=$('#categoriaDatagrid').datagrid('getSelected');
	if(!row){ //si no està seleccionada, surtira un missatge
			$.messager.show({
				title: 'Esborrar categoria',
				msg: 'Selecciona un categoria a eliminar',
				showType:'slide'//show slide fade progress
			});
	}else{
		if(row){//si està seleccionat, fem el procés de eliminació
			$.messager.confirm('Confirmació','Estàs segur que vols eliminar el categoria?',function(r){
				if(r){ //ok
					$.ajax({
						url: urlGlobal+'/eliminarCategoria_control',
						dataType: "json",
						type:"POST",
						data:{id:row.id}, //id categoria
						success: function (data, textStatus,jqXHR) {
								if(data){
									$.messager.show({	// show error message
										title: 'Esborrar Categoria',
										msg: "El categoria "+row.nom+" ha estat eliminat correctament",
										showType:'slide'//show slide fade progress
									});
									$('#categoriaDatagrid').datagrid('reload');	// reload  el datagrid
								}else{
									$.messager.show({	// show error message
										title: 'Error eliminant categoria',
										msg: 'Hi ha hagut un error eliminant el categoria',
										showType:'slide'//show slide fade progress
									});
								}
						},
					});
				}
			});
		}
	}	
}

/**
 * [afegirCategoria afegir categoria]
 * @return {[type]} [description]
 */
function afegirCategoria(){
	$('#finestraCategoria').form('clear');//Netejem el formulari per a la Nova categoria
	$('#finestraCategoria').dialog('open').dialog('setTitle','Nova Categoria');
	url = urlGlobal+'/crearCategoria_control'; //crea un variable global url,que es envia servidor
}

/**
 * [modificarCategoria update categoria]
 * @return {[type]} [description]
 */
function modificarCategoria(){
	var fila=$('#categoriaDatagrid').datagrid('getSelected');//es boolean : si esta seleccionat o no
	if(!fila){//Si no està seleccionat, retorna un missatge
		$.messager.show({
			title:'Editar Categoria',
			msg:'Selecciona una categoria a editar'
		});
	}else{
		if(fila){ //si esta seleccionat, mostra un formulari
			$('#finestraCategoria').dialog('open').dialog('setTitle','Editar Categoria');
			$.each(fila,function(key,value){
				if(key!='id')
					$($('#'+key+"_cat")).val(value);//recupera les dades i posem al formulari
			});
			url=urlGlobal+'/actualitzarCategoria_control?id='+fila.id;//envia al controlador
		}
	}
}

/**
 * [guardarCategoria insertar categoria]
 * @return {[type]} [description]
 */
function guardarCategoria(){
	$('#formulariCategoria').form('submit',{
			url:url,
			onSubmit:function(){
				return $(this).form('validate');//es valida el formulari
			},
			success:function(result){
				if(result){
					$('#finestraCategoria').dialog('close'); //tanquem la finestra del formulari
					$.messager.show({ //mostra el missatge
							title:'Guardar Categoria',
							msg:"Categoria s'ha creat correctament",
							showType:'show' //mostra slider fade
					});
					$('#categoriaDatagrid').datagrid('reload');//carreguem el datagrid,una vegada actualitzat
				}else{
					$.messager.show({
						title:"Error al inserir al categoria",
						msg:"Hi ha hagut un error al guardar categoria"
					});
				}
			},
	});
}


/////////////////////////////////////////////////////
			///CONGELAR USUARI///
/////////////////////////////////////////////////////

/**
 * [congelarUsuari envia les dades al controlador:actualitzarUsuari_control]
 * @return {[type]} [description]
 */
function congelarUsuari(){
	var fila=$('#congelarDatagrid').datagrid('getSelected');
	if(!fila){
		$.messager.show({
			title:'Estat d\'usuari',
			msg:'Selecciona una usuari a editar'
		});
	}else{
		if(fila){
			$('#finestraUsuari').dialog('open').dialog('setTitle','Editar Usuari');
			$.each(fila,function(key,value){
				if(key!='id')
					$($('#'+key+"_user")).val(value);
			});
			url=urlGlobal+'/actualitzarUsuari_control?id='+fila.id;
		}
	}
}

/**
 * [guardar_estat_Usuari estat del usuari]
 * @return {[type]} [description]
 */
function guardar_estat_Usuari(){
	$('#formulariUsuari').form('submit',{
			url:url,
			onSubmit:function(){
				return $(this).form('validate');
			},
			success:function(result){
				if(result){
					$('#finestraUsuari').dialog('close');
					$.messager.show({
							title:'Estat Usuari',
							msg:"L'Estat d'usuari s'ha actualitzat correctament",
							showType:'show' //mostra slider fade
					});
					$('#congelarDatagrid').datagrid('reload');
				}else{
					$.messager.show({
						title:"Error al actualitzar l'usuari",
						msg:"Hi ha hagut un error al estat l'usuari"
					});
				}
			},
	});
}

/////////////////////////////////////////////////////
			///ESTAT DEL DENUNCIA///
/////////////////////////////////////////////////////

/**
 * [guardarDenuncia insertar denuncia]
 * @return {[type]} [description]
 */
function guardarDenuncia(){
	$('#formulariDenuncia').form('submit',{
			url:url,
			onSubmit:function(){
				return $(this).form('validate');
			},
			success:function(result){
				if(result){
					$('#finestraDenuncia').dialog('close');
					$.messager.show({
							title:'Actualitza Denuncia',
							msg:" La denuncia s'ha actualitzat correctament",
							showType:'show' //mostra slider fade
					});
					$('#llistaDenuncies').datagrid('reload');
				}else{
					$.messager.show({
						title:"Error al actualitzar al denuncia",
						msg:"Hi ha hagut un error al actualitzar una denuncia"
					});
				}
			},
	});	
}

/**
 * [modificarEstatDenuncia upadte denuncia]
 * @return {[type]} [description]
 */
function modificarEstatDenuncia(){
	var fila=$('#llistaDenuncies').datagrid('getSelected');
	if(!fila){
		$.messager.show({
			title:'Editar Denùncies',
			msg:'Selecciona una denuncia a editar'
		});
	}else{
		if(fila){
			$('#finestraDenuncia').dialog('open').dialog('setTitle','Editar Denúncies');

			$.each(fila,function(key,value){
				if(key=='estat_reclamacio')
					$('#estat_denuncia').val(value);

			});
			url=urlGlobal+'/actualitzarEstatDenuncia_control?id_rec='+fila.id_rec;
		}
	}
}

