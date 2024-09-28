<main class="app-main">
	<div class="app-content-header">
		<div class="container-fluid">
			<div class="row">
				<div class="col-sm-6">
					<h3 class="mb-0 text-muted fw-bold"><?php echo mb_strtoupper($config->nombre, 'UTF-8'); ?></h3>
				</div>
				<div class="col-sm-6">
					<nav aria-label="breadcrumb">
						<ol class="breadcrumb float-sm-end">
							<?php
								if(!empty($breadcrumbs)){
									foreach ($breadcrumbs as $breadcrumb):
										$breadcrumb = (object)$breadcrumb;
										$breadcrumb->nombre = mb_strtoupper($breadcrumb->nombre, 'UTF-8');
										if($breadcrumb->enlace === "true"){
											echo "<li class=\"breadcrumb-item {$breadcrumb->status}\" {$breadcrumb->aria}><a href=\"#\" onclick=\"window.location.href = '{$breadcrumb->url}'; return false;\">{$breadcrumb->nombre}</a></li>";
										}else{
											echo "<li class=\"breadcrumb-item {$breadcrumb->status}\" {$breadcrumb->aria}><span>{$breadcrumb->nombre}</span></li>";
										}
									endforeach;
								}else{
									echo "<li class=\"breadcrumb-item text-danger\" aria-current=\"page\">Error al cargar páginas</li>";
								}
							?>
						</ol>
					</nav>
				</div>
			</div>
		</div>
	</div>