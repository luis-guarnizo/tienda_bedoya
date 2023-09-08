<?php

// ob_start();
// session_start();

// if (!isset($_SESSION['nombre'])) {

// 	header("Location: login.php");
// } else {

// 	require 'header.php';

// ?>

	<!DOCTYPE html>
	<html lang="en">

	<?php require_once "header.php" ?>


	<body class="hold-transition sidebar-mini layout-fixed">
		<div class="wrapper">

			<!-- Preloader -->
			<div class="preloader flex-column justify-content-center align-items-center">
				<img class="animation__shake" src="<?php echo $ruta; ?>dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
			</div>

			<!-- Navbar -->

			<?php require_once "nav.php"; ?>

			<!-- /.navbar -->

			<!-- Main Sidebar Container -->
			<?php require_once "menu.php"; ?>

			<!-- Content Wrapper. Contains page content -->
			<div class="content-wrapper">


				<section class="content">
					<div class="row">
						<div class="col-md-12">
							<div class="box">
								<div class="box-header with-border">
									<h1 class="box-title">usuario <button class="btn btn-success" id="btnagregar" onclick="mostrarelformulario(true)"><i class="fa fa-plus-circle"></i>
											agregar</button>
									</h1>
									<div class="box-tools pull-right">
									</div>
								</div>
								<!-- /.box-header -->
								<!-- centro -->
								<div class="panel-body table-responsive" id="listadoregistros">
									<table id="tablalistado" class="table table-striped table-bordered table-condensed table-hover">
										<thead>
											<th>Opciones</th>
											<th>Usuario</th>
											<th>Nombre</th>
											<th>Direccion</th>
											<th>Teléfono</th>
											<th>Tipo de Usuario</th>
										</thead>
										<tbody>
										</tbody>
										<tfoot>
											<th>Opciones</th>
											<th>Usuario</th>
											<th>Nombre</th>
											<th>Direccion</th>
											<th>Teléfono</th>
											<th>Tipo de Usuario</th>
										</tfoot>
									</table>
								</div>

								<div class="card-body" id="formularioregistros">
									<form name="formulario" id="formulario" method="POST">
										<div class="row">
											<div class="col-sm-6">
												<div class="form-group">
													<label>Usuario</label>
													<input type="hidden" name="Id_usuario" id="Id_usuario">
													<input type="text" class="form-control" name="usuario" id="usuario" maxlength="100" placeholder="Usuario" required>
												</div>
											</div>

											<div class="col-sm-6">
												<div class="form-group">
													<label>Nombre</label>
													<input type="text" class="form-control" name="nombre" id="nombre" maxlength="100" placeholder="Nombre" required>
												</div>
											</div>

											<div class="col-sm-6">
												<div class="form-group">
													<label>direccion</label>
													<input type="text" class="form-control" name="direccion" id="direccion" placeholder="Dirección" maxlength="70">
												</div>
											</div>

											<div class="col-sm-6">
												<div class="form-group">
													<label>telefono</label>
													<input type="text" class="form-control" name="telefono" id="telefono" maxlength="20" placeholder="Teléfono">
												</div>
											</div>

											<div class="col-sm-6">
												<div class="form-group">
													<label>Tipo de usuario</label>
													<input type="text" class="form-control" name="tipo_usuario" id="tipo_usuario" maxlength="20" placeholder="Tipo Usuario">
												</div>
											</div>

											<div class="col-sm-6">
												<div class="form-group">
													<label>Password</label>
													<input type="password" class="form-control" name="password" id="password" maxlength="20" placeholder="password">
												</div>
											</div>

										</div>

										<div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
											<button class="btn btn-primary" type="submit" id="btnGuardar"><i class="fa fa-save"></i> Guardar</button>

											<button class="btn btn-danger" onclick="cancelarformulario()" type="button"><i class="fa fa-arrow-circle-left"></i> Cancelar</button>
										</div>
									</form>
								</div>
								<!--Fin centro -->
							</div><!-- /.box -->
						</div><!-- /.col -->
					</div><!-- /.row -->
				</section><!-- /.content -->
			</div>
			<?php	require_once "footer.php";?>
		</div>
		<script type="text/javascript" src="../views/javascript/usuarios.js"></script>

	</body>

	</html>

<?php
// }
// ob_end_flush();
?>