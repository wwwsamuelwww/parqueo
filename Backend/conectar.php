<?php

    /*
    $host = 'db4free.net:3306'; 
    $dbuser = 'condor';
    $dbpassword = 'betaalfa800';
    $dbname = 'parqueo';

    $conn = mysqli_connect($host,$dbuser,$dbpassword,$dbname);
    if($conn){
        mysqli_query($conn,'SET NAMES uff8');
        
    }
    else {
        
    }*/

    function conexions(){
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

