<?php
if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    header('Content-Type: application/json');
    try {
        $conn = new PDO("mysql:host=localhost;dbname=tienda;charset=utf8", "root", "");
        $query = "SELECT num_producto, nombre FROM producto2";
        $res = $conn->prepare($query);
        $res->execute();
        $productos = $res->fetchAll(PDO::FETCH_ASSOC);

        echo json_encode($productos);
    } catch (PDOException $e) {
        echo json_encode(['error' => $e->getMessage()]);
    }
    exit; 
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $op = $_POST["accion"] ?? "Otra";

    $cod_prod = $_POST["codigo_producto"];
    $dni = $_POST["cliente"];
    $punt = $_POST["puntuacion"];
    $com = $_POST["comentario"];

    try {
        $conn = new PDO("mysql:host=localhost;dbname=tienda;charset=utf8", "root", "");
        if ($op == "Insertar") {
            if (isset($_POST["codigo_producto"]) && isset($_POST["cliente"]) && isset($_POST["puntuacion"]) && isset($_POST["comentario"])) {
                $comprobar_dni = $conn->prepare("SELECT COUNT(*) FROM cliente WHERE DNI = :dni");
                $comprobar_dni->bindParam(":dni", $dni, PDO::PARAM_STR);
                $comprobar_dni->execute();
                $existe_dni = $comprobar_dni->fetchColumn();
        
                if ($existe_dni > 0) {
                    $cons = $conn->prepare("INSERT INTO puntua (num_producto, DNI, nota, comentario) VALUES (:cod, :dni, :p, :com)");
                    $cons->bindParam(":cod", $cod_prod, PDO::PARAM_INT);
                    $cons->bindParam(":dni", $dni, PDO::PARAM_STR);
                    $cons->bindParam(":p", $punt, PDO::PARAM_INT);
                    $cons->bindParam(":com", $com, PDO::PARAM_STR);
        
                    $res = $cons->execute();
                    if ($res) {
                        echo "La inserción se realizó con éxito <br>";
                    } else {
                        echo "No hay errores, pero tampoco se ha insertado <br>";
                    }
                } else {
                    echo "El DNI proporcionado no se encuentra registrado en nuestra base de datos. No puede escribir una reseña.";
                }
            } else {
                echo "Debe informar todos los campos requeridos";
            }

        } else if($op == "Actualizar"){
            if(isset($_POST["codigo_producto"]) && isset($_POST["cliente"])){
            $cons = $conn -> prepare("update puntua set nota= :n, comentario = :com where num_producto = :p and DNI = :dni");
            $cons -> bindParam(":p", $cod_prod, PDO::PARAM_INT);
            $cons -> bindParam(":dni", $dni, PDO::PARAM_STR);
            $cons -> bindParam(":n", $punt, PDO::PARAM_INT);
            $cons -> bindParam(":com", $com, PDO::PARAM_STR);
    
            $res = $cons -> execute();
    
            if ($res && $cons->rowCount()>0) {
                echo "La actualización se realizó con éxito";
            } else if ($res){
                echo "Ha intentado actualizar a un valor igual al que ya teníamos";
            } else {
                echo "Ha habido algún tipo de error en la consulta";
            }
        } else {
            echo "Debe de informar el producto y su DNI para eliminar la reseña";
        }


        } else if($op == "Eliminar"){
            if(isset($_POST["codigo_producto"]) && isset($_POST["cliente"])){
            $cons = $conn -> prepare("DELETE FROM puntua WHERE num_producto = :p AND DNI = :d");
            $cons -> bindParam(":p", $cod_prod, PDO::PARAM_INT);
            $cons -> bindParam(":d", $dni, PDO::PARAM_STR);
            $res = $cons -> execute();

            if($res){
                echo "Dato eliminado correctamente";
            } else {
                echo "Error al eliminar el dato";
            }
            }else {
                echo "Debe de informar el producto y su DNI para eliminar la reseña";
            }
        
        } else {
            echo "La operacion solicitada no esta disponible";
        }

        $conn = null;

    } catch (PDOException $e) {
        $cod = $e->getCode();

        switch ($cod) {
            case 2002:
                echo "Lo sentimos, pero el servidor de base de datos no está disponible en este momento, por favor inténtelo de nuevo más tarde";
                break;
            case 23000:
                echo "No podemos insertar el dato indicado, porque ya se encuentra en nuestra base de datos";
                break;
            default:
                echo $e->getMessage();
                break;
        }
    }
}
?>

