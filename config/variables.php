<?php
	$url_pruebas = null;
	define ('DS', "/");
	if(is_null($url_pruebas)){
		define ('URL', '.'.DS);
	}else{
		define ('URL', 'localhost'.DS.$url_pruebas.DS);
	}

	//RUTAS DE LOS ARCHIVOS DEL SISTEMA
	define ('CONFIG', URL.'config'.DS);
	define ('FUNCTIONS', URL.'api'.DS);
	define ('TEMPLATES', URL.'templates'.DS);
	define ('INCLUDES', URL.'includes'.DS);
	define ('INCLUDES_M', INCLUDES.'modules'.DS);

	//RUTAS DE LOS RECUSOS CON LA URL BASE
	define('ASSETS', URL.'assets'.DS);
	define ('CSS', ASSETS.'css'.DS);
	define ('FAVICON', ASSETS.'favicon'.DS);
	define ('FONTS', ASSETS.'fonts'.DS);
	define ('IMAGES', ASSETS.'images'.DS);
	define ('ICONS', IMAGES.'icon'.DS);
	define ('JS', ASSETS.'scripts'.DS);
	define ('JS_FUNCTIONS', JS.'funciones'.DS);
	define ('LIBS', ASSETS.'libs'.DS);

	define ('NOMBRE_LOGOS', 'LECTOR_');
	define ('NOMBRE_ICONOS', 'LECTOR_');
	define ('NOMBRE_SISTEMA', 'LECTOR DE ARCHIVOS EXCEL');
?>