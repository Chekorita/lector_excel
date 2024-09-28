<nav class="app-header navbar navbar-expand bg-body">
	<div class="container-fluid">
		<ul class="navbar-nav">
			<li class="nav-item"> <a class="nav-link" data-lte-toggle="sidebar" href="#" role="button"> <i class="bi bi-list"></i> </a> </li>
			<li class="nav-item d-none d-md-block"> <a href="#" class="nav-link"><?php echo mb_strtoupper(NOMBRE_SISTEMA, 'UTF-8'); ?></a> </li>
		</ul>
		<ul class="navbar-nav ms-auto">
			<?php $mensajes = obtener_mensajes(); ?>
			<li class="nav-item dropdown"> <a class="nav-link" data-bs-toggle="dropdown" href="#"> <i class="bi bi-chat-text"></i> <span class="navbar-badge badge text-bg-danger"><?php echo $mensajes->total; ?></span></a>
				<div class="dropdown-menu dropdown-menu-lg dropdown-menu-end">
					<?php
						if(!empty($mensajes->mensajes)){
							foreach($mensajes->mensajes as $mensaje):
								$mensaje = (object)$mensaje;
								$respuesta = 
								"
									<div class=\"dropdown-divider\"></div>
									<a href=\"#\" class=\"dropdown-item\">
										<div class=\"d-flex\">
											<div class=\"flex-shrink-0\"> <img src=\"";
											$respuesta .= ICONS;
											$respuesta .= "default_user.jpg\" alt=\"User\" class=\"img-size-50 rounded-circle me-3\"> </div>
											<div class=\"flex-grow-1\">
												<h3 class=\"dropdown-item-title\">
													{$mensaje->nombre}
													<span class=\"float-end fs-7 text-danger\"><i class=\"bi bi-star-fill\"></i></span>
												</h3>
												<p class=\"fs-7\">{$mensaje->mensaje}</p>
												<p class=\"fs-7 text-secondary\"> <i class=\"bi bi-clock-fill me-1\"></i> {$mensaje->hora}</p>
											</div>
										</div>
									</a>
								";
								echo $respuesta;
							endforeach;
						}else{
							$respuesta = 
							"
								<div class=\"dropdown-divider\"></div> <a href=\"#\" class=\"dropdown-item dropdown-footer text-muted\">Sin mensajes</a>
							";
							echo $respuesta;
						}
					?>
				</div>
			</li>
			<?php $notificaciones = obtener_notificaciones(); ?>
			<li class="nav-item dropdown"> <a class="nav-link" data-bs-toggle="dropdown" href="#"> <i class="bi bi-bell-fill"></i> <span class="navbar-badge badge text-bg-warning"><?php echo $notificaciones->total; ?></span> </a>
				<div class="dropdown-menu dropdown-menu-lg dropdown-menu-end"> <span class="dropdown-item dropdown-header">(<?php echo $notificaciones->total; ?>) notificaciones</span>
					<?php
						if(!empty($notificaciones->notificaciones)){
							foreach($notificaciones->notificaciones as $notificacion):
								$notificacion = (object)$notificacion;
								$respuesta = 
								"
									<div class=\"dropdown-divider\"></div>
									<a href=\"#\" class=\"dropdown-item\"> <i class=\"bi bi-bell-fill\"></i>
										<div class=\"d-flex\">
											<div class=\"flex-grow-1\">
												<p class=\"fs-7\">{$notificacion->notificacion}</p>
												<p class=\"fs-7 text-primary\"> <i class=\"bi bi-clock-fill me-1\"></i> {$notificacion->hora}</p>
											</div>
										</div>
									</a>
								";
								echo $respuesta;
							endforeach;
						}else{
							$respuesta = 
							"
								<div class=\"dropdown-divider\"></div> <a href=\"#\" class=\"dropdown-item dropdown-footer text-muted\">Sin notificaciones</a>
							";
							echo $respuesta;
						}
					?>
				</div>
			</li>
			<li class="nav-item"> <a class="nav-link" href="#" data-lte-toggle="fullscreen"> <i data-lte-icon="maximize" class="bi bi-arrows-fullscreen"></i> <i data-lte-icon="minimize" class="bi bi-fullscreen-exit" style="display: none;"></i></a></li>
			<li class="nav-item dropdown user-menu"> <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"> <img src="<?php echo ICONS; ?>default_user.jpg" class="user-image rounded-circle" alt="User"> <span class="d-none d-md-inline">USUARIO DEL LECTOR</span></a>
				<ul class="dropdown-menu dropdown-menu-lg dropdown-menu-end">
					<li class="user-header text-bg-dark"> <img src="<?php echo ICONS; ?>default_user.jpg" class="rounded-circle shadow" alt="User">
						<p>
							<small>Usuario del lector de excel</small>
						</p>
					</li>
					<!-- <li class="user-footer"><a href="#" class="btn btn-default btn-flat btn-outline-danger float-end" onclick="window.location.href = 'cerrar.php'; return false;">Cerrar sesión</a> </li> -->
				</ul>
			</li>
		</ul>
	</div>
</nav>