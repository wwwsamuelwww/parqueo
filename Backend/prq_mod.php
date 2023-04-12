<?php
include './parqueo_act.php';

$idparqueo = $_POST['idEstacionamiento'];
$nombre   = $_POST['nombre'];
$cantidad = $_POST['cantidad'];
echo $nombre;

$conn = conexion();
$sql = "SELECT id FROM horario_estacionamiento WHERE estacionamiento_id = $idparqueo";  
$query = mysqli_query($conn,$sql);

$columnas = mysqli_fetch_row($query);
$idhorario = $columnas[0];

$hro_at   = $_POST['hro_at'];
echo $hro_at;
$hro_ce   = $_POST['hro_ce'];
echo $hro_ce;

$dias = ['lun','mar', 'mie', 'jue', 'vie', 'sab'];
for($i=0;$i<6;$i++){
    if(isset($_POST[$dias[$i]])){
        $dias[$i] = 1;
        echo $dias[$i];
    }else{
        $dias[$i] = 0;
        echo $dias[$i];
    }
}

prq_mod( $idparqueo, $nombre, $cantidad);
hor_mod( $idhorario, $hro_at, $hro_ce, $idparqueo, $dias[0], $dias[1], $dias[2], $dias[3], $dias[4], $dias[5]);

$conexion = conexion();

$sql = "CALL sp_vaciar_tabla($idparqueo)";
$result = mysqli_query($conexion, $sql);

$can = $_POST['cantidad'];

$sql = "CALL crearEspacios($can,$idparqueo)";
$result = mysqli_query($conexion, $sql);


$url= '../Frontend/index.php';
echo '<META HTTP-EQUIV=REFRESH CONTENT="1; '.$url.'">';

?>

