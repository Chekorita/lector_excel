<?php
	$config = (object)$config;
	$estilos = (array)$estilos;
	$scripts = (array)$scripts;
?>
<!DOCTYPE html>
<html lang="es-mx" data-bs-theme='dark'>
	<head>
		<!--ETIQUETAS META-->
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta http-equiv="cache-control" content="no-cache"/>
		<meta http-equiv="pragma" content="no-cache"/>
		<meta name="author" content="Sergio Bustamante De Jesús">
		
		<!--TITULO E ICONO-->
		<meta name="title" content="<?php echo $config->nombre; ?>">
		<title><?php echo mb_strtoupper($config->nombre, 'UTF-8'); ?></title>
		<link rel="shortcut icon" href="<?php echo FAVICON; ?>LECTOR_LIGHT.png" type="image/x-icon">

		<?php include INCLUDES_M.'styles.php'; ?>
	</head>