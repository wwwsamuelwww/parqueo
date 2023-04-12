<?php 
    include_once '../Backend/conectar.php';
    $conexion = conexion();
    if(isset($_GET['idEstacionamiento'])){
        $idP=$_GET['idEstacionamiento'];
    }
    $sql="SELECT id,numero,estado FROM sitio_estacionamiento WHERE estacionamiento_id=$idP";
    $query = mysqli_query($conexion,$sql);
    if(!$query){
        echo "algo salio mal";
        exit;
    }

    for($i = 0; $resultado[$i] = mysqli_fetch_assoc($query); $i++) ;
    
    $tamaño = count($resultado) - 1;
    $vacio=4-($tamaño%4);
    $salto=0;
    
    $nombre;
    $entrada;
    $salida;
    $dias=array();
    array_pop($resultado);
    
    $sql2="SELECT p.nombre,h.hora_entrada,h.hora_salida,h.lun,h.mar,h.mie,h.jue,h.vie,h.sab
    FROM estacionamiento p
    JOIN horario_estacionamiento h
    ON p.id =h.estacionamiento_id
    WHERE estacionamiento_id=$idP";

    $res = $conexion->query($sql2);

    if($res -> num_rows >0){
        while($fila =$res->fetch_assoc()){
            $nombre=$fila['nombre'];
            $entrada=strval($fila['hora_entrada']);
            $salida=strval($fila['hora_salida']);
            if($fila['lun']==1){$dias[]="lun";}
            if($fila['mar']==1){$dias[]="mar";}
            if($fila['mie']==1){$dias[]="mie";}
            if($fila['jue']==1){$dias[]="jue";}
            if($fila['vie']==1){$dias[]="vie";}
            if($fila['sab']==1){$dias[]="sab";}

        }
    }
    $mensaje=$dias[0];
    for($i=1;$i<count($dias);$i++){
        $mensaje=$mensaje."-".$dias[$i];
    }


?>
<!doctype html>
<html lang="es">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

   <!-- Bootstrap CSS -->
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Styles -->
    <link rel="stylesheet" href="assets/css/style.css">

    <!-- Google fonts -->
    <link href="https://fonts.googleapis.com/css?family=Muli:300,700&display=swap" rel="stylesheet">

    <!-- Ionic icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.4/font/bootstrap-icons.css">

    <link href="../Frontend/assets/css/sidebars.css" rel="stylesheet">
    
    <title>Dashboard - Campus Parking</title>
</head>

<body>
    <div class="d-flex" id="content-wrapper">

<!-- Sidebar -->
<div id="sidebar-container" class="bg-primary">
    <div class="logo">
        <h4 class="text-light font-weight-bold mb-0">Campus Parking</h4>
    </div>
    <div class="menu">

                <div>
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="white" class="bi bi-car-front-fill" viewBox="0 0 16 16">
                    <path d="M2.52 3.515A2.5 2.5 0 0 1 4.82 2h6.362c1 0 1.904.596 2.298 1.515l.792 1.848c.075.175.21.319.38.404.5.25.855.715.965 1.262l.335 1.679c.033.161.049.325.049.49v.413c0 .814-.39 1.543-1 1.997V13.5a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1-.5-.5v-1.338c-1.292.048-2.745.088-4 .088s-2.708-.04-4-.088V13.5a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1-.5-.5v-1.892c-.61-.454-1-1.183-1-1.997v-.413a2.5 2.5 0 0 1 .049-.49l.335-1.68c.11-.546.465-1.012.964-1.261a.807.807 0 0 0 .381-.404l.792-1.848ZM3 10a1 1 0 1 0 0-2 1 1 0 0 0 0 2Zm10 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2ZM6 8a1 1 0 0 0 0 2h4a1 1 0 1 0 0-2H6ZM2.906 5.189a.51.51 0 0 0 .497.731c.91-.073 3.35-.17 4.597-.17 1.247 0 3.688.097 4.597.17a.51.51 0 0 0 .497-.731l-.956-1.913A.5.5 0 0 0 11.691 3H4.309a.5.5 0 0 0-.447.276L2.906 5.19Z"/>
                </svg>
                <button class="btn btn-toggle align-items-center rounded collapsed text-white text-decoration-none" data-bs-toggle="collapse" data-bs-target="#home-collapse" aria-expanded="true">
                      Estacionamientos
                  </button>
                  <div class="collapse show" id="home-collapse">
                    <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                      <li><a href="modificar.php" class="link-dark rounded text-white text-decoration-none">Modificar Estacionamientos</a></li>
                      <li><a href="registrar.php" class="link-dark rounded text-white text-decoration-none">Registrar</a></li>
                    </ul>
                  </div>
                </div>


              
               


    </div>
</div>

        <div class="w-100">

        <!-- Page Content -->
        <div id="content" class="bg-grey w-100 ml-2"> 
            <div class="row mt-2 justify-content-start ml-5">
                <h1><?php echo $nombre?></h1>
            </div>
            <div class="row mt-2 justify-content-center">
                <div class="col-sm-3">
                    <h4>Horarios de atencion:</h4>
                </div>
                <div class="col-sm-3">
                    <h4><?php echo $mensaje;?></h4>
                </div>
                <div class="col-sm-3">
                    <h4><?php echo "de ".substr($entrada, 0, 5)." a ".substr($salida, 0, 5);?></h4>
                </div>

            </div>

            <div class="row mt-2 justify-content-center">
            <?php
                
                if (is_array($resultado) || is_object($resultado)): foreach($resultado as $row){ 
                    
                    if($salto == 4){$salto=0;
            ?>
                        <div class="row mt-2 justify-content-center">
                <?php }?>

                    <div class="col-sm-2 pr-1 pl-1">
                      <div class="card">
                      <div class="card-body bg-green">
                            <h6  class=" card-title fw-bold mb-0 boolds">Estacionamiento</h6>
                            <p class="card-text text-justify text-center boolds h1"><?php echo $row['numero'];?></p>
                            <a href="#" class="btn boolds bg-greenB w-100">Disponible</a>
                     </div>
                     </div>
                    </div>
                <?php $salto++;
                        if($salto == 4){?>
                        </div>    
                <?php } 
                    } endif;
                if($salto!=4){
                    for ($i = 0; $i <$vacio; $i++) {
                        echo '<div class="col-sm-2 pr-1 pl-1"></div>';
                      }
                    echo"</div>";
                }    
                ?>


        </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
        crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.3/dist/Chart.min.js" integrity="sha256-R4pqcOYV8lt7snxMQO/HSbVCFRPMdrhAFMH+vr9giYI=" crossorigin="anonymous"></script>
        <script src="Frontend/js/sidebars.js"></script>
    </body>

</html>
