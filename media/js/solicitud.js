	//get url actual
	var href=window.location.href;
	var split=href.split("/");//to array
	split.pop();//eliminem ultim element perquè no necessitem
	var urlGlobal=split.join("/");//to string

function Vistaxat(){
	var id_solicitut=$("#id_solicitut").val();//id solicitut
	window.open(urlGlobal+"/xat?idSol="+id_solicitut,"_self");
}

function xat(){
    $('#formXat').dialog('open').dialog('setTitle','Xat');
	$('#denuncia').position({
	   my: "center",
	   at: "center",
	   of: window
	});
}

function denuncia(){
    $('#denuncia').dialog('open').dialog('setTitle','Denuncia');
	$('#denuncia').position({
	   my: "center",
	   at: "center",
	   of: window
	});
	
	$('#formXat').dialog('close');
}

function guardarDenuncia() {
	var usuari_denunciat = $("#email_receptor_d").val();
	var usuari_denunciant = $("#id_emisor_d").val();
	var motiu = $("#denunciaText").val();
	
	if (motiu.length < 1) {
		alert("Es obligatori indicar un motiu!");
	} else {
		var request = $.ajax({
			url: urlGlobal + "/enviarDenuncia",
			type: "POST",
			data: {usuari_denunciat : usuari_denunciat, usuari_denunciant : usuari_denunciant, motiu : motiu},
			dataType: "html"
		});
		request.done(function(data) {
			$("#denuncia_span").html( data );
			$('#denuncia').dialog('close');
		} );
	}
		
}