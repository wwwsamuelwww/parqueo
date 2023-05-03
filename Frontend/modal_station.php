<!--ventana para Update--->
<!DOCTYPE html>
<html lang="es">
<body>
<div class="modal fade" id="editChildres" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<div class="modal-dialog modal-lg modal-dialog-scrollable">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="staticBackdropLabel">Usuarios Activos</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="container">
            <form action="" method="post">
              <input type="text" name="busqueda" id="busqueda" placeholder="Buscar"/>
            </form>
            
            
            
            <table class="table">
                        <thead>
                          <tr>                   
                            <th scope="col">Nombre</th>
                            <th scope="col">Precio</th>
                            <th scope="col">Cantidad</th>
                          </tr>
                        </thead>
                        <tbody id="tabla_resultado" style="height: 60px;">

                        </tbody>
                        
            </table>
          </div>
        
        </div>
        
        <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
              <button type="submit" class="btn btn-primary">Guardar Cambios</button>
            </div>
      </div>
    </div>
</div>
<script>
/* Llamando a la función getData() */
getData()
        /* Escuchar un evento keyup en el campo de entrada y luego llamar a la función getData. */
        document.getElementById("busqueda").addEventListener("keyup", getData)
        /* Peticion AJAX */
        function getData() {
            let input = document.getElementById("busqueda").value
            let content = document.getElementById("tabla_resultado")
            let url = "station_dates.php"
            let formaData = new FormData()
            formaData.append('busqueda', input)
            fetch(url, {
                    method: "POST",
                    body: formaData
                }).then(response => response.json())
                .then(data => {
                    content.innerHTML = data
                }).catch(err => console.log(err))
        }
</script>
<!---fin ventana Update --->
</body>
</html>