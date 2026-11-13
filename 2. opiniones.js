const btn = document.getElementById("consultar-opiniones")
btn.addEventListener("click", () =>{
    const resultadoOpiniones = document.getElementById("resultado-opiniones");
    const puntuacion = document.getElementById("filtro-puntuacion").value;

    if (resultadoOpiniones.style.display == "none") {
        fetch(`1. opiniones.php?puntuacion=${puntuacion}`)
            .then(response => response.text())
            .then(data => {
                resultadoOpiniones.innerHTML = data;
                resultadoOpiniones.style.display = "block";
            })
    } else {
        resultadoOpiniones.style.display = "none";
    }
})

/* const btn = document.getElementById("consultar-opiniones")
btn.addEventListener("click", () => {
    const resultadoOpiniones = document.getElementById("resultado-opiniones")
    const puntuacion = document.getElementById("filtro-puntuacion").value 

    fetch(`1. opiniones.php?puntuacion=${puntuacion}`)
        .then((res) => res.text())
        .then((data) =>{
            resultadoOpiniones.innerHTML = data
        })
}) */