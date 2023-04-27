<?php
    include_once '../Backend/conectar.php';

    if(isset($_GET['borrar'])){
        $var = $_GET['borrar'];
        $sql = "CALL sp_eliminar_estacionamiento($var)";
        $conn = conexion();
        $result = mysqli_query($conn, $sql);
        $url= '../Frontend/index.php';
        echo '<META HTTP-EQUIV=REFRESH CONTENT="1; '.$url.'">';
    }
?>