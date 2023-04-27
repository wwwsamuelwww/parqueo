<?php  
    session_start();
    if(!empty($_POST["ingresar"])){
        if(!empty($_POST["correo"]) and !empty($_POST["password"])){
           $correo = $_POST["correo"];
           $password = $_POST["password"];
           $sql =$conexion->query("SELECT * FROM USUARIOS WHERE EMAIL='$correo' and PASSWORD='$password'");
           if($datos=$sql->fetch_object()){
            $_SESSION["idUsuario"]=$datos->IDUSUARIO;
            header('location: ../Frontend/listaEstacionamiento.php');
           }else{
            echo "<div class='alert alert-danger' role='alert'>
            Correo o contraseña incorrecta</div>";
           }       
        }else{
           if(empty($_POST["correo"]) and empty($_POST["password"])){
                echo "<div class='alert alert-danger' role='alert'>
                Ingrese correo y contraseña</div>";
            }
        }
    }else{
    }
?>