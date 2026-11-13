<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

try {
    $conn = new PDO("mysql:host=localhost;dbname=tienda;charset=utf8", "root", "");

    $puntuacion = isset($_GET['puntuacion']) && $_GET['puntuacion'] != '' ? (int)$_GET['puntuacion'] : null;

    $query = "SELECT 
                p.comentario, 
                p.nota AS puntuacion, 
                pr.nombre AS producto, 
                c.nombre AS cliente, 
                c.apellidos AS apellidos
              FROM 
                puntua p
              JOIN 
                producto pr ON p.num_producto = pr.num_producto
              JOIN 
                cliente c ON p.DNI = c.DNI";

        echo "<style>
        .opiniones {
            display: flex;
            flex-wrap: wrap;
            gap: 15px;
            margin: 20px;;
        }
        .opinion {
        border-radius: 5px;
        border: 0.5px;
        box-shadow: 1px 1px 5px plum;
        padding: 15px;
        background-color:rgba(249, 249, 249, 0.7);;
        flex: 1 1 calc(33.333% - 15px); 
        }
        .opinion p {
            margin: 5px 0;
        }
    </style>";

    if ($puntuacion !== null) {
        $query .= " WHERE p.nota = :puntuacion";
    }

    $query .= " ORDER BY p.nota DESC";

    $res = $conn->prepare($query);

    if ($puntuacion !== null) {
        $res->bindParam(':puntuacion', $puntuacion, PDO::PARAM_INT);
    }

    $res->execute();
    $opiniones = $res->fetchAll(PDO::FETCH_ASSOC);

    if (!empty($opiniones)) {
        echo "<div class='opiniones'>";
        foreach ($opiniones as $opinion) {
            echo "<div class='opinion'>";
            echo "<p><strong>Producto:</strong> " . $opinion['producto'] . "</p>";
            echo "<p><strong>Cliente:</strong> " . $opinion['cliente'] . " " . $opinion['apellidos'] . "</p>";
            echo "<p><strong>Puntuación:</strong> " . $opinion['puntuacion'] . "</p>";
            echo "<p><strong>Comentario:</strong> " . $opinion['comentario'] . "</p>";
            echo "</div>";
        }
        echo "</div>";
    } else {
        echo "<p>No hay opiniones disponibles para esta puntuación.</p>";
    }
} catch (PDOException $e) {
    echo "Error al consultar las opiniones: " . $e->getMessage();
}
?>
