<link rel="stylesheet" type="text/css" href="<?php echo CSS; ?>main.css">
<link rel="stylesheet" type="text/css" href="<?php echo LIBS; ?>bootstrap/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="<?php echo LIBS; ?>bootstrap-icons/bootstrap-icons.min.css">
<link rel="stylesheet" type="text/css" href="<?php echo LIBS; ?>fontawesome/css/all.min.css">
<link rel="stylesheet" type="text/css" href="<?php echo LIBS; ?>adminlte/css/adminlte.min.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fontsource/source-sans-3@5.0.12/index.css" integrity="sha256-tXJfXfp6Ewt1ilPzLDtQnJV4hclT9XuaZUKyUvmyr+Q=" crossorigin="anonymous">
<link rel="stylesheet" type="text/css" href="<?php echo LIBS; ?>overlayscrollbars/css/overlayscrollbars.min.css">
<link rel="stylesheet" type="text/css" href="<?php echo LIBS; ?>toast/toast.css">
<link rel="stylesheet" type="text/css" href="<?php echo LIBS; ?>sweet_alert/css/sweetAlert2.css">
<link rel="stylesheet" type="text/css" href="<?php echo LIBS; ?>datatables/css/datatables.css">

<link rel="stylesheet" type="text/css" href="<?php echo CSS; ?>estilosGenerales.css">
<link rel="stylesheet" type="text/css" href="<?php echo CSS; ?>estilos_generales.css">
<link rel="stylesheet" type="text/css" href="<?php echo CSS; ?>index.css">

<?php
	if(isset($estilos) && !empty($estilos)):
		foreach($estilos as $estilo):
			$estilo = (object)$estilo;
			echo "<link rel=\"stylesheet\" type=\"text/css\" href=\"$estilo->url\">";
		endforeach;
	endif;
?>