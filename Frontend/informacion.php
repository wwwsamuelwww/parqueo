<?php 
    include_once '../Backend/conectar.php';
    $conexion = conexion();
    if(isset($_GET['id'])){
        $idP=$_GET['id'];
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
    
    array_pop($resultado);
    


    function nombreParqueo($conn,$id){
        $consulta="SELECT nombre
        FROM estacionamiento 
        WHERE id=$id;";
        $res = $conn->query($consulta);
        if($datos=$res->fetch_object()){
            echo $datos->nombre;
        }
    }

    function horario($conn,$id,$sabado) {
        $consulta="SELECT h2.HORAINIATENCION, h2.HORAFINATENCION, h2.SAB 
        FROM estacionamiento e 
        JOIN horario_estacionamiento h1 
        ON e.id =h1.estacionamiento_id 
        JOIN HORARIOATENCION h2 
        ON h1.IDHORATENCION = h2.IDHORATENCION 
        WHERE e.id=$id and h2.SAB=$sabado;";
        $mensaje;
        $inicio;
        $fin;

        $res = $conn->query($consulta);
        if($datos=$res->fetch_object()){
            $inicio=$datos->HORAINIATENCION;
            $fin=$datos->HORAFINATENCION;
            if($inicio <= '12:00:01'){
                $mensaje = substr($inicio, 0, 5)."am a ". substr($fin, 0, 5)."pm" ; 
            }else{
                $mensaje = substr($inicio, 0, 5)."pm a ". substr($fin, 0, 5)."pm" ;
            }

            
        }else{
            $mensaje = "No hay atencion";
        }
        if($datos=$res->fetch_object()){
            $fin=$datos->HORAFINATENCION;
            $mensaje = substr($inicio, 0, 5)."am a ". substr($fin, 0, 5)."pm" ;
        }
        echo $mensaje;
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
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="white" class="bi bi-car-front-fill" viewBox="0 0 16 16" style="margin-left:5px">
                    <path d="M2.52 3.515A2.5 2.5 0 0 1 4.82 2h6.362c1 0 1.904.596 2.298 1.515l.792 1.848c.075.175.21.319.38.404.5.25.855.715.965 1.262l.335 1.679c.033.161.049.325.049.49v.413c0 .814-.39 1.543-1 1.997V13.5a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1-.5-.5v-1.338c-1.292.048-2.745.088-4 .088s-2.708-.04-4-.088V13.5a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1-.5-.5v-1.892c-.61-.454-1-1.183-1-1.997v-.413a2.5 2.5 0 0 1 .049-.49l.335-1.68c.11-.546.465-1.012.964-1.261a.807.807 0 0 0 .381-.404l.792-1.848ZM3 10a1 1 0 1 0 0-2 1 1 0 0 0 0 2Zm10 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2ZM6 8a1 1 0 0 0 0 2h4a1 1 0 1 0 0-2H6ZM2.906 5.189a.51.51 0 0 0 .497.731c.91-.073 3.35-.17 4.597-.17 1.247 0 3.688.097 4.597.17a.51.51 0 0 0 .497-.731l-.956-1.913A.5.5 0 0 0 11.691 3H4.309a.5.5 0 0 0-.447.276L2.906 5.19Z"/>
                </svg>
                <button class="btn btn-toggle align-items-center rounded collapsed text-white text-decoration-none" data-bs-toggle="collapse" data-bs-target="#home-collapse" aria-expanded="true">
                      Estacionamientos
                  </button>
                  <div class="collapse show" id="home-collapse">
                    <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                      <li><a href="registrarEstacionamiento.php" class="link-dark rounded text-white text-decoration-none">Registrar Estacionamiento</a></li>
                      <li><a href="station_update.php" class="link-dark rounded text-white text-decoration-none">Modificar Estacionameiento</a></li>
                      <li><a href="eliminarEstacionamiento.php" class="link-dark rounded text-white text-decoration-none">Eliminar Estacionamiento</a></li>
                      <li><a href="listaEstacionamiento.php" class="link-dark rounded text-white text-decoration-none">Ver Estacionamientos</a></li>
                    </ul>
                  </div>
                </div>
                <div>
                <div>
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="white" class="bi bi-people-fill" viewBox="0 0 16 16" style="margin-left:5px">
  <path d="M7 14s-1 0-1-1 1-4 5-4 5 3 5 4-1 1-1 1H7Zm4-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6Zm-5.784 6A2.238 2.238 0 0 1 5 13c0-1.355.68-2.75 1.936-3.72A6.325 6.325 0 0 0 5 9c-4 0-5 3-5 4s1 1 1 1h4.216ZM4.5 8a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5Z"/>
</svg>
                <button class="btn btn-toggle align-items-center rounded collapsed text-white text-decoration-none" data-bs-toggle="collapse" data-bs-target="#home-collapse2" aria-expanded="true">
                      Usuarios
                  </button>
                  <div class="collapse show" id="home-collapse2">
                    <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                      <li><a href="registrarUsuario.php" class="link-dark rounded text-white text-decoration-none">Registrar Usuario</a></li>
                      <li><a href="bajaUsuario.php" class="link-dark rounded text-white text-decoration-none">Dar de baja a guardia</a></li>
                      
                    </ul>
                  </div>
                </div>
                    </div>
              
    </div>
</div>

        <div class="w-100">

        <!-- Page Content -->
        <div id="content" class="bg-grey w-100 ml-2"> 
            <div class="row mt-2 justify-content-start pl-5">
                <h1><?php nombreParqueo($conexion,$idP) ?></h1>
            </div>
            <div class="row mt-2 d-flex justify-content-center">
                <div class="col-sm-3 ">
                    <h4>Horarios de atencion:</h4>
                    
                </div>
                <?php
                
                ?>
                <div class="col-sm-3 ">
                    <h4>lunes a viernes</h4>
                    <p><?php horario($conexion,$idP,0);?></p>
                </div>
                <div class="col-sm-3 ">
                    <h4>Sabado</h4>
                    <p><?php horario($conexion,$idP,1);?></p>
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
                            <p  class="text-center boolds bg-greenB w-100 pt-2 pb-2 mb-0 rounded">Disponible</p>                     </div>
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