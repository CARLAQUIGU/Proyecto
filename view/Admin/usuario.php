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
	<link rel="icon" href="assets/images/favicon-32x32.png" type="image/png" />
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
	<title>Dashtrans - Bootstrap5 Admin Template</title>
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
							<div class="col">
										<!-- Button trigger modal -->
										<button type="button" class="btn btn-light" data-bs-toggle="modal" data-bs-target="#exampleVerticallycenteredModal">Registrar</button>
										<!-- Modal -->
										<div class="modal fade" id="exampleVerticallycenteredModal" tabindex="-1" aria-hidden="true">
											<div class="modal-dialog modal-dialog-centered">
												<div class="modal-content">
													<div class="modal-header">
														<h5 class="modal-title">Registro de Usuario</h5>
														<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
													</div>
													<div class="modal-body">
													<form action="index.php?controller=login&action=GuardarUsuario" method="post" enctype='multipart/form-data'>
														<div class="form-group">
															<input type="hidden" name="id" id="id">
															<label for="">Director Distrital</label>
															<select class="single-select, form-control" name="codigodirector" id="codigodirector">
															<?php require_once 'model/DirectorDistrital.php';
																$cargo= new DirectorDistrital();
																foreach ($cargo->mostrar3() as $car) {?>
																<option value="<?php echo $car->id;?>"><?php echo $car->nombres; ?></option> 
															<?php } ?>
															</select>
															<br>
															<label for="">Usuario</label>
															<input type="text" class="form-control" name="usuario" id="usuario" aria-describedby="helpId" placeholder="Usuario">
															<br>
															<label for="">Contraseña</label>
															<input type="password" class="form-control" name="pasw" id="pasw" aria-describedby="helpId" placeholder="Contraseña">
															<br>
															<label for="">Nivel</label>
															<select name="nivel" id="nivel" class="form-control">
																<option value="1">Administrador</option>
																<option value="2">Director Distrital</option>
															</select>
															<br>
															<label class="form-label">Foto</label>
															<br>
															<input type="file" accept="image/*,txt" class='form-control' name="imagen" id="imagen">
															<br>
														</div>
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
							<div class="card-body table-responsive">
								<div><a class="btn btn-light px-5 radius-10"  style="float: right;" href="view/Admin/reportes/reporteUsuario.php"><i class='bx bx-file mr-1'></i>Reporte</a></div>
								<h3>Lista de Usuarios</h3>
                                <hr>
                                <table class="table table-light">
                                    <thead class="thead-light">
                                        <tr>
                                            <th>#</th>
                                            <th>Nombre</th>
											<th>Usuario</th>
											<th>Nivel</th>
											<th>foto</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php require_once 'model/Usuario.php';
                                        $a=1;
                                                    $user= new Usuario();
                                                    foreach ($user->mostrar2() as $usuario) {?>
                                        <tr>
                                            <td><?php echo $a++; ?></td>
                                            <td><?php echo $usuario->nombres; ?></td>
											<td><?php echo $usuario->usuario; ?></td>
											<td><?php if($usuario->nivel==1){
													echo 'Administrador';
											}else{
												echo 'Director';
											}
											?></td>
											<td><img src='img/<?php echo $usuario->foto?>' width="100" height="90"></td>
											<td>
													<button type="button" onclick="capturar()"  class="btn btn-light px-5 radius-30"><i class='bx bx-pencil mr-1'></i></button>	 
													<a class="btn btn-light px-5 radius-30" onclick="javascript:return confirm('ESTAS SEGURO DE ELIMINAR ESTE REGISTRO?');" href="index.php?controller=funcionario&action=Estado&id=<?php echo $fun->id;?>"><i class='bx bx-trash mr-1'></i></a></td>
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