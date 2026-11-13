<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

try {
    function conectar_bd($bd){
        $conn = new PDO ("mysql:host=localhost;dbname=$bd;charset=utf8", "root", "");
        return $conn;
    }

    function producto_por_categoria($categoria){
        $conn = conectar_bd("tienda");

        $cons = $conn->prepare("SELECT imagen, nombre, precio, descripcion, marca, tipo_piel_cabello 
                                FROM producto2 
                                WHERE categoria = :categoria");

        $res = $cons->execute(["categoria" => $categoria]);
        $productos = $cons->fetchAll(PDO::FETCH_ASSOC);

        echo "<link rel='stylesheet' href='0. estilos2.css'>";

        echo "<a href='0. pag_inicial.html' class='home'><img src='adj/casa.png' alt='Inicio' width='35px'>";
        echo "</a><h2>Productos de la categoría: <span>$categoria</span></h2>";
        echo "<div class='contenedor'>";

        if (empty($productos)) {
            echo "<div class='mensaje'>No hay productos disponibles para esta categoría.</div>";
        } else {
            foreach ($productos as $producto) {
                echo "<div class='producto'>";
                echo "<img src='" . $producto['imagen'] . "' alt='Imagen'><br>";
                echo "<div class='info'>";
                echo "<strong>Nombre:</strong> " . $producto['nombre'] . "<br>";
                echo "<strong>Marca:</strong> " . $producto['marca'] . "<br>";
                echo "<strong>Precio:</strong> " . $producto['precio'] . "€ <br>";
                echo "<strong>Descripción:</strong> " . $producto['descripcion'] . "<br>";
                echo "<strong>Tipo piel/cabello:</strong> " . $producto['tipo_piel_cabello'] . "<br>";
                echo "</div>";
                echo "</div>";
            }
        }
        echo "</div>";
    }

    $categorias = [
        "Perfumes" => "Perfume",
        "Maquillaje" => "Maquillaje",
        "Corporal" => "Cuidado corporal",
        "Facial" => "Cuidado facial",
        "Cabello" => "Cuidado capilar"
    ];

    foreach ($categorias as $nombre => $valor_categoria) {
        if (isset($_POST[$nombre])) {
            producto_por_categoria($valor_categoria);
            break;
        }
    }

    /* 
    if (isset($_POST['categoria'])) {
    producto_por_categoria($_POST['categoria']);
} */

} catch (PDOException $e) {
    echo "Error al obtener los datos: " . $e->getMessage();
}
?>
