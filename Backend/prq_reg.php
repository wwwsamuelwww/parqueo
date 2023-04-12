<?php
include './parqueo_act.php';


$nombre= $_POST['nombre'];
$cantidad = $_POST['cantidad'];
echo $nombre;



$hro_at   = $_POST['hro_at'];
$hro_ce   = $_POST['hro_ce'];


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

prq_reg( $nombre, $cantidad);
$conn = conexion();
$sql = "SELECT id FROM estacionamiento ORDER BY id DESC LIMIT 1";  
$query = mysqli_query($conn,$sql);

$columnas = mysqli_fetch_row($query);
$idparqueo = $columnas[0];

hor_reg( $hro_at, $hro_ce, $idparqueo, $dias[0], $dias[1], $dias[2], $dias[3], $dias[4], $dias[5]);

$conexion = conexion();

$can = $_POST['cantidad'];

$sql2 = "CALL crearEspacios($can,$idparqueo)";
$result = mysqli_query($conexion, $sql2);


$url= '../Frontend/index.php';
echo '<META HTTP-EQUIV=REFRESH CONTENT="1; '.$url.'">';

?>