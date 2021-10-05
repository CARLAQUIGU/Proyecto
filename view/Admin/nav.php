
<div class="sidebar-wrapper" data-simplebar="true">

			<div class="sidebar-header">
				<div>
					<img class="img-fluid" src="assets/images/esquina.png" alt="" width="150" height="150">
				</div>
				<div>
				</div>
					<div class="toggle-icon ms-auto"><i class='bx bx-arrow-to-left'></i>
				</div>
			</div>
			<!--navigation-->
			<ul class="metismenu" id="menu">
				<li>
				<div class="d-flex flex-column align-items-center text-center">
					<img src='img/<?php echo $_SESSION['foto']; ?>' alt="Admin" class="rounded-circle p-1 bg-darck" width="150" height="140">
						<div class="mt-3">
						<h5><?php 
									echo "<font color='white'>".$_SESSION['nom']."</font>";
								?>
						</h5>
						<p class="mb-1">ADMINISTRADOR</p>
						</div>
					</div>
				</li>
				<li class="menu-label">Elementos</li>
				<li>
					<a href="index.php?controller=distrito&action=indexDistrito">
						<div class="parent-icon"><i class='bx bx-grid-alt'></i>
						</div>
						<div class="menu-title">Distrito</div>
					</a>
				</li>
				<li>
					<a href="index.php?controller=cargo&action=indexCargo">
						<div class="parent-icon"><i class='bx bx-cookie'></i>
						</div>
						<div class="menu-title">Cargo</div>
					</a>
				</li>
				<li>
					<a href="index.php?controller=provincia&action=indexProvincia">
						<div class="parent-icon"><i class='bx bx-cookie'></i>
						</div>
						<div class="menu-title">Provincia</div>
					</a>
				</li>
				<li>
					<a href="index.php?controller=unidadeducativa&action=indexUnidadEducativa">
						<div class="parent-icon"><i class='bx bx-cookie'></i>
						</div>
						<div class="menu-title">Unidad Educativa</div>
					</a>
				</li>
                <li>
					<a href="index.php?controller=funcionario&action=indexfuncionario">
						<div class="parent-icon"><i class='bx bx-cookie'></i>
						</div>
						<div class="menu-title">Funcionario</div>
					</a>
				</li>
				<li>
					<a href="index.php?controller=directordistrital&action=indexDirectorDistrital">
						<div class="parent-icon"><i class='bx bx-cookie'></i>
						</div>
						<div class="menu-title">Directores Distritales</div>
					</a>
				</li>
				<li>
					<a href="index.php?controller=usuario&action=indexUsuario">
						<div class="parent-icon"><i class='bx bx-cookie'></i>
						</div>
						<div class="menu-title">Usuarios</div>
					</a>
				</li>
				<li>
					<a href="index.php?controller=proceso&action=indexProceso">
						<div class="parent-icon"><i class='bx bx-cookie'></i>
						</div>
						<div class="menu-title">Procesos</div>
					</a>
				</li>
			</ul>
			<link rel="icon" href="assets/images/logo.png" type="image/png"  />
			<!--end navigation-->
		</div>