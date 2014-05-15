$(document).ready(function(){
	//get utl actual
	var href=window.location.href;
	var split=href.split("/");//to array
	split.pop();//eliminem ultim element perquè no necessitem
	var urlGlobal=split.join("/");//to string

	$('#llistaDenuncies').datagrid({
		    url:urlGlobal+'/jsonllistarDenuncies', //agafa dades des de servidor
		    title:"Denuncies", //titol del taula
			fitColumns:true, //encaixar amb l'amplada DataGrid
			singleSelect:true, //permetre la selecció d'una sola fila.
			pagination:true, // mostrar una barra d'eines a la part inferior de paginació DataGrid
			loadMsg:'', //message per carregar-se
			height:'auto',
			width:'1250',
		    columns:[[ 
		        {field:'nom',title:'Nom',sortable:true,width:60,align:'left'},
		        {field:'cognom',title:'Cognom',sortable:true,width:60,align:'left'}
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
		width:'1250',
	    columns:[[ 
	        {field:'nom',title:'Nom',sortable:true,width:60,align:'left'},
	        {field:'cognom',title:'Cognom',sortable:true,width:60,align:'left'},
	    	{field:'esta_congelat',title:'Es_congelat',sortable:true,width:60,align:'left'}
	    ]],
	    view: detailview,
			detailFormatter:function(index,row){
				var pintaDetaill='<table class="f"><tr>';
				pintaDetaill+="<td> <p> <b class='detail'>Saldo:</b>"+ row.saldo +"</p></td>";
				pintaDetaill+="<td> <p> <b class='detail'>Data Inscripcio:</b>"+ row.data_inscripcio +"</p></td>";

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
			width:'1250',
		    columns:[[ 
		        {field:'nom',title:'Nom',sortable:true,width:60,align:'left'},
		        {field:'cognom',title:'Cognom',sortable:true,width:60,align:'left'}
		    ]]
	});
})
