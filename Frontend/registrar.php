<?php
   include_once ('../Backend/conectar.php');
   require("../Backend/parqueo_act.php"); 
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
                    REGISTRAR PARQUEO
                </h1>
            </div>
            <form class="form-inline position-relative d-inline-block my-2" action="../Backend/prq_reg.php" method="POST">

                <table class="tabla" >
                    <tr>
                        <td class="column-1">
                            <label class="etiqueta" for="name_cargo">Nombre:</label>
                        </td>
                        <td>
                            <?php
                                $res = prq_vista(1);
                                if($res){
                                    $fila =$res->fetch_assoc();

                                    $dias = ['lun','mar', 'mie', 'jue', 'vie', 'sab'];

                                    $dias2 = ['lunes','martes', 'miercoles', 'jueves', 'viernes', 'sabado'];
                                }
                                
                            ?>
                            <input class="form-control" type="text" style="width: 20vw;" name="nombre" id="name_cargo" required>
                        </td>
                    </tr>
    
                    <tr>
                        <td class="column-1">
                            <label for="name_cargo">Precio por sitio:</label>
                        </td>
                        <td>
                            <input class="form-control" type="text" style="width: 5vw;" name="precio" id="name_cargo" required>
                        </td>
                    </tr>

                    <tr>
                        <td class="column-1">
                            <label for="name_cargo">Cantidad de sitios:</label>
                        </td>
                        <td>
                            <input class="form-control" type="number" style="width: 5vw;" min="1" name="cantidad" id="name_cargo" required> 
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <label for="name_cargo">Horario de atención:    De</label>
                        </td>
                        <td class="horario">
                            <input class="form-control" type="time" style="width: 5vw;" name="hro_at" value="00:00" min="00:00" max="23:59" id="name_cargo" required>
                            <label for="name_cargo" class="a">a</label>
                            <input class="form-control" type="time" style="width: 5vw;" name="hro_ce" value="00:00" min="00:00" max="23:59" id="name_cargo" required>
                        </td>
                    </tr>
                    <tr>
                        <td class="column-1">
                        <label for="name_cargos">Días de atención:</label>
                        </td>
                    </td>
                    </tr>
                </table>
                
                <div class="form-group" style="margin-top: 3vh;">

                    <?php
                        for($i=0;$i<6;$i++){
                    ?>
                        <div class="dias a">
                            <input type="checkbox" name="<?php echo $dias[$i]?>" id="name_cargo">
                            <label for="name_cargos"><?php echo $dias2[$i]?></label> 
                        </div>
                    <?php
                        }
                    ?>
                     
                </div>
            <div class="form-group" style="margin-top: 6vh;">
                <button class="btn btn-success a" type="submit">Guardar</button>
                <a class="btn btn-danger a" href="./activo_view.php">
                    Cancelar
                </a>
            </div>
            </form>

            
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