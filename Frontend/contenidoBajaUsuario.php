<?php

require_once '../Backend/conectar.php';
$conn = conexion();

$campo = isset($_POST['ci']) ? $conn->real_escape_string($_POST['ci']) : null;

$sql = "SELECT * FROM `USUARIOS` WHERE `CI` LIKE '" . $campo . "' AND `ESTADO` LIKE 1;";
$resultado = $conn->query($sql);
$num_rows = $resultado->num_rows;

$cargoSql = "SELECT `NOMBREROL` FROM `USUARIOS`, `ROL` WHERE `CI` LIKE '" . $campo . "' AND `USUARIOS`.`IDROL` LIKE `ROL`.IDROL;";
$cargo = $conn->query($cargoSql);
$cargoInput = $cargo->fetch_assoc();

$html = '';

if($num_rows > 0){
    
         
    $row = $resultado->fetch_assoc();

        $html .= '<div class="row" style="margin-bottom: 10px;">';
		$html .= '<div class="col-md-3">';
		$html .= '<label class="form-label">Nombres:</label>';
		$html .= '</div>';
		$html .= '<div class="col-md-9">';
		$html .= '<input class="form-control" value="' . $row["NOMBRES"] . '" disabled="">';
		$html .= '</div>';
		$html .= '</div>';

		$html .= '<div class="row" style="margin-bottom: 10px;">';
		$html .= '<div class="col-md-3">';
		$html .= '<label class="form-label">Apellidos:</label>';
		$html .= '</div>';
		$html .= '<div class="col-md-9">';
		$html .= '<input class="form-control" value="' . $row["APELLIDOS"] . '" disabled="">';
		$html .= '</div>';
		$html .= '</div>';

		$html .= '<div class="row" style="margin-bottom: 10px;">';
		$html .= '<div class="col-md-3">';
		$html .= '<label class="form-label">Telefono:</label>';
		$html .= '</div>';
		$html .= '<div class="col-md-9">';
		$html .= '<input class="form-control" value="' . $row["TELEFONO"] . '" disabled="">';
		$html .= '</div>';
		$html .= '</div>';

		$html .= '<div class="row" style="margin-bottom: 10px;">';
		$html .= '<div class="col-md-3">';
		$html .= '<label class="form-label">Direccion:</label>';
		$html .= '</div>';
		$html .= '<div class="col-md-9">';
		$html .= '<input class="form-control" value="' . $row["DIRECCION"] . '" disabled="">';
		$html .= '</div>';
		$html .= '</div>';


		$html .= '<div class="row" style="margin-bottom: 10px;">';
		$html .= '<div class="col-md-3">';
		$html .= '<label class="form-label">Correo electronico:</label>';
		$html .= '</div>';
		$html .= '<div class="col-md-9">';
		$html .= '<input class="form-control" value="' . $row["EMAIL"] . '" disabled="">';
		$html .= '</div>';
		$html .= '</div>';

		$html .= '<div class="row" style="margin-bottom: 40px;">';
		$html .= '<div class="col-md-3">';
		$html .= '<label class="form-label">Cargo:</label>';
		$html .= '</div>';
		$html .= '<div class="col-md-9">';
		$html .= '<input class="form-control" value="' . $cargoInput["NOMBREROL"] . '" disabled="">';
		$html .= '</div>';
		$html .= '</div>';

		$html .= '<div style="justify-content: center; display: flex">';
		$html .= '<!-- Button trigger modal -->
		<button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal">
		  Dar de baja
		</button>
		
		<!-- Modal -->
		<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
		  <div class="modal-dialog">
			<div class="modal-content">
			  <div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Confirmación</h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			  </div>
			  <div class="modal-body">
			  	¿Estas seguro(a) de confirmar la acción?
			  </div>
			  <div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
				<a class="btn btn-primary" href="accionBajaUsuario.php?ciBaja=' . $row["CI"] . '" >Aceptar</a>
			  </div>
			</div>
		  </div>
		</div>';
		$html .= '</div>';
    
} else {
        $html .= '<div class="row" style="margin-bottom: 10px;">';
		$html .= '<div class="col-md-3">';
		$html .= '<label class="form-label">Nombres:</label>';
		$html .= '</div>';
		$html .= '<div class="col-md-9">';
		$html .= '<input class="form-control" disabled="">';
		$html .= '</div>';
		$html .= '</div>';

		$html .= '<div class="row" style="margin-bottom: 10px;">';
		$html .= '<div class="col-md-3">';
		$html .= '<label class="form-label">Apellidos:</label>';
		$html .= '</div>';
		$html .= '<div class="col-md-9">';
		$html .= '<input class="form-control" disabled="">';
		$html .= '</div>';
		$html .= '</div>';

		$html .= '<div class="row" style="margin-bottom: 10px;">';
		$html .= '<div class="col-md-3">';
		$html .= '<label class="form-label">Telefono:</label>';
		$html .= '</div>';
		$html .= '<div class="col-md-9">';
		$html .= '<input class="form-control" disabled="">';
		$html .= '</div>';
		$html .= '</div>';

		$html .= '<div class="row" style="margin-bottom: 10px;">';
		$html .= '<div class="col-md-3">';
		$html .= '<label class="form-label">Direccion:</label>';
		$html .= '</div>';
		$html .= '<div class="col-md-9">';
		$html .= '<input class="form-control" disabled="">';
		$html .= '</div>';
		$html .= '</div>';


		$html .= '<div class="row" style="margin-bottom: 10px;">';
		$html .= '<div class="col-md-3">';
		$html .= '<label class="form-label">Correo electronico:</label>';
		$html .= '</div>';
		$html .= '<div class="col-md-9">';
		$html .= '<input class="form-control" disabled="">';
		$html .= '</div>';
		$html .= '</div>';

		$html .= '<div class="row" style="margin-bottom: 40px;">';
		$html .= '<div class="col-md-3">';
		$html .= '<label class="form-label">Cargo:</label>';
		$html .= '</div>';
		$html .= '<div class="col-md-9">';
		$html .= '<input class="form-control" disabled="">';
		$html .= '</div>';
		$html .= '</div>';

		$html .= '<div style="justify-content: center; display: flex">';
		$html .= '<!-- Button trigger modal -->
		<button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal">
		  Dar de baja
		</button>
		
		<!-- Modal -->
		<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
		  <div class="modal-dialog">
			<div class="modal-content">
			  <div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Error</h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			  </div>
			  <div class="modal-body">
			  	¡Error, usuario no encontrado!
			  </div>
			  <div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Volver</button>
			  </div>
			</div>
		  </div>
		</div>';
		$html .= '</div>';
}


echo json_encode($html, JSON_UNESCAPED_UNICODE);