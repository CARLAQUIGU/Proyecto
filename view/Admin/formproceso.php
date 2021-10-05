<?php
require('seguridad.php');
?>
<!doctype html>
<html lang="en">
<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!--favicon-->
	<link rel="icon" href="assets/images/logoo.png" type="image/png" />
	<!--plugins-->
	<link href="assets/plugins/simplebar/css/simplebar.css" rel="stylesheet" />
	<link href="assets/plugins/perfect-scrollbar/css/perfect-scrollbar.css" rel="stylesheet" />
	<link href="assets/plugins/metismenu/css/metisMenu.min.css" rel="stylesheet" />
	<link href="assets/plugins/vectormap/jquery-jvectormap-2.0.2.css" rel="stylesheet" />
	<link href="assets/plugins/highcharts/css/highcharts-white.css" rel="stylesheet" />
	<link href="assets/plugins/datatable/css/dataTables.bootstrap5.min.css" rel="stylesheet" />
	<!-- loader-->
	<link href="assets/css/pace.min.css" rel="stylesheet" />
	<script src="assets/js/pace.min.js"></script>
	<!-- Bootstrap CSS -->
	<link href="assets/css/bootstrap.min.css" rel="stylesheet">
	<link href="assets/css/app.css" rel="stylesheet">
	<link href="assets/css/icons.css" rel="stylesheet">
	<!-- Theme Style CSS --> 
	<link rel="stylesheet" href="assets/css/dark-theme.css" />
	<link rel="stylesheet" href="assets/css/semi-dark.css" />
	<link rel="stylesheet" href="assets/css/header-colors.css" />
<title>DIRECCÍON DEPARTAMENTAL</title>
</head>
<style>
	.hide{

		display: none;

}
</style>
<body class="bg-theme bg-theme1">
	<!--wrapper-->
	<div class="wrapper">
		<!--sidebar wrapper -->
		<?php
		if($_SESSION['nivel']==1){
			include ("nav.php");
		}else{
			include ("nav2.php");
		}
		?>
        <!--end sidebar wrapper -->
		<!--start header -->
        <header>
        <?php include 'nav_top.php' ?>
        </header>
        <!--end header -->
		<!--start page wrapper -->
		<div class="page-wrapper">
			<div class="page-content">
				<div class="row row-cols-1">
					<div class="col">
						<div class="card radius-10">
							<div class="card-body">
						</div>
					</div>
				</div>
                <div class="row row-cols-1 ">
					<div class="col">
						<div class="card radius-10">
							<div class="card-body">
								<h3>Registrar Proceso</h3>
                                <hr>
								<form action="index.php?controller=funcionario&action=GuardarFuncionario" method="post" enctype="multipart/form-data">
									<div class="form-group">
										<input type="hidden" name="id" id="id">
										<label for="">Fecha Inicio</label>
										<input type="date" class="form-control" name="fechaini" id="fechaini" aria-describedby="helpId" >
										<br>
										<label for="">Resolucion Inicial</label>
										<input type="text" class="form-control" name="resolucionini" id="resolucionini" aria-describedby="helpId"  onblur="mayus(this);" placeholder="Resolucion Inicial">
										<br>
										<label for="">Falta</label>
										<textarea name="falta" id='flata' class="form-control" rows="5" cols="60"></textarea>
										<br>
										<label for="">Fecha Final</label>
										<input type="date" class="form-control" name="fechafin" id="fechafin" aria-describedby="helpId" >
										<br>
										<label for="">Resolucion Inicial</label>
										<input type="text" class="form-control" name="resolucionfin" id="resolucionfin" aria-describedby="helpId"  onblur="mayus(this);" placeholder="Resolucion Inicial">
										<br>
										<label for="">Sancion</label>
										<input type="text" class="form-control" name="sancion" id="sancion" aria-describedby="helpId" placeholder="Sancion">
										<br>
										<label for="">Fecha Sancion</label>
										<input type="date" class="form-control" name="fechas" id="fechas" aria-describedby="helpId" >
										<br>
										<label for="">Resolucion Sancion</label>
										<input type="text" class="form-control" name="resolucions" id="resolucions" aria-describedby="helpId"  onblur="mayus(this);" placeholder="Resolucion Inicial">
										<br>
									</div>
								</form>
								<a class="btn btn-light px-5 radius-30"  href="index.php?controller=funcionario&action=Estado&id=<?php echo $fun->id;?>"><i class='bx bx-trash mr-1'></i>Siguiente </a></td>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<script>

		$(document).ready(function() {
			$('#example').DataTable();
		} );

		function mayus(elemento){
			let texto=elemento.value;
			elemento.value=texto.toUpperCase();
		}
		</script>
		<!--end page wrapper -->
		<!--start overlay-->
		<div class="overlay toggle-icon"></div>
		<!--end overlay-->
		<!--Start Back To Top Button--> <a href="javaScript:;" class="back-to-top"><i class='bx bxs-up-arrow-alt'></i></a>
		<!--End Back To Top Button-->
		<footer class="page-footer">
			<p class="mb-0">Copyright © 2021. Direccion Departamental</p>
		</footer>
	</div>
	<!--end wrapper-->
	<!-- Bootstrap JS -->
	<script src="assets/js/bootstrap.bundle.min.js"></script>
	<!--plugins-->
	<script src="assets/js/jquery.min.js"></script>
	<script src="assets/plugins/simplebar/js/simplebar.min.js"></script>
	<script src="assets/plugins/metismenu/js/metisMenu.min.js"></script>
	<script src="assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js"></script>
	<!-- Vector map JavaScript -->
	<script src="assets/plugins/vectormap/jquery-jvectormap-2.0.2.min.js"></script>
	<script src="assets/plugins/vectormap/jquery-jvectormap-world-mill-en.js"></script>
	<!-- highcharts js -->
	<script src="assets/plugins/highcharts/js/highcharts.js"></script>
	<script src="assets/plugins/apexcharts-bundle/js/apexcharts.min.js"></script>
	<script src="assets/js/index2.js"></script>
	<script src="assets/plugins/simplebar/js/simplebar.min.js"></script>
	<script src="assets/plugins/metismenu/js/metisMenu.min.js"></script>
	<script src="assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js"></script>
	<script src="assets/plugins/datatable/js/jquery.dataTables.min.js"></script>
	<script src="assets/plugins/datatable/js/dataTables.bootstrap5.min.js"></script>
	<!--app JS-->
	<script src="assets/js/app.js"></script>
	<script src="assets/js/datatables.js"></script>
	<script src="assets/js/functions.js"></script>
</body>

</html>