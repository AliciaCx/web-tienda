const body = document.querySelector("body")
function Seccion1() {
    if (document.getElementById("seccion1")) {
        body.removeChild(seccion1)
    } else {
        const seccion1 = document.createElement("seccion1")
        seccion1.id = "seccion1"
        const seccion2 = document.getElementById("intro")
        body.insertBefore(seccion1, seccion2)
        seccion1.insertAdjacentHTML("afterbegin", `<div class="contenedor" id="salida"></div>`)
    }
}

const inicio = document.getElementById("inicio")
inicio.addEventListener("click", () => {
    Seccion1()
    const subseccion11 = document.createElement("div")
    subseccion11.id = "miformulario"
    salida.appendChild(subseccion11);
    
    let cabecera = "<nav class='navbar navbar-expand-sm navbar-dark sticky-top' style = 'background-color: plum'>" +
                        "<div class='container-fluid'>" +
                            "<a class='navbar-brand' href='#'></a><button class='navbar-toggler' type='button' data-bs-toggle='collapse' data-bs-target='#barra_datos' aria-controls='barra_datos' aria-expanded='false' aria-label='Toggle navigation'><span class='navbar-toggler-icon'></span> </button>"

        cabecera += "<div class='collapse navbar-collapse' id='barra_datos'>" +
                        "<ul class='navbar-nav nav me-auto mb-2 mb-lg-0'>";

        cabecera+= "<li class='nav-item'>" +
                        "<a class='nav-link active' href='#tab1' aria-current='page' data-bs-toggle='tab'>Productos</a></li>" +
                        "<li class='nav-item'><a class='nav-link' href='#tab2' data-bs-toggle='tab'>Empleados</a></li>" +
                        "<li class='nav-item'><a class='nav-link' href='#tab3' data-bs-toggle='tab'>Clientes</a></li></ul></div></div></nav>";

subseccion11.insertAdjacentHTML("beforeend", `${cabecera}`)


let formulario = `<div class="tab-content">
            <div class='tab-pane active card' id='tab1'>
            <h3 class='container'>Gestión de productos</h3><br>
                <form class='container' action="1. gestion.php" method="POST">
            
            <div class=" mb-3 row">
                <label for="num_producto" class="col-lg-3 col-form-label pt-2">Numero de producto</label>
                <div class="col-lg-3">
                    <input type="number" class="form-control" name="num_producto" id="num_producto" min = 10000 >
                </div>

                <label for="nombre" class="col-lg-3 col-form-label pt-2">Nombre del producto</label>
                <div class="col-lg-3">
                    <input type="text" class="form-control" placeholder="Polvo compacto" name="nombre">
                </div>
            </div>
            
            <div class="mb-3 row">
                <div class="col-lg-4">
                <label for="categoria" class="col-form-label">Nombre categoria</label>
                <select name="categoria" id="categoria" class="form-control">
                    <option value="" disabled selected>Selecciona una categoria</option>
                    <option value="1">Perfume</option>
                    <option value="2">Maquillaje</option>
                    <option value="3">Cuidado Corporal</option>
                    <option value="4">Cuidado Facial</option>
                    <option value="5">Cuidado Capilar</option>
                </select>
                </div>

                <div class="col-lg-4">
                <label for="tipo" class="col-form-label">Tipo piel/cabello</label>
                    <input type="text" class="form-control" name="tipo" id="tipo" placeholder="piel seca">
                </div>

                <div class="col-lg-4">
                <label for="precio" class="col-form-label">Precio (€)</label>
                    <input type="text" class="form-control" name="precio" id="precio" placeholder="8.5" >
                </div>
            </div>

            <div class="mb-3 row">
                <label for="marca" class="col-lg-1 col-form-label pt-2">Marca</label>
                <div class="col-lg-2">
                    <input type="text" class="form-control" placeholder="Chanel" name="marca">
                </div>
                <label for="descripcion" class="col-lg-3 col-form-label">Descripción del producto</label>
                <div class="col-lg-6">
                    <input type="text" class="form-control" name="descripcion" id="descripcion">
                </div>
            </div>

        <div class="mb-3 row">
            <label for="imagen" class="col-lg-3 col-form-label">Añadir imagen</label>
            <div class="col-lg-9">
            <input type="file" name="imagen" id="imagen" class="form-control">
            </div>
        </div>

            <div class="mb-3 row">
                <div class="col-sm-2  d-flex justify-content-center container ">
                    
                <input type="submit" value="Insertar" name='insertar' class="btn btn-primary ms-2" onclick="alert('Insertar datos');">
                <input type="submit" value="Actualizar" name='actualizar' class="btn btn-warning ms-2" onclick="alert('Actualizar datos');">
                <input type="submit" value="Eliminar" name='eliminar' class="btn btn-danger ms-2" onclick="alert('Eliminar datos');">

                </div>
            </div>
        
    </form> </div>`

    
formulario+= `
            <div class='tab-pane card' id='tab2'>
            <h3 class='container'>Gestión de empleados</h3><br>
            <form class='container' action="1. gestion.php" method="POST">
            
            <div class="mb-3 row">
                <label for="num_empleado" class="col-lg-3 col-form-label">Numero de empleado</label>
                <div class="col-sm-2">
                    <input type="number" class="form-control" name="num_empleado" id="num_empleado" min = 100 >
                </div>

                <label for="puesto" class="col-lg-2 offset-lg-1 col-form-label">Puesto</label>
                <div class="col-sm-4">
                <select name="puesto" id="puesto" class="form-control">
                    <option value="" disabled selected>Selecciona un puesto</option>
                    <option value="Encargado de inventario">Encargado de inventario</option>
                    <option value="Vendedor">Vendedor</option>
                    <option value="Maquillador">Maquillador</option>
                </select>
                </div>

            </div>

            <div class="mb-3 row">
                <label for="nombre_e" class="col-lg-2 col-form-label pt-2">Nombre</label>
                <div class="col-lg-4">
                    <input type="text" class="form-control" name="nombre_e" id="nombre_e" placeholder="Alicia" >
                </div>

                <label for="apellidos_e" class="col-lg-2 col-form-label pt-2">Apellidos</label>
                <div class="col-lg-4">
                    <input type="text" class="form-control" name="apellidos_e" id="apellidos_e" placeholder="Casaux Vazquez" >
                </div>
            </div>

            <div class="mb-3 row">
                <label for="edad_e" class="col-lg-2 col-form-label pt-2">Edad</label>
                <div class="col-lg-2">
                    <input type="number" class="form-control" name="edad_e" id="edad_e" min="18" >
                </div>

                <label for="ciudad_e" class="col-lg-2 offset-lg-2 col-form-label pt-2">Ciudad</label>
                <div class="col-lg-4">
                    <input type="text" class="form-control" name="ciudad_e" id="ciudad_e" placeholder="Sevilla" >
                </div>
            </div>

            <div class="mb-3 row">
                <div class="col-lg-2  d-flex justify-content-center container ">
                    
                <input type="submit" value="Insertar" name='insertar' class="btn btn-primary ms-2" onclick="alert('Insertar datos');">
                <input type="submit" value="Actualizar" name='actualizar' class="btn btn-warning ms-2" onclick="alert('Actualizar datos');">
                <input type="submit" value="Eliminar" name='eliminar' class="btn btn-danger ms-2" onclick="alert('Eliminar datos');">

                </div>
            </div>
    </form></div>`

formulario+=`
            <div class='tab-pane card' id='tab3'>
            <h3 class='container'>Gestión de clientes</h3><br>
                <form class='container' action="1. gestion.php" method="POST">
            
            <div class="mb-3 row">
                <label for="dni" class="col-lg-2 col-form-label pt-2">DNI</label>
                <div class="col-lg-2">
                    <input type="text" id="dni" name="dni"  required pattern="\\d{8}[A-Za-z]">
                </div>
            </div>

            <div class="mb-3 row">
                <label for="nombre_c" class="col-lg-2 col-form-label pt-2">Nombre</label>
                <div class="col-lg-4">
                    <input type="text" class="form-control" name="nombre_c" id="nombre_c" placeholder="Alicia" >
                </div>

                <label for="apellidos_c" class="col-lg-2 col-form-label pt-2">Apellidos</label>
                <div class="col-lg-4">
                    <input type="text" class="form-control" name="apellidos_c" id="apellidos_c" placeholder="Casaux Vazquez" >
                </div>
            </div>
            

            <div class="mb-3 row">
                <label for="telefono" class="col-lg-2 col-form-label">Telefono</label>
                <div class="col-lg-2">
                    <input type="tel" id="telefono" name="telefono"  pattern="[0-9]{9}">
                </div>

                <label for="ciudad_c" class="col-lg-2 offset-lg-2 col-form-label">Ciudad</label>
                <div class="col-lg-2">
                    <input type="text" class="form-control" name="ciudad_c" id="ciudad_c" placeholder="Sevilla" >
                </div>
            </div>

            <div class="mb-3 row">
                <div class="col-lg-2  d-flex justify-content-center container ">
                    
                <input type="submit" value="Insertar" name='insertar' class="btn btn-primary ms-2" onclick="alert('Insertar datos');">
                <input type="submit" value="Actualizar" name='actualizar' class="btn btn-warning ms-2" onclick="alert('Actualizar datos');">
                <input type="submit" value="Eliminar" name='eliminar' class="btn btn-danger ms-2" onclick="alert('Eliminar datos');">

                </div>
            </div>
    </form></div>`

formulario+=`</div>`
subseccion11.insertAdjacentHTML("beforeend", `${formulario}`)    
})

const btntienda = document.querySelector("#drop1")
btntienda.addEventListener("click", function () {

    Seccion1()
    let url = "1. tienda.php"
    let objeto = {
        method: "POST",
        body: new FormData()
    }
    fetch(url, objeto)
        .then((response) => {
            if (response.ok) {
                return response.json()

            } else { alert("El servidor se ha caido") }
        })
        .then((filas) => {
            console.log(filas)
            let sal = "<p class = 'p-3'>Donde nos puedes encontrar</p>"
            sal += "<table class='table table-bordered table-hover table-striped '><thead><tr><th>CIUDAD</th><th>DIRECCION</th><th>EMAIL</th><th>TELEFONO</th></tr></thead><tbody>"

            filas.forEach((fila) => {
                sal += `<tr><td>${fila.ciudad}</td><td>${fila.direccion}</td><td>${fila.email}</td><td>${fila.telefono}</td></tr>`
            })
            sal += "</tbody></table>"

            const salida = document.getElementById("salida")
            salida.innerHTML = sal
        })
    console.log("Hemos realizado fetch")
})

const btnproveedores = document.querySelector("#drop2")
btnproveedores.addEventListener("click", function () {

    Seccion1()
    let url = "1. proveedores.php"
    let objeto = {
        method: "POST",
        body: new FormData()
    }
    fetch(url, objeto)
        .then((response) => {
            if (response.ok) {
                return response.json()

            } else { alert("El servidor se ha caido") }
        })

        .then((filas) => {
            console.log(filas)
            let sal = "<p class='p-3'>Lista de proveedores con los que trabajamos</p>"
            sal += "<ul p-3>"

            filas.forEach((fila) => {
                sal += `<li>${fila.nombre_empresa}</li>`
            })
            sal += "</ul>"

            const salida = document.getElementById("salida")
            salida.innerHTML = sal
        })
    console.log("Hemos realizado fetch")
})

const btnempleados = document.querySelector("#drop3")
btnempleados.addEventListener("click", function () {

    Seccion1()
    let url = "1. empleados.php"
    let objeto = {
        method: "POST",
        body: new FormData()
    }
    fetch(url, objeto)
        .then((response) => {
            if (response.ok) {
                return response.json()

            } else { alert("El servidor se ha caido") }
        })
        .then((filas) => {
            console.log(filas)
            let sal = "<p class = 'p-3'>Nuestros trabajadores</p>"
            sal += "<table class='table table-bordered table-hover table-striped '><thead><tr><th>Numero de empleado</th><th>Nombre</th><th>Apellidos</th><th>Edad</th><th>Ciudad</th><th>Puesto</th></tr></thead><tbody>"

            filas.forEach((fila) => {
                sal += `<tr><td>${fila.num_empleado}</td><td>${fila.nombre}</td><td>${fila.apellidos}</td><td>${fila.edad}</td><td>${fila.ciudad}</td><td>${fila.puesto}</td></tr>`
            })
            sal += "</tbody></table>"

            const salida = document.getElementById("salida")
            salida.innerHTML = sal
        })
    console.log("Hemos realizado fetch")
})

const btnprofesional = document.querySelector("#drop4")
btnprofesional.addEventListener("click", function () {

    Seccion1()
    let url = "1. profesional.php"
    let objeto = {
        method: "POST",
        body: new FormData()
    }
    fetch(url, objeto)
        .then((response) => {
            if (response.ok) {
                return response.json()

            } else { alert("El servidor se ha caido") }
        })

        .then((filas) => {
            console.log(filas)
            let sal = "<p class='p-3'>A parte de nuestros empleados, también contamos con ayuda de profesionales que te pueden ayudar a elegir un tipo de producto dependiendo de tu tipo de piel o cabello</p>"
            sal += "<ul p-3>"

            filas.forEach((fila) => {
                sal += `<li>${fila.nombre} ${fila.apellido}</li>`
            })
            sal += "</ul>"

            const salida = document.getElementById("salida")
            salida.innerHTML = sal
        })
    console.log("Hemos realizado fetch")
})