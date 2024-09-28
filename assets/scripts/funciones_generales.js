const toasts = new Toasts({
	offsetX: 0,
	offsetY: 20,
	gap: 20,
	timing: 'ease',
	duration: '.5s',
	dimOld: true,
	position: 'bottom-center'
});

function obtener_toast(tipo, titulo, mensaje) {
	toasts.push({
		title: titulo,
		content: mensaje,
		style: tipo,
		width: 700,
		dismissAfter: '3s',
		closeButton: false,
	});
}

function generar_alerta_bootstrap(tipo, titulo, mensaje) {
	var alerta = `
		<p class="text-${tipo}">
			<strong>${titulo}: </strong> ${mensaje}
		</p>`;
	return alerta;
}

function generar_alerta_bootstrap_sin_titulo(tipo, mensaje) {
	var alerta = 
	`<p class="text-muted my-1">
		${mensaje}
	</p>`;
	return alerta;
}

window.matchMedia('(prefers-color-scheme: dark)').addEventListener('change',({ matches }) =>{
	if(event.matches){
		$(".btn").css("background-color","rgb(49, 49, 49)");
		$(".btn").css("border-color","white");
		$(".btn").css("color","rgb(211, 211, 211)");
	}else{
		$(".btn").css("background-color","rgb(209, 209, 209)");
		$(".btn").css("border-color","white");
		$(".btn").css("color","black");
	}
});

function getAnimacionCarga(mensaje, tipo) {
	let animacion = `
	<div class="d-flex m-3 text-${tipo} align-items-center">
		<strong role="status">${mensaje}</strong>
		<div class="spinner-border ms-auto" aria-hidden="true"></div>
	</div>
	`;
	return animacion;
}

function animacionCarga(contenedor, efecto, tiempo) {
	$(contenedor).addClass("animated " + efecto);
	setTimeout(function () {
		$(contenedor).removeClass("animated " + efecto);
	}, tiempo);
}

function postAndRedirect(url, postData) {
	var postFormStr = "<form method='POST' action='" + url + "'>\n";
	for (var key in postData) {
		if (postData.hasOwnProperty(key)) {
			postFormStr += "<input type='hidden' name='" + key + "' value='" + postData[key] + "'>\n";
		}
	}
	postFormStr += "</form>";
	var formElement = $(postFormStr);
	$(document.body).append(formElement);
	$(formElement).submit();
}

function limpiarCadena(string, espacios = ' ') {
	string = string.trim();
	string = string.replace(
		/á|à|ä|â|ª/g,
		'a'
	);
	string = string.replace(
		/Á|À|Â|Ä/g,
		'A'
	);
	string = string.replace(
		/é|è|ë|ê/g,
		'e'
	);
	string = string.replace(
		/É|È|Ê|Ë/g,
		'E'
	);
	string = string.replace(
		/í|ì|ï|î/g,
		'i'
	);
	string = string.replace(
		/Í|Ì|Ï|Î/g,
		'I'
	);
	string = string.replace(
		/ó|ò|ö|ô/g,
		'o'
	);
	string = string.replace(
		/Ó|Ò|Ö|Ô/g,
		'O'
	);
	string = string.replace(
		/ú|ù|ü|û/g,
		'u'
	);
	string = string.replace(
		/Ú|Ù|Û|Ü/g,
		'U'
	);
	string = string.replace(
		/ç/g,
		'c'
	);
	string = string.replace(
		/Ç/g,
		'C'
	);
	string = string.replace(
		/\\|¨|º|~|\||!|"|·|\(|\)|\?|'|¡|¿|\[|`|\]|}|\{|¨|´|>|<|;|:/g,
		''
	);
	string = string.replace(
		/\t|\n|\r|\v|\f/g,
		''
	);
	if (espacios === ' ') {
		string = string.replace(/ /g, '');
	}
	if(espacios === 'Con'){
		string = string.replace(/\s+/g, ' ');
	}
	return string;
}

function limpiarCadenaParcial(string){
	string = string.trim();
	string = string.replace(
		/\\|¨|\||·|'|`|¨|´|-|>|<|"|\+|&|~/g,
		''
	);
	string = string.replace(
		/\t|\n|\r|\v|\f/g,
		''
	);
	string = string.replace(/\s+/g, ' ');
	return string;
}

function updateTheme() {
	const html = document.querySelector("html");
	const colorMode = window.matchMedia("(prefers-color-scheme: dark)").matches ?
		"dark" :
		"light";
	html.setAttribute("data-bs-theme", colorMode);
}
updateTheme()
window.matchMedia('(prefers-color-scheme: dark)').addEventListener('change', updateTheme)