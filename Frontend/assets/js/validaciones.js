

    const nombre = document.getElementById("nombre")
    const precio = document.getElementById("precio")
    const cantidadDeSitios = document.getElementById("cantidadDeSitios")
    const form = document.getElementById("form")
    const parrafoNombre = document.getElementById("warningNombre")
    const parrafoPrecio = document.getElementById("warningPrecio")
    const parrafoCantidadDeSitios = document.getElementById("warningCantidadDeSitios")
    const parrafoCheckbox = document.getElementById("warningCheckBox")
    const checkbox1 = document.forms["miform"]["1"].checked
    const checkbox2 = document.forms["miform"]["2"].checked
    const checkbox3 = document.forms["miform"]["3"].checked


    parrafoNombre.innerHTML = ""
    parrafoPrecio.innerHTML = ""
    parrafoCantidadDeSitios.innerHTML = ""
    parrafoCheckbox.innerHTML = ""


    form.addEventListener('submit',(e) =>{
        if(nombre.value.length == 0 || precio.value == '' || cantidadDeSitios.value == '' ||(checkbox1 == false && checkbox2 == false && checkbox3 == false)){
            e.preventDefault()
            if(nombre.value.length == 0){
              
                parrafoNombre.innerHTML = ""
                parrafoNombre.innerHTML += 'El nombre no puede estar vacio'
            }
            if(precio.value == ''){
               
                parrafoPrecio.innerHTML = ""
                parrafoPrecio.innerHTML += 'El precio no puede estar vacio'
            }
            if(cantidadDeSitios.value == ''){
             
                parrafoCantidadDeSitios.innerHTML = ""
                parrafoCantidadDeSitios.innerHTML += 'Cantidad de sitios no puede estar vacio'
            }
            if(checkbox1 == false && checkbox2 == false && checkbox3 == false){
               
                parrafoCheckbox.innerHTML = ""
                parrafoCheckbox.innerHTML += "Debe seleccionar al menos un horario"
            }
        }
        if(nombre.value.length > 30 || precio.value == 0 || cantidadDeSitios.value == 0 || (checkbox1 == false && checkbox2 == false && checkbox3 == false)){
            e.preventDefault()

            if(nombre.value > 30){
                
                parrafoNombre.innerHTML = ""
                parrafoNombre.innerHTML += 'El nombre no debe superar 30 caracteres incluyendo espacios'
            }
            if(precio.value == '0'){
               
                parrafoPrecio.innerHTML = ""
                parrafoPrecio.innerHTML += 'El precio debe ser mayor a 0'
            }
            if(cantidadDeSitios.value == '0'){
                
                parrafoCantidadDeSitios.innerHTML = ""
                parrafoCantidadDeSitios.innerHTML += 'Cantidad de sitios debe ser mayor a 0'
            }
            if(checkbox1 == false && checkbox2 == false && checkbox3 == false){
               
                parrafoCheckbox.innerHTML = ""
                parrafoCheckbox.innerHTML += "Debe seleccionar al menos un horario"
            }
        }
    });
