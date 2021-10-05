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
								<h3>Registrar Proceso Penal</h3>
                                <hr>
                                <form action="index.php?controller=distrito&action=Guardardistrito" method="post">
									<div class="form-group">
									<label for="">Nro Caso</label>
									<input type="text" class="form-control" name="id" id="id" data-bs-target="#id" aria-describedby="helpId" placeholder="Nro de Caso">
									</div>
									<br>
									<label for="">Fiscal</label>
									<input type="text" class="form-control" name="nombre" id="nombre" data-bs-target="#nombre" onblur="mayus(this);" aria-describedby="helpId" placeholder="Nombre del Fiscal">
									<br>
									<div class="col-md-6">
										<div class="form-check form-switch">
										<input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked" checked>
										<label class="form-check-label" for="flexSwitchCheckChecked">No existe</label>
										<br>
									</div>
									<br>
									</div>
									</form>
								<a class="btn btn-light px-5 radius-30"  href="index.php?controller=proceso&action=formproceso"><i class='bx bx-trash mr-1'></i>Siguiente </a></td>
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