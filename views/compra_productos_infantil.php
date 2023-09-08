<?php

ob_start();
session_start();

if (!isset($_SESSION['nombre']) AND !isset($_SESSION['tipo_usuario'])) {
	$tipo_usuario = $_SESSION['tipo_usuario'];

	
		header("Location: login.php");

} else {
	$tipo_usuario = $_SESSION['tipo_usuario'];

	if ($tipo_usuario === 'Admin') {
		require 'header.php';
	}
	else if($tipo_usuario === 'Cliente') {
        header("Location: productos_hombre.php");
    }
	else{
		header("Location: login.php");
	}



?>
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
								<h1 class="box-title">Productos <button class="btn btn-success" id="btnagregar" onclick="mostrarelformulario(true)"><i class="fa fa-plus-circle"></i>
										Agregar</button>
								</h1>
								<div class="box-tools pull-right">
								</div>
							</div>
							<!-- /.box-header -->
							<!-- centro -->
							<div class="panel-body table-responsive" id="listadoregistros">
								<table id="tablalistadocompra" class="table table-striped table-bordered table-condensed table-hover">
									<thead>
										<th>Opciones</th>
										<th>Nombre</th>
										<th>Imagen</th>
										<th>Descripcion</th>
										<th>Cantidad</th>
										<th>Precio</th>
									</thead>
									<tbody>
									</tbody>
									<tfoot>
										<th>Opciones</th>
										<th>Nombre</th>
										<th>Imagen</th>
										<th>Descripcion</th>
										<th>Cantidad</th>
										<th>Precio</th>
									</tfoot>
								</table>
							</div>

							
							<!--Fin centro -->
						</div><!-- /.box -->
					</div><!-- /.col -->
				</div><!-- /.row -->
			</section><!-- /.content -->
		</div>
		<?php require_once "footer.php"; ?>
	</div>
	<script type="text/javascript" src="../views/javascript/productos_infantil.js"></script>
</body>

</html>

<?php
 }
 ob_end_flush();
?>