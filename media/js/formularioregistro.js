function changeClass(element) {
	var radios = document.getElementsByName("sexo");
	if (element.name == "sexo1") {
		document.getElementById("sexo1").className = "checkedd";
		document.getElementById("sexo2").className = "";
		radios[0].checked = true;
		radios[1].checked = false;
	} else {
		document.getElementById("sexo2").className = "checkedd";
		document.getElementById("sexo1").className = "";
		radios[0].checked = false;
		radios[1].checked = true;
	}
}

function loadPoblacions() {
	var provincia_id = $("#provincies").val();
	var poblacions_select = document.getElementById("poblacio");
	poblacions_select.length = 0;
	var contador = true;
	for (var i = 0; i < poblacions.length; i++) {
		if (poblacions[i]['idprovincia'] == provincia_id) {
			var opt = document.createElement('option');
			opt.value = poblacions[i]['idpoblacion'];
			opt.innerHTML = poblacions[i]['poblacion'];
			poblacions_select.appendChild(opt);
			if (contador) {
				document.getElementById("cp").value = poblacions[i]['postal'];
				contador = false;
			}
		}
	}
}
function loadCP() {
	var poblacio_id = $("#poblacio").val();
	var index;
	for (var i = 0; i < poblacions.length; i++) {
		if (poblacions[i]['idpoblacion'] == poblacio_id) {
			index = i;
			break;
		}
	}
	$("#cp").val(poblacions[index]['postal']);
}