<?php
   include_once ('../Backend/conectar.php');
   include_once ('../Backend/listarHorariosDisponibles.php');
?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

   <!-- Bootstrap CSS -->
   
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" 
    rel="stylesheet" 
    integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" 
    crossorigin="anonymous">


    <!-- Styles -->
    <link rel="stylesheet" href="assets/css/style.css">

    <!-- Google fonts -->
    <link href="https://fonts.googleapis.com/css?family=Muli:300,700&display=swap" rel="stylesheet">

    <!-- Ionic icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.4/font/bootstrap-icons.css">

    <link href="../Frontend/assets/css/sidebars.css" rel="stylesheet">
   

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.2/jquery.min.js"></script>


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
                      <li><a href="registrarEstacionamiento.php" class="link-dark rounded text-white text-decoration-none">Registrar Estacionamiento</a></li>
                      <li><a href="modificarEstacionamiento.php" class="link-dark rounded text-white text-decoration-none">Modificar Estacionameiento</a></li>
                      <li><a href="eliminarEstacionamiento.php" class="link-dark rounded text-white text-decoration-none">Eliminar Estacionamiento</a></li>
                      <li><a href="informacion.php" class="link-dark rounded text-white text-decoration-none">Ver Estacionamientos</a></li>
                    </ul>
                  </div>
                </div>
    </div>
</div>

        <div class="w-100">

         <!-- Navbar -->
         <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
            <div class="container">
                <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
                  <li class="nav-item dropdown">
                    <a class="nav-link text-white dropdown-toggle" href="#" id="navbarDropdown" role="button"
                      data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      <img src="assets/img/user-1.png" class="img-fluid rounded-circle avatar mr-2" hidden
                      alt="https://generated.photos/"/>
                      <B><FONT COLOR="white">Nombre usuario</FONT>
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
          </nav>
          <!-- Fin Navbar -->

        <!-- Page Content -->
        <div id="content" style="background-color: white;" >
            <div style="border-bottom: black">
                <h1 class="text-center">
                    REGISTRAR USUARIO
                </h1>
            </div>
            <form name="miform" class="form-inline position-relative d-inline-block my-2" action="../Backend/registrarNuevoEstacionamiento.php"method="post" id="form" >
                <table class="tabla" >
                
                    <tr>
                        <td class="column-1">
                            <label class="etiqueta" for="name_cargo">Nombre:</label>
                        </td>
                        <td>
                            <input class="form-control" type="text" style="width: 20vw;" name="nombre" id="nombre">
                            <p class="warnings" id="warningNombre"></p>
                        </td>
                    </tr>
                            <br>
                    <tr>
                        <td class="column-1">
                            <label for="name_cargo">Precio por sitio:</label>
                        </td>
                        <td >
                            <input class="form-control" type="number" style="width: 30%;" name="precio" id="precio" >
                            <p class="warnings" id="warningPrecio"></p>
                            <td>
                                <label>bs.</label>
                            </td>
                            
                        </td>
                       
                    </tr>

                    <tr>
                        <td class="column-1">
                            <label for="name_cargo">Cantidad de sitios:</label>
                        </td>
                        <td>
                            <input class="form-control" type="number" style="width: 30%;" name="cantidadDeSitios" id="cantidadDeSitios" >
                            <p class="warnings" id="warningCantidadDeSitios"></p> 
                        </td>
                    </tr>
                                
                    <tr>
                        <td class="column-1">
                            <label for="name_cargo">Horarios de atención:</label>
                        </td>
                        <td>
                         
                                <div>
                                    <input  type="checkbox" name="opciones[]" value="1">
                                        <label class="form-check-label" for="flexCheckDefault">
                                           Lun-Vie 06:00-14:00 
                                     </label>
                                     <br>
                                     <input  type="checkbox" name="opciones[]" value="2">
                                        <label class="form-check-label" for="flexCheckDefault">
                                           Lun-Vie 14:00-22:00 
                                     </label>
                                        <br>
                                     <input  type="checkbox" name="opciones[]" value="3">
                                     <label class="form-check-label" for="flexCheckDefault">
                                            Sab: 06:00-12:00
                                     </label>
                                </div>
                             <p class="warnings" id="warningCheckBox"></p> 
                            
                        </td>
                    </tr>
                </table>
                
                <div class="form-group" style="margin-top: 3vh;">

                
                </div>
                <div class="form-group" style="margin-top: 2vh; margin-left: 60%">
                    <button type="Submit" name="submit" class="btn btn-success" onclick="enviar()" style="margin-right: 40%">Registrar</button>
                    <a class="btn btn-danger a" href="index.php" style="margin-right: 90%">Cancelar</a>
                    <script>
                        function enviar(){
                            var nombre = document.getElementById('nombre').value;
                            var precio = document.getElementById('precio').value;
                            var cantSitios = document.getElementById('cantidadDeSitios').value;

                                  $.post('../Backend/registrarNuevoEstacionamiento.php',{nomb:nombre,pre:precio,cantSi:cantSitios},function(resp){    
                                        window.alert(resp);
                                    }   
                                );
                            }
                        
                    </script>
                 </div>
            </form>
        </div>

        

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
   
        
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.3/dist/Chart.min.js" integrity="sha256-R4pqcOYV8lt7snxMQO/HSbVCFRPMdrhAFMH+vr9giYI=" crossorigin="anonymous"></script>
    <script src="../Frontend/assets/js/sidebars.js"></script>

</body>

</html>
