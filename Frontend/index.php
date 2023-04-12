<?php
    require_once '../Backend/conectar.php';
    //$conexion = conexion();
    $sql = "CALL sp_mostrar_parqueos";
    $result = mysqli_query($conn, $sql);
?>

<!doctype html>
<html lang="en">

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
    <link href="https://unpkg.com/ionicons@4.5.10-0/dist/css/ionicons.min.css" rel="stylesheet">
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
        <!-- Fin sidebar -->
    
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
                    
                    
                  </li>
                </ul>
              </div>
            </div>
          </nav>
          <!-- Fin Navbar -->

         <!-- Tabla (lista de estacionamientos) -->
        	<div id="content" class="bg-grey w-100"> 
                <div class="container">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Parqueo</th>
                                <th>Horarios de atención</th>
                                <th style="text-align: center;">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php while($ver = mysqli_fetch_row($result)): ?>
                            <tr class="">
                                <td><a href= "informacion.php?idEstacionamiento = <?php echo $ver[0];?>" style='text-decoration:none;color:black;' > <?php echo $ver[1]; ?> </a></td>
                                <td><?php 
                                    $dias = "";
                                    if($ver[4] == true){
                                        $dias = "Lun,"; 
                                    }
                                    if($ver[5] == true){
                                        $dias = $dias."Mar,"; 
                                    }
                                    if($ver[6] == true){
                                        $dias = $dias."Mié,"; 
                                    }
                                    if($ver[7] == true){
                                        $dias = $dias."Jue,"; 
                                    }
                                    if($ver[8] == true){
                                        $dias = $dias."Vie,"; 
                                    }
                                    if($ver[9] == true){
                                        $dias = $dias."Sab,"; 
                                    }
                                    $dias = substr($dias, 0, -1);
                                    echo $dias." ".substr( $ver[2], 0, 5 )."-".substr( $ver[3], 0, 5 ); 
                                ?></td>
                                <td style="text-align: center;">
                                <!-- Button trigger modal -->
                                    <!-- Button trigger modal -->
                                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal">
                                             Eliminar
                                    </button>
                                    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Advertencia</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                Esta seguro de eliminar el estacionamiento?
                                            </div>
                                            <div class="modal-footer">
                                                <a href= "../Backend/eliminarEstacionamiento.php?borrar=<?php echo $ver[0]; ?>">Aceptar</a>
                                                <a href= "index.php">Cerrar</a>                                            
                                            </div>
                                            </div>
                                        </div>
                                    </div>
                                    <a class="btn btn-primary" href="modificar.php?idDeEst=<?php echo $ver[0]; ?>" >Modificar</a> 
                                </td>
                            </tr>
                            <?php endwhile; ?>
                        </tbody>
                    </table>        
                </div>
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

    
    
    <script src="Frontend/js/sidebars.js"></script>
</body>

</html>
