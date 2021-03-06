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
														<h5 class="modal-title">Registro Funcionario</h5>
														<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
													</div>
													<div class="modal-body">
													<form action="index.php?controller=funcionario&action=GuardarFuncionario" method="post" enctype="multipart/form-data">
														<div class="form-group">
														<input type="hidden" name="id" id="id">
														<label for="">Nombre</label>
														<input type="text" class="form-control" name="nombre" id="nombre" aria-describedby="helpId" onblur="mayus(this);" placeholder="Nombre del Funcionario">
														<br>
														<label for="">Paterno</label>
														<input type="text" class="form-control" name="paterno" id="paterno" aria-describedby="helpId"  onblur="mayus(this);" placeholder="Paterno del Funcionario">
														<br>
														<label for="">Materno</label>
														<input type="text" class="form-control" name="materno" id="materno" aria-describedby="helpId" onblur="mayus(this);" placeholder="Materno del Funcionario">
														<br>
														<label for="">C.I.</label>
														<input type="text" class="form-control" name="ci" id="ci" aria-describedby="helpId" placeholder="C.I. del Funcionario">
														<br>
														<label for="">RDA</label>
														<input type="text" class="form-control" name="rda" id="rda" aria-describedby="helpId" placeholder="RDA del Funcionario">
														<br>
														<label class="form-label">Unidad Educativa</label>
														<br>
														<select class="single-select, form-control" name="codigounidad" id="codigounidad">
															<?php require_once 'model/Funcionario.php';
																$unidad= new UnidadEducativa();
																foreach ($unidad->mostrar2() as $uni) {?>
																<option value="<?php echo $uni->id;?>"><?php echo $uni->nombre; ?></option> 
															<?php } ?>
														</select>
														<br>
														<label class="form-label">Cargo</label>
														<br>
														<select class="single-select, form-control" name="codigocargo" id="codigocargo">
															<?php require_once 'model/Funcionario.php';
																$cargo= new Cargo();
																foreach ($cargo->mostrar() as $car) {?>
																<option value="<?php echo $car->id;?>"><?php echo $car->cargo; ?></option> 
															<?php } ?>
														</select>
														<br>
														<label class="form-label">Foto</label>
														<br>
														<input type="file" accept="image/*,txt" class='form-control' name="imagen" id="imagen">
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
								<h3>Lista de Funcionarios</h3>
                                <hr>
                                <table class="table table-striped table-bordered" >
                                    <thead class="thead-light">
                                        <tr>
                                            <th>#</th>
											<th class="hide"></th>
											<th class="hide"></th>
											<th class="hide"></th>
											<th class="hide"></th>
                                            <th>Nombre</th>
											<th>C.I.</th>
											<th>RDA</th>
											<th>Cargo</th>
											<th>Unidad Educativa</th>
											<th>Foto</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody >
                                        <?php require_once 'model/Funcionario.php';
                                        $a=1;
                                                    $funcionario= new Funcionario();
                                                    foreach ($funcionario->mostrar2() as $fun) {?>
                                        <tr>
                                            <td><?php echo $a++; ?></td>
											<td class="hide"><?php echo $fun->id; ?></td>
											<td class="hide"><?php echo $fun->nombre; ?></td>
											<td class="hide"><?php echo $fun->paterno; ?></td>
											<td class="hide"><?php echo $fun->materno; ?></td>
                                            <td><?php echo $fun->nombres; ?></td>
											<td><?php echo $fun->ci; ?></td>
											<td><?php echo $fun->rda; ?></td>
											<td><?php echo $fun->cargo; ?></td>
											<td><?php echo $fun->nom; ?></td>
											<td><img src='img/<?php echo $fun->foto?>' width="100" height="60"></td>
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
				var selec;
				var selec1;
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
				var sel = document.getElementById("codigounidad");
				for(var i = 0; i<sel.length; i++ ){
						var opt=sel[i];
						if(opt.text === nom){
							selec=opt.value;
						}
				}
				var sel1 = document.getElementById("codigocargo");
				for(var i = 0; i<sel1.length; i++ ){
						var opt=sel1[i]; 
						if(opt.text === cargo){
							selec1=opt.value;
						}
				} 
				$("#id").val(id);
				$("#paterno").val(paterno);
				$("#nombre").val(nombre);
				$("#materno").val(materno);
				$("#ci").val(ci);
				$("#rda").val(rda);
				$("#codigocargo").val(selec1);
				$("#codigounidad").val(selec);
				$("#imagen").val(foto);
				$('#exampleVerticallycenteredModal').modal('show');
			});   
		};

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
	<!--app JS-->
	<script src="assets/js/app.js"></script>
	<script>
		new PerfectScrollbar('.dashboard-top-countries');
	</script>
</body>

</html>