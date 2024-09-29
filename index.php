<?php
	include './config/variables.php';
	include FUNCTIONS.'funciones_generales.php';
	$config = [
		"nombre" => "Lector de Excel",
		"titulo" => "Lector de Excel",
	];
	$estilos =[
		"estilos_generales" => [
			"nombre" => "estilos_generales",
			"url" => CSS."estilos_generales.css",
		],
	];
	$scripts = [
		"funciones_procesar_excel" => [
			"nombre" => "funciones_procesar_excel",
			"url" => JS_FUNCTIONS."funciones_procesar_excel.js",
		],
	];
	$breadcrumbs =[
		"lector_excel" => [
			"nombre" => "LECTOR DE EXCEL",
			"url" => URL."index.php",
			"status" => '',
			"aria" => '',
			"enlace" => 'true',
		],
	];

	include INCLUDES.'header.php';
	include INCLUDES_M.'cuerpo_general.php';
	include INCLUDES_M.'navbar.php';
	include INCLUDES_M.'sidebar.php';
	include INCLUDES_M.'cabecera_breadcrumbs.php';
?>

<div class="app-content">
		<div class="container-fluid">
			<div class="row">
				<div class="col-12">
					<div class="card">
						<div class="card-header">
							<h3 class="card-title">Elige el archivo de excel a procesar</h3>
							<div class="card-tools"> <button type="button" class="btn btn-tool" data-lte-toggle="card-collapse" title="Collapse"> <i data-lte-icon="expand" class="bi bi-plus-lg"></i> <i data-lte-icon="collapse" class="bi bi-dash-lg"></i></button></div>
						</div>
						<div class="card-body">
							<div class="row row-cols-1 mx-3 rounded bg-dark shadow-none" id="contenedor-alertas"></div>
							<div class="row row-cols-1 p-3">
								<div class="col my-2">
									<div class="row row-cols-1">
										<div class="col text-start">
											<label class="form-label" for="sel_archivo">Archivo*:</label>
											<input class="form-control" type="file" name="sel_archivo" id="sel_archivo" accept=".csv, application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel" required>
										</div>
									</div>
								</div>
								<div class="col my-2">
									<a type="button" name="btn_subir_csv" id="btn_subir_csv" class="btn btn-success form-control" onClick="javascript:validar_procesar_excel()">
										<i class="fa-solid fa-cloud-arrow-up"></i>
										<span>SUBIR EXCEL</span>
									</a>
								</div>
							</div>
							<div class="col my-3" id="contenedor-tabla-datos"></div>
						</div> 
						<div class="card-footer">Elija el Excel que desea procesar</div> 
					</div>
				</div>
			</div>
		</div>
	</div>
<?php include INCLUDES.'footer.php'; ?>