<?php
   include '../Backend/conectar.php'; 
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
                <a href="#" class="d-block text-light p-3 border-0"><i class="icon ion-md-apps lead mr-2"></i>
                    Estacionamientos</a>

                    <a href="#" class="d-block text-light p-3 border-0"><i class="icon ion-md-apps lead mr-2"></i>
                    Registrar</a>
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
        <div id="content" style="background-color: white;" class="bg-grey w-100"> aqui editarcj
            <div style="border-bottom: black">
                <h1 class="text-center">
                    MODIFICACION DEL PARQUEO
                </h1>
            </div>
            <form class="form-inline position-relative d-inline-block my-2">

                <table class="tabla" >
                    <tr>
                        <td class="column-1">
                            <label class="etiqueta" for="name_cargo">Nombre:</label>
                        </td>
                        <td>
                            <input class="form-control" type="text" style="width: 20vw;" name="nro_serie" id="name_cargo" required>
                        </td>
                    </tr>
    
                    <tr>
                        <td class="column-1">
                            <label for="name_cargo">Precio por sitio:</label>
                        </td>
                        <td>
                            <input class="form-control" type="text" style="width: 5vw;" name="nro_serie" id="name_cargo" required>
                        </td>
                    </tr>

                    <tr>
                        <td class="column-1">
                            <label for="name_cargo">Cantidad de sitios:</label>
                        </td>
                        <td>
                            <input class="form-control" type="number" style="width: 5vw;" min="1" name="nro_serie" id="name_cargo" required> 
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <label for="name_cargo">Horario de atención:    De</label>
                        </td>
                        <td class="horario">
                            <input class="form-control" type="time" style="width: 5vw;" name="nro_serie" value="00:00" min="00:00" max="23:59" id="name_cargo" required>
                            <label for="name_cargo" class="a">a</label>
                            <input class="form-control" type="time" style="width: 5vw;" name="nro_serie" value="00:00" min="00:00" max="23:59" id="name_cargo" required>
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
                    <div class="dias a">
                        <input class="form-control a" type="checkbox" min="1" name="nro_serie" id="name_cargo" required>
                        <label for="name_cargos">Lunes</label> 
                    </div>
                    <div class="dias a">
                        <input class="form-control a" type="checkbox" min="1" name="nro_serie" id="name_cargo" required>
                        <label for="name_cargos">Martes</label> 
                    </div>
                    <div class="dias a">
                        <input class="form-control a" type="checkbox" min="1" name="nro_serie" id="name_cargo" required>
                        <label for="name_cargos">Miercoles</label> 
                    </div>
                    <div class="dias a">
                        <input class="form-control a" type="checkbox" min="1" name="nro_serie" id="name_cargo" required>
                        <label for="name_cargos">Jueves</label> 
                    </div>
                    <div class="dias a">
                        <input class="form-control a" type="checkbox" min="1" name="nro_serie" id="name_cargo" required>
                        <label for="name_cargos">Viernes</label> 
                    </div>
                    <div class="dias a">
                        <input class="form-control a" type="checkbox" min="1" name="nro_serie" id="name_cargo" required>
                        <label for="name_cargos">Sabado</label> 
                    </div>
                     
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
        <script>
            var ctx = document.getElementById('myChart').getContext('2d');
            var myChart = new Chart(ctx, { 
                type: 'bar',
                data: {
                    labels: ['Feb 2020', 'Mar 2020', 'Abr 2020', 'May 2020'],
                    datasets: [{
                        label: 'Nuevos usuarios',
                        data: [50, 100, 150, 200],
                        backgroundColor: [
                            '#12C9E5',  
                            '#12C9E5',
                            '#12C9E5',
                            '#111B54'
                        ],
                        maxBarThickness: 30,
                        maxBarLength: 2
                    }]
                },
                options: {
                    scales: {
                        yAxes: [{
                            ticks: {
                                beginAtZero: true
                            }
                        }]
                    }
                }
            });
            </script>
</body>

</html>