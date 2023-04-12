<?php
include './parqueo_act.php';
$idparqueo       = "cual sera el id";
$nombre   = $_POST['nombre'];
$cantidad = $_POST['cantidad'];
echo $nombre;

$idhorario= "cual será su id";
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

prq_reg( $idparqueo, $nombre, $cantidad);
hor_reg( $idhorario, $hro_at, $hro_ce, $idparqueo, $dias[0], $dias[1], $dias[2], $dias[3], $dias[4], $dias[5]);

?>