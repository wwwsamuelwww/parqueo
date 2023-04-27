<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body> 
  <?php
    require_once '../Backend/conectar.php';
    $conexion = conexion();
    $sql = "SELECT * FROM `USUARIOS`";
    $result = mysqli_query($conexion, $sql);
    while($row=$result->fetch_assoc()){
      $nombre=$row['NOMBRES'];
    }
  ?>
  <!-- Modal -->
  <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-scrollable">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="staticBackdropLabel">Usuarios Activos</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="container">
            <form action="" method="post">
              <input type="text" name="campo" id="campo" placeholder="Buscar"/>
            </form>
            
            <table class="table">
                        <thead>
                          <tr>
                            <th scope="col">C.I.</th>
                            <th scope="col">Nombres</th>
                            <th scope="col">Apellidos</th>
                          </tr>
                        </thead>
                        <tbody id="content" style="height: 60px;">
                          
                        </tbody>
                    </table>
          </div>
        
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Volver</button>
        </div>
      </div>
    </div>
  </div>

  <script>
        /* Llamando a la función getData() */
        getData()
        /* Escuchar un evento keyup en el campo de entrada y luego llamar a la función getData. */
        document.getElementById("campo").addEventListener("keyup", getData)
        /* Peticion AJAX */
        function getData() {
            let input = document.getElementById("campo").value
            let content = document.getElementById("content")
            let url = "contenidoTablaUsuarios.php"
            let formaData = new FormData()
            formaData.append('campo', input)
            fetch(url, {
                    method: "POST",
                    body: formaData
                }).then(response => response.json())
                .then(data => {
                    content.innerHTML = data
                }).catch(err => console.log(err))
        }
        </script>

</body>
</html>