<?php

    function conexion(){
        $conexion=mysqli_connect('db4free.net','condor','betaalfa800','parqueo','3306');
        if($conexion){
            //return mysqli_query($conexion,'SET NAMES uff8');
            return $conexion;
        }
        else {
            return 'Error de conexion';
        }
    }
?>