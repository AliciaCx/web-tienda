document.addEventListener("DOMContentLoaded", () => {
    let productos = []; 

    fetch("1. codigos.php")
        .then((res) => res.json())
        .then((data) => {
            productos = data; 
            const productoSelect = document.getElementById("producto");

            productos.sort((a, b) => a.nombre.localeCompare(b.nombre));

            llenarSelect(productos, productoSelect);
        })
        .catch(error => console.error("Error al obtener los productos:", error));

    const buscador = document.getElementById("buscador-producto");
    buscador.addEventListener("input", () => {
        const filtro = buscador.value.toLowerCase();
        const productoSelect = document.getElementById("producto");

        const productosFiltrados = productos.filter(producto =>
            producto.nombre.toLowerCase().includes(filtro)
        );

        llenarSelect(productosFiltrados, productoSelect);
    });
});

function llenarSelect(productos, select) {
    select.innerHTML = '<option value="" disabled selected>Selecciona un producto</option>';

    productos.forEach(producto => {
        const option = document.createElement("option");
        option.value = producto.num_producto;
        option.textContent = producto.nombre;
        select.appendChild(option);
    });
}

function rellenarCodigo() {
    const productoSelect = document.getElementById("producto");
    const codigoProducto = document.getElementById("codigo_producto");
    codigoProducto.value = productoSelect.value; 
}

