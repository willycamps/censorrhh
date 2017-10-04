<!DOCTYPE html>
<html>
<head>
	<meta charset='UTF-8' />
	<title>INE</title>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();  ?>theme/css/bootstrap.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();  ?>theme/css/datepicker/datepicker3.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();  ?>theme/css/daterangepicker/daterangepicker-bs3.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();  ?>theme/css/datatables/dataTables.bootstrap.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();  ?>theme/css/menu.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();  ?>theme/font-awesome/css/font-awesome.min.css" />
	
	<script type="text/javascript" src="<?php echo base_url();  ?>theme/js/jquery.js"></script>
	<script type="text/javascript" src="<?php echo base_url();  ?>theme/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url();  ?>theme/js/jquery.dataTables.js"></script>
	<script type="text/javascript" src="<?php echo base_url();  ?>theme/js/dataTables.bootstrap.js"></script>
	<script type="text/javascript" src="<?php echo base_url();  ?>theme/js/bootstrap-datepicker.js"></script>
	<script type="text/javascript" src="<?php echo base_url();  ?>theme/js/daterangepicker.js"></script>

	<?php 
		if ((bool)$this->session->userdata('sesion') == false ) {
			redirect("login");    // no session established, kick back to login page
		}
	?>
</head>
<body>
	<div class="container">
		<nav class="navbar navbar-default navbar-fixed-top">
			<div class="container-fluid">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar">
						<span class="sr_only">Menu</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<a class="navbar-brand" href="#">Instituto Nacional de Estadística</a>
				</div>
				<div id="navbar" class="navbar-collapse collapse">
					<ul class="nav navbar-nav">
					<?php
						switch($this->session->userdata('rol'))
						{
							case 'MONITOR':
								echo
										'<li class="dropdown">
											<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Boletas <span class="caret"></span></a>
											<ul class="dropdown-menu">
												<li><a href="'.base_url().'index.php/areas">Por Institución</a></li>
											</ul>
										</li>';
								break;
							
							case 'EMPADRONADOR':
								echo
										'<li class="dropdown">
											<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Actividades <span class="caret"></span></a>
											<ul class="dropdown-menu">
												<li><a href="'.base_url().'index.php/resumen">Resumen diario</a></li>
												<li><a href="'.base_url().'index.php/listado_personas_censadas">Listado de Boletas</a></li>
											</ul>
										</li>';
								break;
								
							case 'SUPERVISOR':
								echo
										'<li class="dropdown">
											<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Censo <span class="caret"></span></a>
											<ul class="dropdown-menu">
												<li><a href="'.base_url().'index.php/listados">Listados</a></li>
											</ul>
										</li>';
								break;
						}
					?>
					</ul>
			
					<!-- log-out section -->
					<ul class="nav navbar-nav navbar-right">
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown">
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
									<a href="<?php echo base_url(); ?>index.php/cambio/">Cambiar Contraseña <span class="glyphicon glyphicon-cog pull-right"></span></a>
								</li>
								<li class="divider"></li>
								<li>
									<a href="<?php echo base_url(); ?>index.php/login/cerrarSesion">Cerrar Sesión <span class="glyphicon glyphicon-log-out pull-right"></a>
								</li>
							</ul>
						</li>
					</ul>
				</div>
			</div>
		</nav>
	</div> <!-- end container -->