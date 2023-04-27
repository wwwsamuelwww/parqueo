<?php
   include '../Backend/conectar.php';
   require("../Backend/function_est.php");
    $conn = conexion();
    session_start();
    $idEst  = $_SESSION["idUsuario"];
    $res =est_view($idEst);
    $fila =$res->fetch_assoc();
    $nombre = $fila["nombre"];
    $precio = $fila["precioSitio"];
    $sitio  = $fila["sitios"];
    $horario    = [];
    $idHr = [$fila["IDHORATENCION"]];
    while($fila =$res->fetch_assoc()){
        array_push($idHr,$fila["IDHORATENCION"]);
    }
    $hro    = horario_view();
    while($filahro =$hro->fetch_assoc()){
        $valor = false;
        if(in_array($filahro["IDHORATENCION"], $idHr)){
            $valor = true;
        }else{
            $valor = false;
        }
        array_push($horario,[$filahro["IDHORATENCION"],$filahro["HORAINIATENCION"],$filahro["HORAFINATENCION"], $valor,$filahro["LUN"],$filahro["SAB"]]);
    }
    $mensaje = "";
    $errNom = "";
    $errPrec = "";
    $errSitio = "";
    $errHro = "";
    $errores = false;
    if(isset($_POST["Guardar"])){
        $nombre = $_POST["nombre"];
        if(empty($nombre)){
            $errNom = '<p class="warnings" id="warningNombre"> debe llenar este campo </p>';
            $errores = true;
        }else{
            $validar = "SELECT nombre FROM estacionamiento WHERE nombre = '$nombre' AND estacionamiento.id != '$idEst'";
            $validando = mysqli_query($conn,$validar);
            if($validando->num_rows > 0){
                $errNom='<p class="warnings" id="warningNombre"> el nombre ya se encuentra registrado </p>';
                $errores = true;
            }
        }
        $precio = $_POST["precio"];
        if(empty($precio)){
            $errPrec='<p class="warnings" id="warningNombre"> debe llenar este campo</p>';
            $errores = true;
        }else{
            if($precio < 1){
                $errPrec='<p class="warnings" id="warningNombre"> el precio debe ser mayor a 0</p>';
                $errores = true;
            }
        }
        $sitio = $_POST["cantidad"];
        if(empty($sitio)){
            $errSitio='<p class="warnings" id="warningNombre"> debe llenar este campo </p>';
            $errores = true;
        }

        $bandera = false;
        for($i=0;$i<count($horario);$i++){
            if(isset($_POST[$horario[$i][0]])){
                $horario[$i][3] = true;
                $bandera = true;
            }else{
                $horario[$i][3] = false;
            }
        }
        if($bandera == false){
            $errHro = '<p class="warnings" id="warningNombre"> debe seleccionar día </p>';
            $errores = true;
        }

        if($errores == false){
            
            $borrar = "DELETE FROM horario_estacionamiento WHERE estacionamiento_id = '$idEst'";
            mysqli_query($conn,$borrar);
            for($i=0;$i<count($horario);$i++){
                if($horario[$i][3] == true){
                    $aux = $horario[$i][0];
                    $sql = "INSERT INTO horario_estacionamiento (estacionamiento_id, IDHORATENCION) values 
                                   ('$idEst','$aux');";
                    mysqli_query($conn,$sql);
                }
            }
              
            est_update($idEst, $nombre, $sitio, $precio);
            
            /*
            $sql = "SELECT id FROM horario_estacionamiento WHERE estacionamiento_id = $idEst";  
            $query = mysqli_query($conn,$sql);

            $columnas = mysqli_fetch_row($query);
            $idhorario = $columnas[0];

            prq_mod( $idEst, $nombre, $sitio);
            hor_mod( $idhorario, $hro_At, $hro_Ce, $idEst, $dias[1][0], $dias[1][1], $dias[1][2], $dias[1][3], $dias[1][4], $dias[1][5]);
            */
            $conexion = conexion();

            $sql = "CALL sp_vaciar_tabla($idEst)";
            $result = mysqli_query($conexion, $sql);

            $can = $_POST['cantidad'];

            $sql = "CALL crearEspacios($can,$idEst)";
            $result = mysqli_query($conexion, $sql);

            
        }
    }
?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <!-- Styles -->
    <link rel="stylesheet" href="assets/css/style.css">


    <!-- Google fonts -->
    <link href="https://fonts.googleapis.com/css?family=Muli:300,700&display=swap" rel="stylesheet">

    <!-- Ionic icons -->
    <link href="https://unpkg.com/ionicons@4.5.10-0/dist/css/ionicons.min.css" rel="stylesheet">

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




         <!-- Navbar -->
         <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
            <div class="container">
    
              <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
    
              <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <form class="form-inline position-relative d-inline-block my-2">
                  
                </form>
                <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
                  <li class="nav-item dropdown">
                    <a class="nav-link text-dark dropdown-toggle" href="#" id="navbarDropdown" role="button"
                      data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      <img class="img-fluid rounded-circle avatar mr-2"
                      alt="https://generated.photos/" />Diego Velázquez
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                      <a class="dropdown-item" href="#">Mi perfil</a>
                      <a class="dropdown-item" href="#">Suscripciones</a>
                      <div class="dropdown-divider"></div>
                      <a class="dropdown-item" href="#">Cerrar sesión</a>
                    </div>
                  </li>
                </ul>
              </div>
            </div>
          </nav>
          <!-- Fin Navbar -->

        <!-- Page Content -->
        <div id="content" style="background-color: white;" class="bg-grey w-100">
            <div style="border-bottom: black">
                <h1 class="text-center">
                    MODIFICACION DEL ESTACIONAMIENTO
                </h1>
            </div>
            
            <form class="form-inline position-relative d-inline-block my-2" action="<?php
                htmlspecialchars($_SERVER['PHP_SELF']);?>" method="POST">

                <table class="tabla" >
                    <tr>
                        <td class="column-1">
                            <label class="etiqueta" for="name_cargo">Nombre:</label>
                        </td>
                        <td>
                            <input class="form-control" type="text" style="width: 20vw;" name="nombre" id="name_cargo" value="<?php echo $nombre;?>">  
                            <?php echo $errNom;?>
                        </td>
                    </tr>
                    
                    <tr>
                        <td class="column-1">
                            <label for="name_cargo">Precio por sitio:</label>
                        </td>
                        
                        <td>
                            <div class = "horario">
                            <input class="form-control" type="number" step= "0.01"style="width: 5vw;" name="precio" id="name_cargo" value="<?php echo $precio;?>">
                            <label for="name_cargo">Bs:</label>
                            </div>
                            <?php echo $errPrec;?>
                        </td>
                        
                        
                    </tr>

                    <tr>
                        <td class="column-1">
                            <label for="name_cargo">Cantidad de sitios:</label>
                        </td>
                        <td>
                            <input class="form-control" type="number" style="width: 5vw;" min="1" name="cantidad" id="name_cargo" value="<?php echo $sitio;?>"> 
                            <?php echo $errSitio;?>
                        </td>
                    </tr>

                    
                        
                        
                            <?php
                                for($i=0;$i<count($horario);$i++){
                                    $miValor = $horario[$i];
                                    $diasDisp = "";
                                    if($miValor[5] == 0){
                                        $diasDisp = 'lun-vie '.$miValor[1].'-'.$miValor[2];
                                    }else{
                                        if($miValor[4] == 1){
                                            $diasDisp = 'lun-sab '.$miValor[1]."-".$miValor[2];
                                        }else{
                                            $diasDisp = 'sab '.$miValor[1]."-".$miValor[2];
                                        }
                                    }
                                    $etiqueta = "";
                                    if($i<1){
                                        $etiqueta = "Horario de atencion:";
                                    }
                            ?>

                    <tr>
                        <td>
                            <label for="name_cargo"><?php echo $etiqueta?></label>
                        </td>
                        <td>
                            <?php
                                    if($miValor[3] === true){
                            ?>
                            <div class = "horario">
                                <input class="form-control a" checked type="checkbox" name="<?php echo $miValor[0];?>" id="name_cargo">
                                <label for="name_cargos"><?php echo $diasDisp;?></label>
                            </div>
                            <?php
                                    }else{
                            ?>
                            <div class = "horario">
                                <input class="form-control a" type="checkbox" name="<?php echo $miValor[0];?>" id="name_cargo">
                                <label for="name_cargos"><?php echo $diasDisp;?></label>
                            </div>
                            <?php            
                                    }
                                }
                            ?>
                            <?php echo $errHro;?>
                        </td>
                    </tr>

                    <tr>
                        

                    </tr>
                </table>

                <div class="form-group" style="margin-top: 6vh;">
                    <button class="btn btn-success a" name="Guardar" id = "botonsito" type="submit">Guardar</button>
                    <a class="btn btn-danger a" href="./activo_view.php">
                        Cancelar
                    </a>
                </div>
            </form>

            <?php echo $mensaje; ?>
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
    <script src="../Frontend/assets/js/sidebars.js"></script>

</body>

</html>