<html>
<head>
	<title>Acceso de usuarios</title>
	<meta charset="UTF-8" />
	<link rel="stylesheet" type="text/css" href="/theme/css/bootstrap.css" />
	<link rel="stylesheet" type="text/css" href="/theme/font-awesome/css/font-awesome.min.css" />	
	<link rel="stylesheet" type="text/css" href="/theme/css/login.css" />
</head>
<body>
	<div class="container">
		
		
		<div class="text-center">
			<h1 class="text-center login-title">Censo Nacional del Recurso Humano </h1>
			
			 <img src="/theme/font-awesome/fonts/CCRRHH.png" height="100" width="100"> 
			 <img src="/theme/font-awesome/fonts/INE.png"  height="100" width="100"> 
			<img src="/theme/font-awesome/fonts/Gobierno-Guatemala.png"  height="100" width="100"> 
			
			<!-- <div class="col-sm-6 col-md-4 col-md-offset-4"> -->							
				<?php echo form_open("/login/iniciarSesion", array('autocomplete' => 'off', 'class' => 'form-signin')) ?>
				<?php
					if (isset($usuario_negado)){
						$userid = array(
							'autocomplete' => 'off',
							'name' => 'userid',
							'placeholder' => 'Usuario',
							'class' => 'form-control',
							'value' => $usuario_negado,
							'required' => 'autofocus'
						);
					}
					else
					{
						$userid = array(
							'autocomplete' => 'off',
							'name' => 'userid',
							'placeholder' => 'Usuario',
							'class' => 'form-control',
							'required' => 'autofocus'
						);
					}
					$password = array(
						'autocomplete' => 'off',
						'required' => 'autofocus',
						'name' => 'password',
						'placeholder' => 'Contraseña',
						'class' => 'form-control',
						'type' => 'password'
					);
				?>
				<div class="account-wall">
					<!--<i class="fa fa-user-circle text-big"></i>-->
					<?php echo form_input($userid) ?>
					<?php echo form_input($password) ?>
					<?php
						$clase_css = 'class="btn btn-lg btn-primary btn-block"';
						echo form_submit('','Iniciar Sesión',$clase_css); 
					?>
					<!--<a href="#" class="pull-right need-help">Need help? </a><span class="clearfix"></span>-->
					
				</div>
				<?php echo form_close() ?>
				<?php 
				if (isset($login_estatus)){
					echo '			<br><div class="alert alert-danger alert-dismissable">
						                <i class="fa fa-ban"></i>
						                <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>
						                <b>Alerta!</b> Usuario o contraseña incorrectos
						            </div>
					';
				}
            ?>
				<a href="#" class="text-center new-account">Create an account </a>
			</div>
		</div>
		
		
		
	</div>
</body>
</html>