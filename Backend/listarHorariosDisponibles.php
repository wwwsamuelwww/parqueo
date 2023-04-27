<?php
    include_once '../Backend/conectar.php';
    $conexion = conexion();
    $sql = "SELECT * FROM HORARIOATENCION";
    $resultado = mysqli_query($conexion, $sql);
?>
