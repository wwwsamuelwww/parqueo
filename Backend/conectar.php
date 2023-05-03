<?php

    function conexion(){
        $conexion=mysqli_connect('localhost','root','','parqueo','3306');
        if($conexion){
            //return mysqli_query($conexion,'SET NAMES uff8');
            return $conexion;
        }
        else {
            return 'Error de conexion';
        }
    }
?>