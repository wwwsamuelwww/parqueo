<?php
    include_once '../Backend/conectar.php';
	$conexion = conexion();
	
    
?>
<!doctype html>
<html lang="en">

<head>
	<title>Login</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" href="https://unicons.iconscout.com/release/v2.1.9/css/unicons.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/css/bootstrap.min.css">
	<link rel="stylesheet" href="./assets/css/stylelogin.css">
</head>

<body>
	<div class="section">
		<div class="container">
			<div class="row full-height justify-content-center">
				<div class="col-12 text-center align-self-center py-5">
					<div class="section pb-5 pt-5 pt-sm-2 text-center">

						<input class="checkbox" type="checkbox" id="reg-log" name="reg-log" />
						<label for="reg-log"></label>
						<h2>CAMPUS PARKING</h2>
						<div class="card-3d-wrap mx-auto">
							<div class="card-3d-wrapper">
								<div class="card-front">
									<div class="center-wrap">
										<div class="section text-center">
											<h4 class="mb-4 pb-3">INICIAR SESION</h4>
												<?php include_once "../Backend/prq_login.php";
												?>										
											<form method="post" action="">
												<div class="form-group">
													<input type="email" class="form-style" placeholder="Correo electronico" name="correo">
													<i class="input-icon uil uil-envelope"></i>
												</div>
												<div class="form-group mt-2">
													<input type="password" class="form-style" placeholder="Contraseña" name="password">
													<i class="input-icon uil uil-lock-alt"></i>
												</div>

												<input name="ingresar" class=" btn mt-2 text-center justify-content-center" type="submit" value="INGRESAR" >
											</form>

										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>

</html>