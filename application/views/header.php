<!DOCTYPE html>
<html>
<head>
	<meta charset='UTF-8' />
	<title>INE</title>
	<link rel="stylesheet" type="text/css" href="/theme/css/bootstrap.css" />
	<link rel="stylesheet" type="text/css" href="/theme/css/datepicker/datepicker3.css" />
	<link rel="stylesheet" type="text/css" href="/theme/css/daterangepicker/daterangepicker-bs3.css" />
	<link rel="stylesheet" type="text/css" href="/theme/css/datatables/dataTables.bootstrap.css" />
	<link rel="stylesheet" type="text/css" href="/theme/css/menu.css" />
	<link rel="stylesheet" type="text/css" href="/theme/font-awesome/css/font-awesome.min.css" />
	
	<script type="text/javascript" src="/theme/js/jquery.js"></script>
	<script type="text/javascript" src="/theme/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="/theme/js/jquery.dataTables.js"></script>
	<script type="text/javascript" src="/theme/js/dataTables.bootstrap.js"></script>
	<script type="text/javascript" src="/theme/js/bootstrap-datepicker.js"></script>
	<script type="text/javascript" src="/theme/js/daterangepicker.js"></script>

	<?php 
		if ((bool)$this->session->userdata('sesion') == false ) {
			redirect("login");    // no session established, kick back to login page
		}
	?>
</head>
<body>
	<div class="container">
		<nav class="navbar navbar-expand-lg navbar-light bg-light">
			<a class="navbar-brand" href="#">Instituto Nacional de Estadística</a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="navbarSupportedContent">
				<ul class="navbar-nav mr-auto">
					<li class="nav-item">
						<ul class="navbar-nav mr-auto">
						<?php
							switch($this->session->userdata('rol'))
							{
								case 'MONITOR':
									echo
											'<li class="nav-item dropdown">
												<a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
													Boletas
												</a>
												<div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
													<a class="dropdown-item" href="http://localhost/index.php/ventas">Por Institución</a>
												</div>
											</li>';
									break;
									case 'EMPADRONADOR':
									echo
											'<li class="nav-item dropdown">
												<a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
													Actividades
												</a>
												<div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
													<a class="dropdown-item" href="http://localhost/index.php/resumen">Resumen diario</a>
													<a class="dropdown-item" href="http://localhost/index.php/listado_personas_censadas">Listado de Boletas</a>
												</div>
											</li>';
									break;
							}
						?>
						</ul>
					</li>
				</ul>
			
				<!-- log-out section -->
				<ul class="navbar-nav ml-auto">
					<li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							<span class="glyphicon glyphicon-user"></span>
							<strong><?php echo $this->session->userdata('usuario') ?></strong>
							<span class="glyphicon glyphicon-chevron-down"></span>
						</a>
						<ul class="dropdown-menu">
							<li>
								<div class="navbar-login">
									<div class="row">
										<div class="col-lg-4">
											<p class="text-center">
												<span class="glyphicon glyphicon-user icon-size"></span>
											</p>
										</div>
										<div class="col-lg-8">
											<p class="text-left"><strong><strong><?php echo $this->session->userdata('usuario_nombre') ?></strong></strong></p>
											<p class="text-left small"><?php echo $this->session->userdata('email') ?></p>
											<p class="text-left">
												<a href="#" class="btn btn-primary btn-block btn-sm">Profile</a>
											</p>
										</div>
									</div>
								</div>
							</li>
							<li class="divider navbar-login-session-bg"></li>
							<li>
								<a href="/index.php/cambio/">Cambiar Contraseña <span class="glyphicon glyphicon-cog pull-right"></span></a>
							</li>
							<li class="divider"></li>
							<li>
								<a href="/index.php/login/cerrarSesion">Cerrar Sesión <span class="glyphicon glyphicon-log-out pull-right"></a>
							</li>
						</ul>
					</li>
				</ul>
			</div>
		</nav>
	</div> <!-- end container -->