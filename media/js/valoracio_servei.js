$( document ).ready(function() {
	$("#consumirBtn").click(function () {
		alert($("#valoracio").val());
		if ($("#valoracio").val() != 0) {
			$("#formularisolicitud").submit();
		} else {
			alert("Has de valorar el servei.");
		}
	});
});