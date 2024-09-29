document.addEventListener("DOMContentLoaded", () => {
	var contenedor_bloqueo = document.getElementById("contenedor-bloquea");
	contenedor_bloqueo.classList.remove("cargando");
	contenedor_bloqueo.classList.add("cargando_oculto");
	var contenedor_alertas = document.getElementById("contenedor-alertas");
	contenedor_alertas.innerHTML = generar_alerta_bootstrap_sin_titulo("warning", "El archivo debe ser de tipo de algun formato excel (.xls, .xlsx, .csv).");
	var tabla_datos_procesados;
});

function validar_procesar_excel(){
	if(valida_archivo()){
		Swal.fire({
			title: '¿Estás seguro?',
			text: "Se procesaran los datos del archivo seleccionado.",
			icon: 'warning',
			showCancelButton: true,
			confirmButtonText: 'Aceptar',
			cancelButtonText: 'Cancelar',
			reverseButtons: true
		}).then((result) => {
			if (result.isConfirmed) {
				procesar_excel();
			}
		});
	}
}

function valida_archivo(){
	var archivo = document.getElementById("sel_archivo").value;
	var extension = archivo.split('.').pop();
	if(archivo == "" || archivo == null || archivo == undefined){
		Swal.fire({
			title: 'Error',
			text: 'Es necesario seleccionar un archivo',
			icon: 'error',
			confirmButtonText: 'Aceptar'
		});
		return false;
	}
	if(extension != "csv" && extension != "xls" && extension != "xlsx"){
		Swal.fire({
			title: 'Error',
			text: 'El archivo debe ser de tipo CSV',
			icon: 'error',
			confirmButtonText: 'Aceptar'
		});
		return false;
	}
	return true;
}

function procesar_excel(){
	var contenedor_bloqueo = document.getElementById("contenedor-bloquea");
	let archivo = document.getElementById("sel_archivo").files[0];
	let contenedor_status = document.getElementById("contenedor-status");
	let url = "./api/funciones_procesamiento.php";
	let datos = new FormData();
	datos.append("funcion", "procesar_excel");
	datos.append("archivo", archivo);
	contenedor_status.innerHTML = getAnimacionCarga("Procesando archivo CSV...","secondary");
	contenedor_bloqueo.classList.remove("cargando_oculto");
	contenedor_bloqueo.classList.add("cargando");
	fetch(url, {
		method: 'POST',
		body: datos
	})
	.then( res => res.json())
	.then((respuesta) => {
		switch(respuesta.estado){
			case 1:
				contenedor_bloqueo.classList.remove("cargando");
				contenedor_bloqueo.classList.add("cargando_oculto");
				contenedor_status.innerHTML = "";
				inicializar_tabla(columnas = respuesta.columnas, data = respuesta.data);
			break;
			case 2:
				contenedor_bloqueo.classList.remove("cargando");
				contenedor_bloqueo.classList.add("cargando_oculto");
				contenedor_status.innerHTML = "";
				Swal.fire({
					title: 'Error',
					text: response.mensaje,
					icon: 'error',
					confirmButtonText: 'Aceptar'
				});
				obtener_toast(tipo = "error", titulo = "ERROR", mensaje = respuesta.mensaje);
			break;
			default:
				Swal.fire({
					title: 'Error',
					text: response.mensaje,
					icon: 'error',
					confirmButtonText: 'Aceptar'
				});
				contenedor_bloqueo.classList.remove("cargando");
				contenedor_bloqueo.classList.add("cargando_oculto");
				contenedor_status.innerHTML = "";
				obtener_toast(tipo = "error", titulo = "ERROR INTERNO", mensaje = respuesta.mensaje);
			break;
		}
	})
	.catch((error) => {
		Swal.fire({
			title: 'Error',
			text: "Ha ocurrido un error inesperado, puede que algunos datos no se hayan procesado correctamente.",
			icon: 'error',
			confirmButtonText: 'Aceptar'
		});
		contenedor_bloqueo.classList.remove("cargando");
		contenedor_bloqueo.classList.add("cargando_oculto");
		contenedor_status.innerHTML = "";
		obtener_toast(tipo = "error", titulo = "ERROR INTERNO", mensaje = error);
	});
}

function inicializar_tabla(columnas,datos){
	let contenedor_tabla_datos = document.getElementById("contenedor-tabla-datos");
	contenedor_tabla_datos.innerHTML = "";
	tabla = `
		<table class="table table-bordered table-striped table-hover text-center border-secondary display" id="tabla-datos" style="width:100%; vertical-align:middle;">
			<thead>
				<tr>
	`;
	for(let i = 0; i < columnas.length; i++){
		tabla += `
			<th>${columnas[i]}</th>
		`;
	}
	tabla += `
				</tr>
			</thead>
		</table>
	`;
	contenedor_tabla_datos.innerHTML = tabla;
	let datatable = document.getElementById("tabla-datos");
	tabla_datos_procesados = new DataTable(datatable, {
		processing: true,
		language: {
			decimal: "",
			emptyTable: "Sin información por mostrar",
			info: "Mostrando _START_ a _END_ de _TOTAL_ registros",
			infoEmpty: "Mostrando 0 a 0 de 0 registros",
			infoFiltered: "(Filtrando de _MAX_ total de registros)",
			infoPostFix: "",
			thousands: ",",
			lengthMenu: "Mostrando _MENU_ registros",
			loadingRecords: "Cargando registros...",
			processing: "",
			search: "Buscar:",
			zeroRecords: "No se han encontrado los suficientes registros",
			paginate: {
				first: "Primero",
				last: "Último",
				next: "Siguiente",
				previous: "Anterior"
			},
			aria: {
				orderable: "Ordenar por esta columna",
				orderableReverse: "Orden inverso en esta columna",
			}
		},
		data: datos,
		bDestroy: true,
		order: [[1, 'asc']],
		layout:{
			topStart: {
                info: 'info',
                buttons: [
					{
						extend: 'collection',
						text: 'Exportar',
						buttons: [
							{
								extend: 'copyHtml5',
								text: 'Copiar tabla',
								exportOptions: {
									columns: ':visible'
								}
							},
							{
								extend: 'excelHtml5',
								text: 'Exportar Excel',
								exportOptions: {
									columns: ':visible'
								}
							},
							{
								extend: 'csvHtml5',
								text: 'Exportar CSV',
								exportOptions: {
									columns: ':visible'
								}
							},
							{
								extend: 'pdfHtml5',
								text: 'Exportar PDF',
								exportOptions: {
									columns: ':visible'
								}
							},
						]
					},
					{
						extend: 'colvis',
						text: 'Ocultar columnas',
					},
                ]
            },
			topEnd: 'search',
			top2Start: 'pageLength',
			bottomStart: null,
			bottomEnd: null,
			bottom: 'paging',
		},
		searchDelay: 350,
		colReorder: true,
		responsive: true,
	});

	tabla_datos_procesados
		.on('order.dt search.dt', function () {
			let i = 1;
			tabla_datos_procesados
				.cells(null, 0, { search: 'applied', order: 'applied' })
				.every(function (cell) {
					this.data(i++);
				});
		})
		.draw();
}