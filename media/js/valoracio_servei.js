$("#consumirBtn").click(function () {
	if ($("#valoracio").val() != 0) {
		$("#formularisolicitud").submit();
	} else {
		alert("Has de valorar el servei.");
	}
});