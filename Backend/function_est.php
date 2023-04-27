<?php


include_once '../Backend/conectar.php';

function est_view($idP){
    $conn = conexion();
    
    $sql="SELECT e.nombre, e.sitios, e.precioSitio, hr.IDHORATENCION, hr.HORAINIATENCION, hr.HORAFINATENCION
    FROM estacionamiento e, horario_estacionamiento h, HORARIOATENCION hr
    WHERE e.id= '$idP' AND e.id = h.estacionamiento_id AND h.IDHORATENCION = hr.IDHORATENCION";

    $query = mysqli_query($conn,$sql);
    if(!$query){
        echo "algo salio mal";
        return null;
    }else{
        return $query;
    }
}

function horario_view(){
    $conn = conexion();
    
    $sql="SELECT e.IDHORATENCION, e.HORAINIATENCION, e.HORAFINATENCION, e.LUN, e.SAB
    FROM HORARIOATENCION e";

    $query = mysqli_query($conn,$sql);
    if(!$query){
        echo "algo salio mal";
        return null;
    }else{
        return $query;
    }
}

function est_update( $id_Est, $nombre, $sitio, $precioSitio)
{
    $conn = conexion();
    $sql = "UPDATE estacionamiento set nombre = '$nombre', sitios = '$sitio', precioSitio = '$precioSitio'  WHERE id=$id_Est;";  

    $query = mysqli_query($conn,$sql);
    if(!$query){
        echo "algo salio mal";
        return null;
    }else{
        return $query;
    }
}



function horEst_view($idEst){
    $conn = conexion();
    
    $sql="SELECT e.IDHORATENCION, e.HORAINIATENCION, e.HORAFINATENCION, hr.HORAINIATENCION
    FROM horario_estacionamiento, HORARIOATENCION e WHERE ";

    $query = mysqli_query($conn,$sql);
    if(!$query){
        echo "algo salio mal";
        return null;
    }else{
        return $query;
    }
}

?>
