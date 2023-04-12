<?php


include_once '../Backend/conectar.php';


///NO ME FUNCIONA EL INCLUDE POR ESO ESTA AQUI LA CONEXION Y TAMPOCO FUNCA

function hor_mod( $id_hro, $hro_at, $hro_ce, $id_prq, $lun, $mar, $mie, $jue, $vie, $sab)
{
    $conn = conexion();
    $sql = "UPDATE horario_estacionamiento  set hora_entrada = '$hro_at', hora_salida = '$hro_ce', estacionamiento_id = '$id_prq',
                                                lun = '$lun', mar = '$mar', mie = '$mie', jue = '$jue', vie = '$vie', sab = '$sab'
                                            WHERE id='$id_hro';";  

    $query = mysqli_query($conn,$sql);
    if(!$query){
        echo "algo salio mal";
        return null;
    }else{
        return $query;
    }
}

function prq_mod( $id_prq, $nombre, $cantidad)
{
    $conn = conexion();
    $sql = "UPDATE estacionamiento set nombre = '$nombre', sitios = '$cantidad' WHERE id=$id_prq;";  

    $query = mysqli_query($conn,$sql);
    if(!$query){
        echo "algo salio mal";
        return null;
    }else{
        return $query;
    }
}

function hor_reg( $id_hro, $hro_at, $hro_ce, $id_prq, $lun, $mar, $mie, $jue, $vie, $sab)
{
    $conn = conexion();
    $sql = "INSERT INTO horario_estacionamiento (id, hora_entrada, hora_salida, estacionamiento_id, lun, mar, mie, jue, vie, sab) values 
                                   ('$id_hro','$hro_at','$hro_ce','$id_prq','$lun','$mar','$mie','$jue','$vie','$sab');";  

    $query = mysqli_query($conn,$sql);
    if(!$query){
        echo "algo salio mal";
        return null;
    }else{
        return $query;
    }
}

function prq_reg( $id_prq, $nombre, $cantidad)
{
    $conn = conexion();
    $sql = "INSERT INTO estacionamiento (id, nombre, sitios) values 
                                   ('$id_prq','$nombre','$cantidad');";  

    $query = mysqli_query($conn,$sql);
    if(!$query){
        echo "algo salio mal";
        return null;
    }else{
        return $query;
    }
}

function prq_vista($idP){
    $conn = conexion();
    $sql="SELECT p.nombre,p.sitios,h.hora_entrada,h.hora_salida,h.lun,h.mar,h.mie,h.jue,h.vie,h.sab
    FROM estacionamiento p
    JOIN horario_estacionamiento h
    ON p.id = h.estacionamiento_id
    WHERE p.id=$idP";

    $query = mysqli_query($conn,$sql);
    if(!$query){
        echo "algo salio mal";
        return null;
    }else{
        return $query;
    }
}


?>
