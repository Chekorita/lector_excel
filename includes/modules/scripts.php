<div id="contenedor-status" class="fixed-bottom fw-bold"></div>

<div id="contenedor-bloquea" class="cargando_oculto"></div>

<script src="<?php echo LIBS; ?>jquery/js/jquery.min.js"></script>
<script src="<?php echo LIBS; ?>bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="<?php echo LIBS; ?>adminlte/js/adminlte.min.js"></script>
<script src="<?php echo LIBS; ?>overlayscrollbars/js/overlayscrollbars.min.js"></script>
<script src="<?php echo LIBS; ?>popper/js/popper.min.js"></script>
<script src="<?php echo LIBS; ?>sweet_alert/js/sweetAlert2.js"></script>
<script src="<?php echo LIBS; ?>datatables/js/datatables.js"></script>
<script src="<?php echo LIBS; ?>toast/toast.js"></script>

<script src="<?php echo JS; ?>/funciones_generales.js"></script>
<?php
	if(isset($scripts) && !empty($scripts)):
		foreach($scripts as $script):
			$script = (object)$script;
			echo "<script src=\"$script->url\"></script>";
		endforeach;
	endif;
?>