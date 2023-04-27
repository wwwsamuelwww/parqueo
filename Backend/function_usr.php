<?php


include_once '../Backend/conectar.php';

function usr_view($idUsuario){
    $conn = conexion();
    $sql="SELECT u.NOMBRES,u.APELLIDOS,u.CI,u.TELEFONO,u.DIRECCION,u.EMAIL,u.PASSWORD
    FROM USUARIOS u
    WHERE u.IDUSUARIO=$idUsuario";

    $query = mysqli_query($conn,$sql);
    if(!$query){
        echo "algo salio mal";
        return null;
    }else{
        return $query;
    }
}

function usr_update( $idUsuario, $nombres, $apellidos, $ci, $telf, $dir, $correo, $password)
{
    $conn = conexion();
    $sql = "UPDATE USUARIOS set NOMBRES = '$nombres', APELLIDOS = '$apellidos', CI = '$ci', TELEFONO = '$telf',
            DIRECCION = '$dir', EMAIL = '$correo' ,PASSWORD = '$password' WHERE IDUSUARIO=$idUsuario;";  

    $query = mysqli_query($conn,$sql);
    if(!$query){
        echo "algo salio mal";
        return null;
    }else{
        return $query;
    }
}
?>