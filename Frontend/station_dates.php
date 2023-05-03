<?php /////// CONEXIÓN A LA BASE DE DATOS ///////// 
require_once '../Backend/conectar.php';
$conn = conexion();

/* Un arreglo de las columnas a mostrar en la tabla */

$campo = isset($_POST['busqueda']) ? $conn->real_escape_string($_POST['busqueda']) : null;
if ($campo != null) {
    $sql = "SELECT * FROM estacionamiento WHERE nombre LIKE '%".$campo."%'";
            
}else{
    $sql = "SELECT * FROM estacionamiento";
}
$resultado = mysqli_query($conn,$sql);
$num_rows = $resultado->num_rows;

$html = '';

if($num_rows > 0){
    while ($row = $resultado->fetch_assoc()) {
        $html .= '<tr>';
        $html .= '<td><a href= "station_update.php?idDeEst=' . $row['id'] . '" style="text-decoration:none;color:black;" >' . $row['nombre'] . '</a></td>';
        $html .= '<td>' . $row['sitios'] . '</td>';
        $html .= '<td>' . $row['precioSitio'] . '</td>';
        $html .= '</tr>';
    }
} else {
    $html .= '<tr>';
    $html .= '<td colspan="3">Sin resultados</td>';
    $html .= '</tr>';
}

/* Filtrado */


echo json_encode($html, JSON_UNESCAPED_UNICODE);
?>