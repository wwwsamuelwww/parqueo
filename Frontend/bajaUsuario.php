<!doctype html>
<html lang="en">

<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<!-- Bootstrap CSS -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
		integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
		integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
		crossorigin="anonymous"></script>

	<!-- Styles -->
	<link rel="stylesheet" href="assets/css/style.css">

	<!-- Google fonts -->
	<link href="https://fonts.googleapis.com/css?family=Muli:300,700&display=swap" rel="stylesheet">

	<!-- Ionic icons -->
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.4/font/bootstrap-icons.css">

	<link href="../Frontend/assets/css/sidebars.css" rel="stylesheet">

	<title>Dashboard - Campus Parking</title>
</head>

<body>
	<?php include ("usuariosActivos.php");?>
	<?php include ("confirmacionBajaUsuario.php");?>
	<div class="d-flex" id="content-wrapper">

		<!-- Sidebar -->
		<div id="sidebar-container" class="bg-primary">
    <div class="logo">
        <h4 class="text-light font-weight-bold mb-0">Campus Parking</h4>
    </div>
    <div class="menu">

                <div>
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="white" class="bi bi-car-front-fill" viewBox="0 0 16 16" style="margin-left:5px">
                    <path d="M2.52 3.515A2.5 2.5 0 0 1 4.82 2h6.362c1 0 1.904.596 2.298 1.515l.792 1.848c.075.175.21.319.38.404.5.25.855.715.965 1.262l.335 1.679c.033.161.049.325.049.49v.413c0 .814-.39 1.543-1 1.997V13.5a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1-.5-.5v-1.338c-1.292.048-2.745.088-4 .088s-2.708-.04-4-.088V13.5a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1-.5-.5v-1.892c-.61-.454-1-1.183-1-1.997v-.413a2.5 2.5 0 0 1 .049-.49l.335-1.68c.11-.546.465-1.012.964-1.261a.807.807 0 0 0 .381-.404l.792-1.848ZM3 10a1 1 0 1 0 0-2 1 1 0 0 0 0 2Zm10 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2ZM6 8a1 1 0 0 0 0 2h4a1 1 0 1 0 0-2H6ZM2.906 5.189a.51.51 0 0 0 .497.731c.91-.073 3.35-.17 4.597-.17 1.247 0 3.688.097 4.597.17a.51.51 0 0 0 .497-.731l-.956-1.913A.5.5 0 0 0 11.691 3H4.309a.5.5 0 0 0-.447.276L2.906 5.19Z"/>
                </svg>
                <button class="btn btn-toggle align-items-center rounded collapsed text-white text-decoration-none" data-bs-toggle="collapse" data-bs-target="#home-collapse" aria-expanded="true">
                      Estacionamientos
                  </button>
                  <div class="collapse show" id="home-collapse">
                    <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                      <li><a href="registrarEstacionamiento.php" class="link-dark rounded text-white text-decoration-none">Registrar Estacionamiento</a></li>
                      <li><a href="station_update.php" class="link-dark rounded text-white text-decoration-none">Modificar Estacionameiento</a></li>
                      <li><a href="eliminarEstacionamiento.php" class="link-dark rounded text-white text-decoration-none">Eliminar Estacionamiento</a></li>
                      <li><a href="listaEstacionamiento.php" class="link-dark rounded text-white text-decoration-none">Ver Estacionamientos</a></li>
                    </ul>
                  </div>
                </div>
                <div>
                <div>
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="white" class="bi bi-people-fill" viewBox="0 0 16 16" style="margin-left:5px">
  <path d="M7 14s-1 0-1-1 1-4 5-4 5 3 5 4-1 1-1 1H7Zm4-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6Zm-5.784 6A2.238 2.238 0 0 1 5 13c0-1.355.68-2.75 1.936-3.72A6.325 6.325 0 0 0 5 9c-4 0-5 3-5 4s1 1 1 1h4.216ZM4.5 8a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5Z"/>
</svg>
                <button class="btn btn-toggle align-items-center rounded collapsed text-white text-decoration-none" data-bs-toggle="collapse" data-bs-target="#home-collapse2" aria-expanded="true">
                      Usuarios
                  </button>
                  <div class="collapse show" id="home-collapse2">
                    <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                      <li><a href="registrarUsuario.php" class="link-dark rounded text-white text-decoration-none">Registrar Usuario</a></li>
                      <li><a href="bajaUsuario.php" class="link-dark rounded text-white text-decoration-none">Dar de baja a guardia</a></li>
                      
                    </ul>
                  </div>
                </div>
                    </div>
              
    </div>
</div>

        <div class="w-100">
			<!-- Navbar -->
			<nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
				<div class="container">

					<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
						aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
						<span class="navbar-toggler-icon"></span>
					</button>

					<div class="collapse navbar-collapse" id="navbarSupportedContent">
						<form class="form-inline position-relative d-inline-block my-2">

						</form>
						<ul class="navbar-nav ml-auto mt-2 mt-lg-0">

						</ul>
					</div>
				</div>
			</nav>
			<!-- Fin Navbar -->

			<!-- Page Content -->
			<div id="content" style="background-color: white;" class="bg-grey w-100">
				<div style="border-bottom: black">
					<h1 class="text-center" style="margin-bottom: 30px;">
						DAR DE BAJA A GUARDIA
					</h1>
				</div>

				<div class="container-sm" style="display: flex; justify-content: center;">

						<?php
								
							$idUsuario = '';
							if($_GET){
								$idUsuario = $_GET['idUsuario'];
							}
		
						?>
		

					<form action="bajaUsuario.php" method="post" style="width: 500px;">
						<div class="row" style="margin-bottom: 10px;">
							<div class="col-md-3">
								<label class="form-label">C.I:</label>
							</div>
							<div class="col-md-9">
								<input class="form-control" type="text" name="ci" id="ci" value="<?php echo $idUsuario;?>" placeholder="Buscar por Ci">
								<a type="button" class="text-decoration-none" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
									Seleccionar
								</a>
							</div>
						</div>
						
					</form>
					<br>
				</div>

				<div class="container-sm" style="display: flex; justify-content: center;">

					

					<form action="accionBajaUsuario.php" method="post" style="width: 500px;" id='bajaUsuario'>

							
					</form>

					
				</div>

				<div class="container-sm" style="display: flex; justify-content: center;">
							
							<?php
								
								/*$ciConfirmacion = '';
								if($_POST){
									$ciConfirmacion = $_POST['ci'];
								}
								echo $ciConfirmacion;*/
								
							?>
					
						<!--<div style="justify-content: center; display: flex">
							<button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#ventacaConfirmacion">Dar de baja</button>
						</div>-->
					
				</div>

				<!--<form action="bajaUsuario.php" method="post">
				<input type="text" name="prueba" id="prueba" value="prueba">
				<button type="submit">enviar</button>
			</form>

			<?php //$prueba = $_POST['prueba'];
			//echo $prueba;?>-->

			</div>
			
			
			

			
			<script>

				getCodigos()
				document.getElementById("ci").addEventListener("keyup", getCodigos)

				function getCodigos() {

				let inputCP = document.getElementById("ci").value
				let lista = document.getElementById("bajaUsuario")

		

				let url = "contenidoBajaUsuario.php"
				let formData = new FormData()
				formData.append("ci", inputCP)

				fetch(url, {
					method: "POST",
					body: formData,
					mode: "cors" //Default cors, no-cors, same-origin
				}).then(response => response.json())
					.then(data => {
						lista.innerHTML = data
					})
					.catch(err => console.log(err))
	
				}
        	</script>

</body>

</html>