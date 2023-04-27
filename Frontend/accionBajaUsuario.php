<?php
    include_once '../Backend/conectar.php';

    $ciBaja = $_GET['ciBaja'];

    $conn = conexion();
    $sql = "UPDATE usuarios set ESTADO = 0 WHERE CI=$ciBaja;";  

    $query = mysqli_query($conn,$sql);

    $url= '../Frontend/bajaUsuario.php';
    echo '<META HTTP-EQUIV=REFRESH CONTENT="1; '.$url.'">';
?>