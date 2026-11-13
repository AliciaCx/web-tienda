<?php
try {
    $conexion = new PDO("mysql:host=localhost;dbname=tienda;charset=utf8", "root", "");
    $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "ALTER TABLE producto2 ADD imagen VARCHAR(255)";
    $conexion->query($sql);
    echo "Columna 'imagen' añadida correctamente.";
} catch (PDOException $e) {
    echo "Error al añadir la columna: " . $e->getMessage();
}
$conexion = null;
?>

<?php
try {
    $conexion = new PDO("mysql:host=localhost;dbname=tienda;charset=utf8", "root", "");
    $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $rutaImagenes = "adj/productos/";

    $sqlSelect = "SELECT num_producto FROM producto2";
    $stmt = $conexion->query($sqlSelect);
    $productos = $stmt->fetchAll(PDO::FETCH_ASSOC);

    foreach ($productos as $producto) {
        $numProducto = $producto['num_producto'];
        $nombreImagen = $numProducto . ".png"; 
        $rutaCompleta = $rutaImagenes . $nombreImagen;

        $sqlUpdate = "UPDATE producto2 SET imagen = :imagen WHERE num_producto = :num_producto";
        $stmtUpdate = $conexion->prepare($sqlUpdate);
        $stmtUpdate->execute([
            ':imagen' => $rutaCompleta,
            ':num_producto' => $numProducto
        ]);
    }

    echo "Columna 'imagen' actualizada correctamente.";
} catch (PDOException $e) {
    echo "Error al actualizar la columna: " . $e->getMessage();
}

$conexion = null;
?>
