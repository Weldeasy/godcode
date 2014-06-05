$( document ).ready(function() {
	$("#consumirBtn").click(function () {
		if ($("#comentari").val() != "") {
			if (confirm("Valorar el servei amb la seg\u00FCent puntuaci\u00f3: " + $("#valoracio").val()))
				$("#formularisolicitud").submit();
		} else {
			alert("Falta completar el camp comentari.");
		}
	});
	
	$("#valoracio").mousemove(function () {
		valoracioTxt();
	});
	$("#valoracio").change(function () {
		valoracioTxt();
	});
	function valoracioTxt() {
		$("#valoracioTxt").val($("#valoracio").val());
	}
});