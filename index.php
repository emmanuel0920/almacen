<?php
include('./controller/conexion.php');
?>
<!DOCTYPE html>
<html lang="en">
	<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"  />

		<title>Control de Almacén - Municipio de Jesús María</title>

		<meta name="description" content="User login page" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />

		<!-- bootstrap & fontawesome -->
		<link rel="stylesheet" href="assets/css/bootstrap.min.css" />
		<link rel="stylesheet" href="assets/font-awesome/4.5.0/css/font-awesome.min.css" />
		<link rel="shortcut icon" type="image/png" href="img/favicon.png"/>

		<!-- text fonts -->
		<link rel="stylesheet" href="assets/css/fonts.googleapis.com.css" />

		<!-- ace styles -->
		<link rel="stylesheet" href="assets/css/ace.min.css" />

		<!--[if lte IE 9]>
			<link rel="stylesheet" href="assets/css/ace-part2.min.css" />
		<![endif]-->
		<link rel="stylesheet" href="assets/css/ace-rtl.min.css" />

		<link rel="stylesheet" type="text/css" href="assets/processed/index.css">




		<!--[if lte IE 9]>
		  <link rel="stylesheet" href="assets/css/ace-ie.min.css" />
		<![endif]-->

		<!-- HTML5shiv and Respond.js for IE8 to support HTML5 elements and media queries -->

		<!--[if lte IE 8]>
		<script src="assets/js/html5shiv.min.js"></script>
		<script src="assets/js/respond.min.js"></script>
		<![endif]-->
	</head>

	<body class="login-layout light-login">
		<div class="main-container">
			<div class="main-content">
				<div class="row">
					<div class="col-sm-10 col-sm-offset-1">
						<div class="login-container">
							<div class="logo_container">
								<img src="img/logo_2020.png">
							</div>

							<div class="space-6"></div>

							<div class="position-relative">
								<div id="login-box" class="login-box visible widget-box no-border">
									<div class="widget-body">
										<div class="widget-main">
											<h3 class="header blue lighter bigger" ALIGN=center>
												<i class="ace-icon fa fa-lock"></i>
												Acceso
											</h3>

											<div class="space-6"></div>

											<form name="login_user" id="form_login" method="POST" action="">


											<?php

												if(isset($_GET['modo']) == 'desconectar')
												{
													session_destroy();
													echo '<meta http-equiv="Refresh" content="2;url=../">';
													exit ('<div class="center" id="loading">Cerrando sesión...<br><img class="center" src="img/exit.gif" /></div>');
												}
												if(isset($_SESSION['id_usuario']))
												{
													echo '<script type="text/javascript">window.location.href="inicio.php";</script>';
													//header("Location: http://mc.adminjm.org/inicio.php");
													exit('<div class="center" id="loading">Inciando sesión...<br><img class="center" src="img/exit.gif" /></div>');
												}
												else
												{
											?>
												<fieldset>
													<div class="form-group">
														<label class="block clearfix">
															<span class="block input-icon input-icon-right">
																<input type="text" class="form-control" placeholder="Usuario" name="nick" id="nick" title="Ingrese su usuario" required />
																<i class="ace-icon fa fa-user"></i>
															</span>
														</label>
													</div>


													<div class="form-group">
														<label class="block clearfix">
															<span class="block input-icon input-icon-right">
																<input type="password" class="form-control" placeholder="Contraseña" name="pass" id="pass" title="Ingrese su Contraseña" required="required" />
																<i class="ace-icon fa fa-key"></i>
															</span>
														</label>
													</div>

													<div class="space"></div>


													<div class="login_div">
														<button class="center-block btn btn-sm btn-primary" type="submit" name="login" value="Entrar">
															<i class="ace-icon fa fa-sign-in"></i>
															<span class="bigger-110">Iniciar Sesión</span>
														</button>
													</div>



													<div class="space-4"></div>
												</fieldset>
											</form>
											<?php
												}
											?>
											<div class="space-6"></div>
										</div><!-- /.widget-main

										<div class="toolbar clearfix center">
											<img src="img/logo_jm.png" width="150">
										</div>-->
									</div><!-- /.widget-body -->
								</div><!-- /.login-box -->
							</div><!-- /.position-relative -->
						</div>
					</div><!-- /.col -->
				</div><!-- /.row -->
			</div><!-- /.main-content -->
		</div><!-- /.main-container -->

		<!-- basic scripts -->

		<!--[if !IE]> -->
		<script src="assets/js/jquery-2.1.4.min.js"></script>

		<!-- <![endif]-->

		<!--[if IE]>
			<script src="assets/js/jquery-1.11.3.min.js"></script>
		<![endif]-->
		<script type="text/javascript">
			if('ontouchstart' in document.documentElement) document.write("<script src='assets/js/jquery.mobile.custom.min.js'>"+"<"+"/script>");
		</script>
		<script src="assets/js/bootstrap.min.js"></script>
		<script src="https://unpkg.com/sweetalert@2.1.0/dist/sweetalert.min.js"></script>
		<script src="assets/js/jquery.validate.min.js"></script>

		<!-- inline scripts related to this page -->
		<script type="text/javascript">
			jQuery(function($) {
			 $(document).on('click', '.toolbar a[data-target]', function(e) {
				e.preventDefault();
				var target = $(this).data('target');
				$('.widget-box.visible').removeClass('visible');//hide others
				$(target).addClass('visible');//show target
			 });
			});



			//you don't need this, just used for changing background
			jQuery(function($) {

				$('#btn-login-light').on('click', function(e) {
				$('body').attr('class', 'login-layout light-login');
				$('#id-text2').attr('class', 'grey');
				$('#id-company-text').attr('class', 'blue');

				e.preventDefault();
			 });


			});
		</script>
		<script>
		$('#form_login').validate({
			errorElement: 'div',
			errorClass: 'help-block',
			focusInvalid: false,
			ignore: "",
			rules: {
				nick: {
					required: true
				},

				pass: {
					required: true
				}
			},

			messages: {
				nick: {
					required: "Favor de ingresar el usuario."
				},

				pass: {
					required: "Favor de ingresar la contraseña."
				}
			},


			highlight: function (e) {
				$(e).closest('.form-group').removeClass('has-info').addClass('has-error');
			},

			success: function (e) {
				$(e).closest('.form-group').removeClass('has-error');//.addClass('has-info');
				$(e).remove();
			},

			errorPlacement: function (error, element) {
				if(element.is('input[type=checkbox]') || element.is('input[type=radio]')) {
					var controls = element.closest('div[class*="col-"]');
					if(controls.find(':checkbox,:radio').length > 1) controls.append(error);
					else error.insertAfter(element.nextAll('.lbl:eq(0)').eq(0));
				}
				else if(element.is('.select2')) {
					error.insertAfter(element.siblings('[class*="select2-container"]:eq(0)'));
				}
				else if(element.is('.chosen-select')) {
					error.insertAfter(element.siblings('[class*="chosen-container"]:eq(0)'));
				}
				else error.insertAfter(element.parent());
			},

			submitHandler: function (form) {
				var parametros = {
					"nick" : $('#nick').val(),
					"pass" : $('#pass').val()
				};


				$.ajax({
						data:  parametros,
						url:   './controller/funciones_logeo.php',
						type:  'post',

						success:  function (data) {
							if (data==='correcto'){

									location.reload();
									//alert("correcto");
								}

							if (data==='error'){
								swal({
								  title: "¡Error!",
								  text: "¡Nombre de usuario y/o contraseña incorrectos!",
								  icon: "warning",
								  button: "Aceptar"
								});
							}

							if (data==='error1'){
								swal({
								  title: "¡Error!",
								  text: "¡Nombre de usuario y/o contraseña incorrectos.!",
								  icon: "warning",
								  button: "Aceptar"
								});
							}


							if (data==='error2'){
								swal({
								  title: "¡Error!",
								  text: "¡Favor de llenar todos los datos!",
								  icon: "error",
								  button: "Aceptar"
								});
							}
						}
				});
			}

		});

	</script>
	</body>
</html>
