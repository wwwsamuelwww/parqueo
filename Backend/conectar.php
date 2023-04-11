<?php
//no da por que esta fuera de la funcion s
    $host = 'db4free.net:3306'; 
    $dbuser = 'condor';
    $dbpassword = 'betaalfa800';
    $dbname = 'parqueo';
    
    function conexion(){
        $conexion=mysqli_connect('db4free.net','condor','betaalfa800','parqueo','3306');
        if($conexion){
            return $conexion;
        }else{
            return 'Error de conexión';
        }
    }
?>