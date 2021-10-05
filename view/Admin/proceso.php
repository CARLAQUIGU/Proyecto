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
th {
  text-align: center;
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
					<div class="col">
						<div class="card radius-10">
							<div class="card-body">
							<div class="col">
										<div>
										<a class="btn btn-light px-5 radius-30"  href="index.php?controller=proceso&action=form"><i class='bx bx-trash mr-1'></i>Registrar</a></td>
										<div><a class="btn btn-light px-5 radius-10"  style="float: right;" href="view/Admin/reportes/reporteProceso.php"><i class='bx bx-file mr-1'></i>Reporte</a></div>

										</div>
									</div>
							</div>
						</div>
					</div>
						<h6 class="mb-0 text-uppercase">Procesos</h6>
						<hr/>
						<div class="card">
							<div class="card-body">
								<ul class="nav nav-tabs" role="tablist">
									<li class="nav-item" role="presentation">
										<a class="nav-link active" data-bs-toggle="tab" href="#primaryhome" role="tab" aria-selected="true">
											<div class="d-flex align-items-center">
												<div class="tab-icon"><i class='bx bx-home font-18 me-1'></i>
												</div>
												<div class="tab-title">Diciplinario</div>
											</div>
										</a>
									</li>
									<li class="nav-item" role="presentation">
										<a class="nav-link" data-bs-toggle="tab" href="#primaryprofile" role="tab" aria-selected="false">
											<div class="d-flex align-items-center">
												<div class="tab-icon"><i class='bx bx-user-pin font-18 me-1'></i>
												</div>
												<div class="tab-title">Penal</div>
											</div>
										</a>
									</li>
								</ul>
								<div class="tab-content py-3">
									<div class="tab-pane fade show active table-responsive" id="primaryhome" role="tabpanel">
									<table class="table table-striped table-bordered" name='example' id="example" >
										<thead class="thead-light">
											<tr>
												<th>#</th>
												<th>Nombre y Cedula</th>
												<th>Unidad Educativa</th>
												<th>Distrito</th>
												<th>Fecha y Resolucion de Auto Inicial</th>
												<th>Falta</th>
												<th>Fecha y Resolucion de Auto Final</th>
												<th>Sancion</th>
												<th>Penal</th>
												<th>Action</th>
											</tr>
										</thead>
										<tbody >
										<?php  require_once 'model/Proceso.php';
                                        $b=1;
											$proceso= new Proceso();
											$distrit=$_SESSION['id_dis'];
											if($_SESSION['nivel'] == 2){
											foreach ($proceso->mostrar2() as $pro) {
											if($pro->id_distrito === $distrit){
												$a="";
											$proc=new Proceso();
											$id_p=$pro->id;
											$dato=$proc->pdo->query('SELECT p.id
											from detalle_proceso d
											inner join proceso p on d.id_proceso=p.id
											inner join proceso_penal pro on pro.id=p.id_proceso_penal
											where pro.estado=2  and p.id='. $id_p.';');
											$total=$dato->rowCount();
											$datos=$proc->pdo->query('SELECT concat(f.nombre," ",f.paterno," ",f.materno," (",f.ci,")","")as nombre
												from detalle_proceso d
												inner join funcionario f on d.id_funcionario=f.id
												inner join proceso p on d.id_proceso=p.id
												inner join proceso_penal pro on pro.id=p.id_proceso_penal
												where pro.estado=2 and p.id='. $id_p.';');
												$nombres=$datos->fetchAll(PDO::FETCH_COLUMN);
											if($total>1){
												for ($i=0; $i < $total; $i++) { 
													$a=$a.$nombres[$i]."*";
												}
											}else{
												$a=$a.$nombres[0];
											}
											?>	
                                         <tr>
												<td><?php echo $pro->id; ?></td>
												<td><?php echo $a; ?></td>
												<td><?php echo $pro->nombre; ?></td>
												<td><?php echo $pro->distrito; ?></td>
												<td><?php echo $pro->auto_ini; ?></td>
												<td><?php echo $pro->falta; ?></td>
												<td><?php echo $pro->auto_fin; ?></td>
												<td><?php echo $pro->sancion; ?></td>
												<td><?php echo $pro->penal; ?></td>
												<td>
													<button type="button" onclick="capturar()"  class="btn btn-light px-5 radius-30"><i class='bx bx-pencil mr-1'></i></button>	 
													<a class="btn btn-light px-5 radius-30" onclick="javascript:return confirm('ESTAS SEGURO DE ELIMINAR ESTE REGISTRO?');" href="index.php?controller=funcionario&action=Estado&id=<?php echo $fun->id;?>"><i class='bx bx-trash mr-1'></i></a></td>
												</td>
											</tr>
                                    <?php 
										  } 
										}
									}else{
										foreach ($proceso->mostrar2() as $pro) {
											$a="";
											$proc=new Proceso();
											$id_p=$pro->id;
											$dato=$proc->pdo->query('SELECT p.id
											from detalle_proceso d
											inner join proceso p on d.id_proceso=p.id
											inner join proceso_penal pro on pro.id=p.id_proceso_penal
											where pro.estado=2  and p.id='. $id_p.';');
											$total=$dato->rowCount();
											$datos=$proc->pdo->query('SELECT concat(f.nombre," ",f.paterno," ",f.materno," (",f.ci,")","")as nombre
												from detalle_proceso d
												inner join funcionario f on d.id_funcionario=f.id
												inner join proceso p on d.id_proceso=p.id
												inner join proceso_penal pro on pro.id=p.id_proceso_penal
												where pro.estado=2 and p.id='. $id_p.';');
												$nombres=$datos->fetchAll(PDO::FETCH_COLUMN);
											if($total>1){
												for ($i=0; $i < $total; $i++) { 
													$a=$a.$nombres[$i]."-";
												}
											}else{
												$a=$a.$nombres[0];
											}
										?>
										<tr>
												<td><?php echo $pro->id; ?></td>
												<td><?php echo $a; ?></td>
												<td><?php echo $pro->nombre; ?></td>
												<td><?php echo $pro->distrito; ?></td>
												<td><?php echo $pro->auto_ini; ?></td>
												<td><?php echo $pro->falta; ?></td>
												<td><?php echo $pro->auto_fin; ?></td>
												<td><?php echo $pro->sancion; ?></td>
												<td><?php echo $pro->penal; ?></td>
												<td>
													<button type="button" onclick="capturar()"  class="btn btn-light px-5 radius-30"><i class='bx bx-pencil mr-1'></i></button>	 
													<a class="btn btn-light px-5 radius-30" onclick="javascript:return confirm('ESTAS SEGURO DE ELIMINAR ESTE REGISTRO?');" href="index.php?controller=funcionario&action=Estado&id=<?php echo $fun->id;?>"><i class='bx bx-trash mr-1'></i></a></td>
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
									<div class="tab-pane fade table-responsive" id="primaryprofile" role="tabpanel">
									<table class="table table-striped table-bordered" name='example' id="example" >
										<thead class="thead-light">
											<tr>
												<th>#</th>
												<th>Nombre y Cedula</th>
												<th>Unidad Educativa</th>
												<th>Distrito</th>
												<th>Fecha y Resolucion de Auto Inicial</th>
												<th>Falta</th>
												<th>Fecha y Resolucion de Auto Final</th>
												<th>Sancion</th>
												<th>Fiscal</th>
												<th>Nro de Caso</th>
												<th>Action</th>
											</tr>
										</thead>
										<tbody >
											<?php require_once 'model/Proceso.php';
										    $proceso= new Proceso();			
											$distrit=$_SESSION['id_dis'];
											if($_SESSION['nivel'] == 2){
												foreach ($proceso->mostrar3() as $pro) {
												if($pro->id_distrito === $distrit){
													$a="";
													$proc=new Proceso();
													$id_p=$pro->id;
													$dato=$proc->pdo->query('SELECT p.id
													from detalle_proceso d
													inner join proceso p on d.id_proceso=p.id
													inner join proceso_penal pro on pro.id=p.id_proceso_penal
													where pro.estado=1  and p.id='. $id_p.';');
													$total=$dato->rowCount();
													$datos=$proc->pdo->query('SELECT concat(f.nombre," ",f.paterno," ",f.materno," (",f.ci,")"," - ")as nombre
														from detalle_proceso d
														inner join funcionario f on d.id_funcionario=f.id
														inner join proceso p on d.id_proceso=p.id
														inner join proceso_penal pro on pro.id=p.id_proceso_penal
														where pro.estado=1 and p.id='. $id_p.';');
														$nombres=$datos->fetchAll(PDO::FETCH_COLUMN);
													if($total>1){
														for ($i=0; $i < $total; $i++) { 
															$a=$a.$nombres[$i];
														}
													}else{
														$a=$a.$nombres[0];
													}
													?>
											<tr>
												<td><?php echo $pro->id; ?></td>
												<td><?php echo $a; ?></td>
												<td><?php echo $pro->nombre; ?></td>
												<td><?php echo $pro->distrito; ?></td>
												<td><?php echo $pro->auto_ini; ?></td>
												<td><?php echo $pro->falta; ?></td>
												<td><?php echo $pro->auto_fin; ?></td>
												<td><?php echo $pro->sancion; ?></td>
												<td><?php echo $pro->fiscal?></td>
												<td><?php echo $pro->nro_caso?></td>
												<td>
													<button type="button" onclick="capturar()"  class="btn btn-light px-5 radius-30"><i class='bx bx-pencil mr-1'></i></button>	 
													<a class="btn btn-light px-5 radius-30" onclick="javascript:return confirm('ESTAS SEGURO DE ELIMINAR ESTE REGISTRO?');" href="index.php?controller=funcionario&action=Estado&id=<?php echo $fun->id;?>"><i class='bx bx-trash mr-1'></i></a></td>
												</td>
											</tr>
										<?php 
											 }
											}
										  }else{
											foreach ($proceso->mostrar3() as $pro) {
											$a="";
											$proc=new Proceso();
											$id_p=$pro->id;
											$dato=$proc->pdo->query('SELECT p.id
											from detalle_proceso d
											inner join proceso p on d.id_proceso=p.id
											inner join proceso_penal pro on pro.id=p.id_proceso_penal
											where pro.estado=1  and p.id='. $id_p.';');
											$total=$dato->rowCount();
											$datos=$proc->pdo->query('SELECT concat(f.nombre," ",f.paterno," ",f.materno," (",f.ci,")"," - ")as nombre
												from detalle_proceso d
												inner join funcionario f on d.id_funcionario=f.id
												inner join proceso p on d.id_proceso=p.id
												inner join proceso_penal pro on pro.id=p.id_proceso_penal
												where pro.estado=1 and p.id='. $id_p.';');
												$nombres=$datos->fetchAll(PDO::FETCH_COLUMN);
											if($total>1){
												for ($i=0; $i < $total; $i++) { 
													$a=$a.$nombres[$i];
												}
											}else{
												$a=$a.$nombres[0];
											}?>
												<tr>
												<td><?php echo $pro->id; ?></td>
												<td><?php echo $a ?></td>
												<td><?php echo $pro->nombre; ?></td>
												<td><?php echo $pro->distrito; ?></td>
												<td><?php echo $pro->auto_ini; ?></td>
												<td><?php echo $pro->falta; ?></td>
												<td><?php echo $pro->auto_fin; ?></td>
												<td><?php echo $pro->sancion; ?></td>
												<td><?php echo $pro->fiscal;?></td>
												<td><?php echo $pro->nro_caso?></td>
												<td>
													<button type="button" onclick="capturar()"  class="btn btn-light px-5 radius-30"><i class='bx bx-pencil mr-1'></i></button>	 
													<a class="btn btn-light px-5 radius-30" onclick="javascript:return confirm('ESTAS SEGURO DE ELIMINAR ESTE REGISTRO?');" href="index.php?controller=funcionario&action=Estado&id=<?php echo $fun->id;?>"><i class='bx bx-trash mr-1'></i></a></td>
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