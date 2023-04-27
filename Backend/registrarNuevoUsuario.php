<?php
       include_once '../Backend/conectar.php';
       $conexion = conexion();
   
       $nombres = $_GET['nombres'];
       $apellidos = $_GET['apellidos'];
       $carnet = $_GET['carnet'];
       $telefono = $_GET['telefono'];
       $direccion =$_GET['direccion'];
       $correo = $_GET['correo'];
       $estado = true;


       $sql1 = "INSERT INTO USUARIOS(NOMBRES,APELLIDOS,CI,TELEFONO,DIRECCION,EMAIL,ESTADO,IDROL,PASSWORD) VALUES ('$nombres','$apellidos','$carnet','$telefono','$direccion','$correo','$estado',2,'$carnet')";
    
       $result1 = mysqli_query($conexion, $sql1);
      
        echo header("Location: ../Frontend/registrarUsuario.php");
?>