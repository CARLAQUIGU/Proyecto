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
							<div class="col">
										<!-- Button trigger modal -->
										<button type="button" class="btn btn-light" data-bs-toggle="modal" data-bs-target="#exampleVerticallycenteredModal">Registrar</button>
										<!-- Modal -->
										<div class="modal fade" id="exampleVerticallycenteredModal" tabindex="-1" aria-hidden="true">
											<div class="modal-dialog modal-dialog-centered">
												<div class="modal-content">
													<div class="modal-header">
														<h5 class="modal-title">Registro de Unidad Educativa</h5>
														<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
													</div>
													<div class="modal-body">
													<form action="index.php?controller=unidadeducativa&action=GuardarUnidadEducativa" method="post" class="form-control">
														<div class="form-group">
														<input type="hidden" name="id" id="id">
														<label for="">Codigo Sie</label>
														<input type="text" class="form-control" name="codigosie" id="codigosie" aria-describedby="helpId" placeholder="Nombre del Distrito">
														<br>
														<label for="">Nombre</label>
														<input type="text" class="form-control" name="nombre" id="nombre" aria-describedby="helpId" placeholder="Nombre del Distrito">
														<br>
														<label for="">Direccion</label>
														<input type="text" class="form-control" name="direccion" id="direccion" aria-describedby="helpId" placeholder="Direccion">
														<br>
														<label for="">Espacio</label>
														<br>
														<select name="espacio" id="espacio" class="form-control">
															<option value="R">Rural</option>
															<option value="U">Urbano</option>
														</select>
														<br>
														<label for="">Tipo</label>
														<br>
														<select name="tipo" id="tipo" class="form-control">
															<option value="Fiscal">Fiscal</option>
															<option value="Convenio">Convenio</option>
														</select>
														<br>
														<label class="form-label">Distrito</label>
														<br>
														<?php
														if($_SESSION['nivel']==2){?>
														<select class="single-select, form-control" name="codigodistrito" id="codigodistrito">
														<option value="<?php echo $_SESSION['id_dis'];?>"><?php echo $_SESSION['distrito']; ?></option> 
														</select>
														<?php 	
														}else{?>
															<select class="single-select, form-control" name="codigodistrito" id="codigodistrito">
															<?php require_once 'model/UnidadEducativa.php';
																$distrito= new Distrito();
																foreach ($distrito->mostrar() as $uni) {?>
																<option value="<?php echo $uni->id;?>"><?php echo $uni->distrito; ?></option> 
															<?php } ?>
															</select>
														<?php
														}
														?>
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
							<div><a class="btn btn-light px-5 radius-10"  style="float: right;" href="view/Admin/reportes/reporteUnidad.php"><i class='bx bx-file mr-1'></i>Reporte</a></div>
								<h3>Lista de Unidad Educativa</h3>
                                <hr>
                                <table class="table table-striped table-bordered" id="example" name='example'>
                                    <thead class="thead-light">
                                        <tr>
                                            <th>#</th>
											<th>Codigo Sie</th>
                                            <th>Nombre</th>
											<th>Direccion</th>
											<th>Espacio</th>
											<th>Tipo</th>
                                            <th>Distrito</th>
											<TH class='hide'></TH>
											<th>Accion</th>
                                        </tr>
                                    </thead>
                                    <tbody>
									<?php require_once 'model/UnidadEducativa.php';
                                        $a=1;
                                            $unidad= new UnidadEducativa();
											$unidadsession=$_SESSION['id_dis'];
											if($_SESSION['nivel'] == 2){
                                            foreach ($unidad->mostrar2() as $dist) {
											if($dist->id_distrito === $unidadsession){
											?>	
                                        <tr>
                                            <td><?php echo $a++; ?></td>
											<td><?php echo $dist->cod_sie; ?></td>
                                            <td><?php echo $dist->nombre; ?></td>
											<td><?php echo $dist->direccion; ?></td>
											<td><?php echo $dist->espacio; ?></td>
											<td><?php echo $dist->tipo; ?></td>
											<td><?php echo $dist->distrito; ?></td>
											<td class='hide'><?php echo $dist->id; ?></td>
                                            <td>
											<button type="button" onclick="capturar()"  class="btn btn-light px-5 radius-30"><i class='bx bx-pencil mr-1'></i>Editar</button>	 
											</td>
                                            </td>
                                        </tr>
                                    <?php } 
										}
									}else{
										foreach ($unidad->mostrar2() as $dist) {
										?>
										 <tr>
                                            <td><?php echo $a++; ?></td>
											<td><?php echo $dist->cod_sie; ?></td>
                                            <td><?php echo $dist->nombre; ?></td>
											<td><?php echo $dist->direccion; ?></td>
											<td><?php echo $dist->espacio; ?></td>
											<td><?php echo $dist->tipo; ?></td>
											<td><?php echo $dist->distrito; ?></td>
											<td class='hide'><?php echo $dist->id; ?></td>
                                            <td>
											<button type="button" onclick="capturar()"  class="btn btn-light px-5 radius-30"><i class='bx bx-pencil mr-1'></i>Editar</button>	 
											<a class="btn btn-light px-5 radius-30" onclick="javascript:return confirm('ESTAS SEGURO DE ELIMINAR ESTE REGISTRO?');" href="index.php?controller=unidadeducativa&action=Estado&id=<?php echo $dist->id;?>"><i class='bx bx-trash mr-1'></i>Eliminar</a></td>
                                            </td>
                                        </tr>
										<?php
										}
									}
									?>
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
				var codigosie= $(this).find("td:eq(1)").text();
				var nombre= $(this).find("td:eq(2)").text();
				var direccion= $(this).find("td:eq(3)").text();
				var espacio= $(this).find("td:eq(4)").text();
				var tipo= $(this).find("td:eq(5)").text();
				var distrito= $(this).find("td:eq(6)").text();
				var id= $(this).find("td:eq(7)").text();	
				var sel = document.getElementById("codigodistrito");
				for(var i = 0; i<sel.length; i++ ){
						var opt=sel[i];
						if(opt.text === distrito){
							selec=opt.value;
						}
				}
				$("#id").val(id);
				$("#codigosie").val(codigosie);
				$("#nombre").val(nombre);
				$("#direccion").val(direccion);
				$("#espacio").val(espacio);
				$("#tipo").val(tipo);
				$("#codigodistrito").val(selec);
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