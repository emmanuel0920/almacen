<div class="breadcrumbs ace-save-state breadcrumbs-fixed" id="breadcrumbs">
	<ul class="breadcrumb">
		<li>
			<i class="ace-icon fa fa-home home-icon"></i>
			<a href="inicio.php">Inicio</a>
		</li>
		<li>
			<a href="#">Reportes</a>
		</li>

		<!-- <li class="active">Registro de Usuarios</li> -->
	</ul><!-- /.breadcrumb -->
</div>

<div class="page-content">
	

	<div class="page-header">
		<h1>Reportes
			<small>
				<i class="ace-icon fa fa-angle-double-right"></i>
				Filtros
			</small>
		</h1>
		
	</div><!-- /.page-header -->

	<div class="row">
		<div class="col-xs-12">
			<!-- PAGE CONTENT BEGINS -->


			<div class="container">
				<form class="well form-horizontal" method="post"  id="form_usuarios">
					<fieldset>

						<!-- Form Name -->
						<legend>Filtros para el Reporte</legend>

						<!-- Text input-->
						<!-- <div class="form-group">
						  	<label class="col-md-4 control-label">Nombre completo<FONT COLOR="red">*</FONT></label>  
						  	<div class="col-md-4 inputGroupContainer">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-user"></i></span>
									<input  name="nombre_usuario" id="nombre_usuario" placeholder="Nombre Completo" class="form-control" type="text" required/>
								</div>
						  	</div>
						</div> -->

						<div class="form-group">
						  	<label class="col-md-4 control-label">Nombre del Personal<FONT COLOR="red">*</FONT></label>  
						  	<div class="col-md-4 inputGroupContainer">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-user"></i></span>
									<select name="id_tipo_usuario" id="id_tipo_usuario" class="form-control selectpicker" required>
										<option value="">Seleccione una opción</option>
										<?php echo $option_tipo;?>
									</select>
								</div>
						  	</div>
						</div>

						<div class="form-group">
						  	<label class="col-md-4 control-label">Producto<FONT COLOR="red">*</FONT></label>  
						  	<div class="col-md-4 inputGroupContainer">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-user"></i></span>
									<select name="id_tipo_usuario" id="id_tipo_usuario" class="form-control selectpicker" required>
										<option value="">Seleccione una opción</option>
										<?php echo $option_tipo;?>
									</select>
								</div>
						  	</div>
						</div>

						<div class="form-group">
						  	<label class="col-md-4 control-label">Fecha de Inicio<FONT COLOR="red">*</FONT></label>  
						  	<div class="col-md-4 inputGroupContainer">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-user"></i></span>
									<select name="id_tipo_usuario" id="id_tipo_usuario" class="form-control selectpicker" required>
										<option value="">Seleccione una opción</option>
										<?php echo $option_tipo;?>
									</select>
								</div>
						  	</div>
						</div>

						<div class="form-group">
						  	<label class="col-md-4 control-label">Fecha de Fin<FONT COLOR="red">*</FONT></label>  
						  	<div class="col-md-4 inputGroupContainer">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-user"></i></span>
									<select name="id_tipo_usuario" id="id_tipo_usuario" class="form-control selectpicker" required>
										<option value="">Seleccione una opción</option>
										<?php echo $option_tipo;?>
									</select>
								</div>
						  	</div>
						</div>

						<!-- Button -->
						<div class="form-group">
						  	<label class="col-md-4 control-label"></label>
						  	<div class="col-md-4">
								<button type="submit" class="btn btn-success"> <i class="ace-icon fa fa-bar-chart"></i>&nbsp;Generar Reporte</button>
							</div>
						</div>
					</fieldset>
				</form>
			</div><!-- /.row -->

			<!-- PAGE CONTENT ENDS -->
		</div><!-- /.col -->
	</div><!-- /.row -->
</div><!-- /.page-content -->