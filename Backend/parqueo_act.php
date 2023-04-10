<?php

//include './conectar.php';

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

function hor_mod( $id_hro, $hro_at, $hro_ce, $id_prq, $lun, $mar, $mie, $jue, $vie, $sab)
{
    $conn = conexion();
    $sql = "UPDATE horario_parqueo (hora_entrada, hora_salida, parqueo_id, lun, mar, mie, jue, vie, sab) values 
                                   ('$hro_at','$hro_ce','$id_prq','$lun','$mar','$mie','$jue','$vie','$sab')
                                   WHERE id=$id_hro;";  

    $query = mysqli_query($conn,$sql);
    if(!$query){
        echo "algo salio mal";
        exit;
    }
}

function prq_mod( $id_prq, $nombre, $cantidad)
{
    $conn = conexion();
    $sql = "UPDATE parqueo (nombre, sitios) values ('$nombre','$cantidad') WHERE id=$id_prq;";  

    $query = mysqli_query($conn,$sql);
    if(!$query){
        echo "algo salio mal";
        exit;
    }
}

function hor_reg( $id_hro, $hro_at, $hro_ce, $id_prq, $lun, $mar, $mie, $jue, $vie, $sab)
{
    $conn = conexion();
    $sql = "INSERT INTO horario_parqueo (id, hora_entrada, hora_salida, parqueo_id, lun, mar, mie, jue, vie, sab) values 
                                   ('$id_hro','$hro_at','$hro_ce','$id_prq','$lun','$mar','$mie','$jue','$vie','$sab');";  

    $query = mysqli_query($conn,$sql);
    if(!$query){
        echo "algo salio mal";
        exit;
    }
}

function prq_reg( $id_prq, $nombre, $cantidad)
{
    $conn = conexion();
    $sql = "INSERT INTO parqueo (id, nombre, sitios) values 
                                   ('$id_prq','$nombre','$cantidad');";  

    $query = mysqli_query($conn,$sql);
    if(!$query){
        echo "algo salio mal";
        exit;
    }
}

function prq_vista($idP){
    $conn = conexion();
    $sql="SELECT p.nombre,p.sitios,h.hora_entrada,h.hora_salida,h.lun,h.mar,h.mie,h.jue,h.vie,h.sab
    FROM parqueo p
    JOIN horario_parqueo h
    ON p.id =h.parqueo_id
    WHERE parqueo_id=$idP";

    $query = mysqli_query($conn,$sql);
    if(!$query){
        return null;
    }else{
        return $query;
    }
}


/*
function prq_mod( $id, $nombre, $precio, $cantidad, $hro_at, $hro_ce, $lun, $mar, $mie, $jue, $vie, $sab)
{
    $conn = conexion();
    $sql = "INSERT INTO horario_parqueo (hora_entrada, hora_salida, parqueo_id, lun, mar, mie, jue, vie, sab) values 
                                   ('$nombre','$precio ','$cantidad','$hro_at','$hro_ce','$lun','$mar','$mie','$jue','$vie','$sab');
";  

    $query = mysqli_query($conn,$sql);
    if(!$query){
        echo "algo salio mal";
        exit;
    }
}*/
?>