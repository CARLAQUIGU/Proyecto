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
        <?php include 'nav.php' ?>
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
							<div class="col">
										<!-- Button trigger modal -->
										<button type="button" class="btn btn-light" data-bs-toggle="modal" data-bs-target="#exampleVerticallycenteredModal">Registrar</button>
										<!-- Modal -->
										<div class="modal fade" id="exampleVerticallycenteredModal" tabindex="-1" aria-hidden="true">
											<div class="modal-dialog modal-dialog-centered">
												<div class="modal-content">
													<div class="modal-header">
														<h5 class="modal-title">Registro de Cargo</h5>
														<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
													</div>
													<div class="modal-body">
													<form action="index.php?controller=cargo&action=GuardarCargo" method="post">
														<br>
														<input type="hidden" name="id" id="id">
														<label for="">Cargo</label>
														<input type="text" class="form-control" name="nombre" id="nombre" aria-describedby="helpId" placeholder="Nombre del Cargo">
														<br>
														<button type="submit" class="btn btn-primary">Guardar</button>
													</form>
													</div>
													<div class="modal-footer">
														<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
													</div>
												</div>
											</div>
										</div>
									</div>
							</div>
						</div>
					</div>
				</div>
                <div class="row row-cols-1 ">
					<div class="col">
						<div class="card radius-10">
							<div class="card-body">
								<h3>Lista de Cargo</h3>
                                <hr>
								
                                <table class="table table-striped table-bordered" >
                                    <thead class="thead-light">
                                        <tr>
                                            <th>#</th>
                                            <th>Cargo</th>
											<th class='hide'></th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php require_once 'model/Cargo.php';
                                        $a=1;
                                                    $cargo= new Cargo();
                                                    foreach ($cargo->mostrar() as $car) {?>
                                        <tr>
                                            <td><?php echo $a++; ?></td>
                                            <td><?php echo $car->cargo; ?></td>
											<td class='hide'><?php echo $car->id; ?></td>
                                            <td>
												
											<button type="button" onclick="capturar()"  class="btn btn-light px-5 radius-30"><i class='bx bx-pencil mr-1'></i>Editar</button>	 
											<a class="btn btn-light px-5 radius-30" onclick="javascript:return confirm('ESTAS SEGURO DE ELIMINAR ESTE REGISTRO?');" href="index.php?controller=cargo&action=Estado&id=<?php echo $car->id;?>"><i class='bx bx-trash mr-1'></i>Eliminar</a></td>

                                            </td>
                                        </tr>
                                    <?php } ?>
                                    </tbody>
                                    <tfoot>
                                    </tfoot>
                                </table>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<script>
			function capturar(){
			$($("table tbody tr")).on('click',function(){
				var nombre= $(this).find("td:eq(1)").text();
				var id= $(this).find("td:eq(2)").text();
				$("#nombre").val(nombre);
				$("#id").val(id);
				$('#exampleVerticallycenteredModal').modal('show');
			});   
		};

		$(document).ready(function() {
			$('#example').DataTable();
		} );
		</script>
		<!--end page wrapper -->
		<!--start overlay-->
		<div class="overlay toggle-icon"></div>
		<!--end overlay-->
		<!--Start Back To Top Button--> <a href="javaScript:;" class="back-to-top"><i class='bx bxs-up-arrow-alt'></i></a>
		<!--End Back To Top Button-->
		<footer class="page-footer">
			<p class="mb-0">Copyright © 2021. All right reserved. DarkSystem</p>
		</footer>
	</div>
	<!--end wrapper-->
	<!--start switcher-->
	<div class="switcher-wrapper">
		<div class="switcher-btn"> <i class='bx bx-cog bx-spin'></i>
		</div>
		<div class="switcher-body">
			<div class="d-flex align-items-center">
				<h5 class="mb-0 text-uppercase">Theme Customizer</h5>
				<button type="button" class="btn-close ms-auto close-switcher" aria-label="Close"></button>
			</div>
			<hr/>
			<p class="mb-0">Gaussian Texture</p>
			<hr>
			<ul class="switcher">
				<li id="theme1"></li>
				<li id="theme2"></li>
				<li id="theme3"></li>
				<li id="theme4"></li>
				<li id="theme5"></li>
				<li id="theme6"></li>
			</ul>
			<hr>
			<p class="mb-0">Gradient Background</p>
			<hr>
			<ul class="switcher">
				<li id="theme7"></li>
				<li id="theme8"></li>
				<li id="theme9"></li>
				<li id="theme10"></li>
				<li id="theme11"></li>
				<li id="theme12"></li>
			</ul>
		</div>
	</div>
	<!--end switcher-->
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
	<!--app JS-->
	<script src="assets/js/app.js"></script>
	<script>
		new PerfectScrollbar('.dashboard-top-countries');
	</script>
</body>

</html>