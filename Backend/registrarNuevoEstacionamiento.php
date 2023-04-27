<?php
       include_once '../Backend/conectar.php';
       $conexion = conexion();
       session_start();
   
       $nombre= $_POST['nomb'];
       $precio=$_POST['pre'];
       $cantidad = $_POST['cantSi'];

       
       $sql1 = "CALL sp_existe_estacionamiento('$nombre')";
       $result1 = mysqli_query($conexion, $sql1);
       $numero = mysqli_num_rows($result1);
       
       $conexion2 = conexion();

       if($numero == 0){
              if($nombre != '' and $precio != '' and $cantidad != ''){
                    $sql2 = "CALL sp_registrar_estacionamiento('$nombre','$precio','$cantidad')";
                    $result2 = mysqli_query($conexion2, $sql2);
              }
              if(in_array('1', $_POST['opciones'])){
                     $conexion3 = conexion();
                     $result3 = mysqli_query($conexion3, "SELECT id FROM estacionamiento ORDER by id DESC LIMIT 1");
                     $filaEsta = mysqli_fetch_row($result3);
                     $idEsta = $filaEsta[0];
                     $conexion4 = conexion();
                     $result4 = mysqli_query($conexion4, "INSERT INTO horario_estacionamiento(estacionamiento_id,IDHORATENCION) VALUES ('$idEsta',1)");
                     echo "Datos ingresados correctamente";
                 }
              if(in_array('2', $_POST['opciones'])){
                     $conexion3 = conexion();
                     $result3 = mysqli_query($conexion3, "SELECT id FROM estacionamiento ORDER by id DESC LIMIT 1");
                     $filaEsta = mysqli_fetch_row($result3);
                     $idEsta = $filaEsta[0];
                     $conexion4 = conexion();
                     $result4 = mysqli_query($conexion4, "INSERT INTO horario_estacionamiento(estacionamiento_id,IDHORATENCION) VALUES ('$idEsta',2)");
                     echo "Datos ingresados correctamente";
              }
               if(in_array('3', $_POST['opciones'])){
                     $conexion3 = conexion();
                     $result3 = mysqli_query($conexion3, "SELECT id FROM estacionamiento ORDER by id DESC LIMIT 1");
                     $filaEsta = mysqli_fetch_row($result3);
                     $idEsta = $filaEsta[0];
                     $conexion4 = conexion();
                     $result4 = mysqli_query($conexion4, "INSERT INTO horario_estacionamiento(estacionamiento_id,IDHORATENCION) VALUES ('$idEsta',3)");
                     echo "Datos ingresados correctamente";
                 } 

       else{
              echo 'El nombre ya existe';
       }
}
?>