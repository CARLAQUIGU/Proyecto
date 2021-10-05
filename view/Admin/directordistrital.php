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
	<title>DIRECCIÓN DEPARTAMENTAL</title>
</head>

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
							<div class="col">
										<!-- Button trigger modal -->
										<button type="button" class="btn btn-light" data-bs-toggle="modal" data-bs-target="#exampleVerticallycenteredModal">Registrar</button>
										<!-- Modal -->
										<div class="modal fade" id="exampleVerticallycenteredModal" tabindex="-1" aria-hidden="true">
											<div class="modal-dialog modal-dialog-centered">
												<div class="modal-content">
													<div class="modal-header">
														<h5 class="modal-title">Registro de Director Distrital</h5>
														<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
													</div>
													<div class="modal-body">
													<form action="index.php?controller=directordistrital&action=GuardarDirectorDistrital" method="post">
														<div class="form-group">
														<label for="">Nombre</label>
														<input type="text" class="form-control" name="nombre" id="nombre" aria-describedby="helpId" placeholder="Nombre del Funcionario">
														<br>
														<label for="">Paterno</label>
														<input type="text" class="form-control" name="paterno" id="paterno" aria-describedby="helpId" placeholder="Paterno del Funcionario">
														<br>
														<label for="">Materno</label>
														<input type="text" class="form-control" name="materno" id="materno" aria-describedby="helpId" placeholder="Materno del Funcionario">
														<br>
														<label for="">C.I.</label>
														<input type="text" class="form-control" name="ci" id="ci" aria-describedby="helpId" placeholder="C.I. del Funcionario">
														<br>
														<label class="form-label">Distrito</label>
														<br>
														<select class="single-select, form-control" name="codigodistrito">
															<?php require_once 'model/Distrito.php';
																$distrito= new Distrito();
																foreach ($distrito->mostrar() as $uni) {?>
																<option value="<?php echo $uni->id;?>"><?php echo $uni->distrito; ?></option> 
															<?php } ?>
														</select>
														<br>
														<label for="">Telefono</label>
														<input type="number" class="form-control" name="telefono" id="telefono" aria-describedby="helpId" placeholder="Telefono del Funcionario">
														<br>
														</div>
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
								<h3>Lista de Director Distrital</h3>
                                <hr>
                                <table class="table table-striped table-bordered">
                                    <thead class="thead-light">
                                        <tr>
                                            <th>#</th>
                                            <th>Nombre</th>
											<th>C.I.</th>
											<th>Distrito</th>
											<th>Telefono</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php require_once 'model/DirectorDistrital.php';
                                        $a=1;
                                                    $director= new DirectorDistrital();
                                                    foreach ($director->mostrar2() as $dire) {?>
                                        <tr>
                                            <td><?php echo $a++; ?></td>
                                            <td><?php echo $dire->nombres; ?></td>
											<td><?php echo $dire->ci; ?></td>
											<td><?php echo $dire->distrito; ?></td>
											<td><?php echo $dire->telefono; ?></td>
                                            <td>
												<button type="button" onclick="capturar()"  class="btn btn-light px-5 radius-30"><i class='bx bx-pencil mr-1'></i>Editar</button>	 
												<a class="btn btn-light px-5 radius-30" onclick="javascript:return confirm('ESTAS SEGURO DE ELIMINAR ESTE REGISTRO?');" href="index.php?controller=funcionario&action=Estado&id=<?php echo $fun->id;?>"><i class='bx bx-trash mr-1'></i>Eliminar</a></td>
                                            
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
				var id= $(this).find("td:eq(1)").text();
				var nombre= $(this).find("td:eq(2)").text();
				var paterno= $(this).find("td:eq(3)").text();
				var materno= $(this).find("td:eq(4)").text();
				var ci= $(this).find("td:eq(6)").text();
				var rda= $(this).find("td:eq(7)").text();
				var cargo= $(this).find("td:eq(8)").text();
				var nom= $(this).find("td:eq(9)").text();
				var foto= $(this).find("td:eq(10)").text();
				var images = $('.card-body img').attr('src');
				$("#id").val(id);
				$("#paterno").val(paterno);
				$("#nombre").val(nombre);
				$("#materno").val(materno);
				$("#ci").val(ci);
				$("#rda").val(rda);
				$("#codigocargo").val(cargo);
				$("#codigounidad").val(nom);
				$("#imagen").val(foto);
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