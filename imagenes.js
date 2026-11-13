document.addEventListener("DOMContentLoaded", function () {
    fetch("imagenes.php")
        .then(response => response.text())
        .then(data => {
            console.log("Respuesta del servidor:", data);
        })
        .catch(error => {
            console.error("Error al ejecutar prueba.php:", error);
        });
});