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
	<!-- loader-->
	<link href="assets/css/pace.min.css" rel="stylesheet" />
	<script src="assets/js/pace.min.js"></script>
	<!-- Bootstrap CSS -->
	<link href="assets/css/bootstrap.min.css" rel="stylesheet">
	<link href="assets/css/app.css" rel="stylesheet">
	<link href="assets/css/icons.css" rel="stylesheet">
	<title>Dashtrans - Bootstrap5 Admin Template</title>
</head>
<style>
	body {
		background-color: white;
	}

	.bg-pro {
		background-color: hsl(205, 56%, 26%);
	}
</style>

<body class="bg-theme bg-theme1">
	<div class="container-fluid p-6 bg-pro text-white text-center">
		<div>
			<img class="img-fluid" src="assets/images/encabezado.png" alt="" width="1100" height="500">
		</div>
	</div>
	<!--wrapper-->
	<div class="wrapper">
		<div class=" my-lg-5">
			<div class="container-fluid">
				<div class="row row-cols-1 row-cols-lg-2 row-cols-xl-3">
					<div class="col mx-auto">
						<div class="card">
							<div class="card-body">
								<div class="border p-5 rounded">
									<div class="d-grid">
										<img img src="assets/images/logo.png" class="mx-auto d-block" style="width:20%">
									</div>
									<div class="form-body">
										<form class="row g-3" action="index.php?controller=login&action=login" method="POST">
											<div class="col-12">
												<label for="inputEmailAddress" class="form-label">USUARIO</label>
												<input type="text" class="form-control" id="usuario" name="usuario" placeholder="Dijite su Usuario">
											</div>
											<div class="col-12">
												<label for="inputChoosePassword" class="form-label">CONTRASEÑA</label>
												<div class="input-group" id="show_hide_password">
													<input type="password" class="form-control border-end-0" id="password" name="password" placeholder="Dijite su contraseña"> <a href="javascript:;" class="input-group-text bg-transparent"><i class='bx bx-hide'></i></a>
												</div>
											</div>
												<div class="col-12">
													<div class="d-grid">
														<button type="submit" class="btn btn-primary"><i class="bx bxs-lock-open"></i>Sign in</button>
													</div>
													<?php
													if (isset($_REQUEST['res'])) {
														if ($_REQUEST['res'] == 1) {
													?>
															<div class="alert alert-danger alert-dismissible fade show text-center" role="alert">
																Verifica datos de Usuario y Password.
															</div>

														<?php
														} else if ($_REQUEST['res'] == 2) {
														?>
															<div class="alert alert-danger alert-dismissible fade show text-center" role="alert">
																No se Inicio
															</div>
													<?php
														}
													}
													?>
												</div>
											<div>
											</div>
										</form>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!--end row-->
			</div>
		</div>
	</div>
	<!--end wrapper-->
	<!-- Bootstrap JS -->
	<script src="assets/js/bootstrap.bundle.min.js"></script>
	<!--plugins-->
	<script src="assets/js/jquery.min.js"></script>
	<script src="assets/plugins/simplebar/js/simplebar.min.js"></script>
	<script src="assets/plugins/metismenu/js/metisMenu.min.js"></script>
	<script src="assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js"></script>
	<!--Password show & hide js -->
	<script>
		$(document).ready(function() {
			$("#show_hide_password a").on('click', function(event) {
				event.preventDefault();
				if ($('#show_hide_password input').attr("type") == "text") {
					$('#show_hide_password input').attr('type', 'password');
					$('#show_hide_password i').addClass("bx-hide");
					$('#show_hide_password i').removeClass("bx-show");
				} else if ($('#show_hide_password input').attr("type") == "password") {
					$('#show_hide_password input').attr('type', 'text');
					$('#show_hide_password i').removeClass("bx-hide");
					$('#show_hide_password i').addClass("bx-show");
				}
			});
		});
	</script>
	<!--app JS-->
	<script src="assets/js/app.js"></script>
</body>


</html>