<?php

try{
    $conn = new PDO ("mysql:host=localhost;dbname=tienda;charset=utf8", "root", "");
    if(isset($_POST["num_producto"])){
        $num_prod = $_POST["num_producto"];
        $nom_prod = $_POST["nombre"];
        $cate = $_POST["categoria"];
        $tipo = $_POST["tipo"];
        $precio = $_POST["precio"];
        $marca = $_POST["marca"];
        $desc = $_POST["descripcion"];
        $img = $_POST["imagen"];

        if(isset($_POST["insertar"])){
            if(isset($_POST["num_producto"]) && isset($_POST["nombre"]) && isset($_POST["categoria"]) && isset($_POST["precio"]) && isset($_POST["marca"]) && isset($_POST["descripcion"])){
            $cons = $conn -> prepare("INSERT INTO producto2 (num_producto, nombre, categoria, tipo_piel_cabello, precio, descripcion, imagen, marca) values (:p, :n, :c, :t, :prec, :d, :i, :m)");
            $cons -> bindParam(":p", $num_prod, PDO::PARAM_STR);
            $cons -> bindParam(":n", $nom_prod, PDO::PARAM_STR);
            $cons -> bindParam(":c", $cate, PDO::PARAM_STR);
            $cons -> bindParam(":t", $tipo, PDO::PARAM_STR);
            $cons -> bindParam(":prec", $precio, PDO::PARAM_STR);
            $cons -> bindParam(":d", $desc, PDO::PARAM_STR);
            $cons -> bindParam(":i", $img, PDO::PARAM_STR);
            $cons -> bindParam(":m", $marca, PDO::PARAM_STR);


            $res = $cons->execute();
            if ($res) {
                echo "La consulta al menos no ha dado un error <br>";
            if ($cons->rowCount() > 0) {
                echo "La inserción se realizó con éxito <br>";
            } else {
                echo "No hay errores, pero tampoco se ha insertado <br>";
            }
        }
        } else {
            echo "Debe informar al menos los campos de: numero de producto, nombre, categoria, precio, marca y descripción";
        }

        } else if(isset($_POST["actualizar"])){
            if(isset($_POST["num_producto"])){
            $cons = $conn -> prepare("update producto2 set descripcion = :d, nombre = :n, categoria = :c, tipo_piel_cabello = :t, precio = :prec,  imagen = :i, marca = :m where num_producto = :p");
            $cons -> bindParam(":p", $num_prod, PDO::PARAM_STR);
            $cons -> bindParam(":n", $nom_prod, PDO::PARAM_STR);
            $cons -> bindParam(":c", $cate, PDO::PARAM_STR);
            $cons -> bindParam(":t", $tipo, PDO::PARAM_STR);
            $cons -> bindParam(":prec", $precio, PDO::PARAM_STR);
            $cons -> bindParam(":d", $desc, PDO::PARAM_STR);
            $cons -> bindParam(":i", $img, PDO::PARAM_STR);
            $cons -> bindParam(":m", $marca, PDO::PARAM_STR);
    
            $res = $cons -> execute();
    
            if ($res && $cons->rowCount()>0) {
                echo "La actualización se realizó con éxito";
            } else if ($res){
                echo "Ha intentado actualizar a un valor igual al que ya teníamos";
            } else {
                echo "Ha habido algún tipo de error en la consulta";
            }

        } else {
            echo "Debe de informar el numero de producto que quiere actualizar";
        }

        } else if(isset($_POST["eliminar"])){
            if(isset($_POST["num_producto"])){
            $cons = $conn -> prepare("DELETE FROM producto2 where num_producto = :p");
            $cons -> bindParam(":p", $num_prod, PDO::PARAM_STR);
            $res = $cons -> execute();

            if($res){
                echo "Producto eliminado correctamente";
            } else {
                echo "Error al eliminar el producto";
            }
        } else {
            echo "Debe de informar el numero de producto que quiere eliminar";
        }
        } else {
            echo "La operacion solicitada no esta disponible";
        }
        

    } else if(isset($_POST["num_empleado"])){
        $num_emp = $_POST["num_empleado"];
        $puesto = $_POST["puesto"];
        $nom_emp = $_POST["nombre_e"];
        $ape_emp = $_POST["apellidos_e"];
        $edad = $_POST["edad_e"];
        $ciudad = $_POST["ciudad_e"];

        if(isset($_POST["insertar"])){
            if(isset($_POST["num_empleado"]) && isset($_POST["puesto"]) && isset($_POST["nombre_e"]) && isset($_POST["apellidos_e"]) && isset($_POST["edad_e"]) && isset($_POST["ciudad_e"])){
            $cons = $conn -> prepare("INSERT INTO empleado2 values (:n, :nom, :ap, :e, :c, :p)");
            $cons -> bindParam(":n", $num_emp, PDO::PARAM_STR);
            $cons -> bindParam(":nom", $nom_emp, PDO::PARAM_STR);
            $cons -> bindParam(":ap", $ape_emp, PDO::PARAM_STR);
            $cons -> bindParam(":e", $edad, PDO::PARAM_INT);
            $cons -> bindParam(":c", $ciudad, PDO::PARAM_STR);
            $cons -> bindParam(":p", $puesto, PDO::PARAM_STR);


            $res = $cons->execute();
            if ($res) {
                echo "La consulta al menos no ha dado un error <br>";
            if ($cons->rowCount() > 0) {
                echo "La inserción se realizó con éxito <br>";
            } else {
                echo "No hay errores, pero tampoco se ha insertado <br>";
            }
        }
        }else{
            echo "Debe de informar todos los campos";
        }

        } else if(isset($_POST["actualizar"])){
            if(isset($_POST["num_empleado"])){
            $cons = $conn -> prepare("update empleado2 set nombre = :nom, apellidos = :ap, edad = :e, ciudad = :c,  puesto = :p where num_empleado = :n");
            $cons -> bindParam(":n", $num_emp, PDO::PARAM_STR);
            $cons -> bindParam(":nom", $nom_emp, PDO::PARAM_STR);
            $cons -> bindParam(":ap", $ape_emp, PDO::PARAM_STR);
            $cons -> bindParam(":e", $edad, PDO::PARAM_INT);
            $cons -> bindParam(":c", $ciudad, PDO::PARAM_STR);
            $cons -> bindParam(":p", $puesto, PDO::PARAM_STR);
    
            $res = $cons -> execute();
    
            if ($res && $cons->rowCount()>0) {
                echo "La actualización se realizó con éxito";
            } else if ($res){
                echo "Ha intentado actualizar a un valor igual al que ya teníamos";
                //echo "No se pudo actualizar, porque el nombre indicado no existe";
            } else {
                echo "Ha habido algún tipo de error en la consulta";
            }
        } else {
            echo "Debe de informar el numero de empleado que quiere actualizar";
        }

        } else if(isset($_POST["eliminar"])){
            if(isset($_POST["num_empleado"])){

            $cons = $conn -> prepare("DELETE FROM empleado2 where num_empleado = :n");
            $cons -> bindParam(":n", $num_emp, PDO::PARAM_STR);
            $res = $cons -> execute();

            if($res){
                echo "Dato eliminado correctamente";
            } else {
                echo "Error al eliminar el dato";
            }
            }else {
                echo "Debe de informar el numero de empleado que quiere eliminar";
            }
        } else {
            echo "La operacion solicitada no esta disponible";
        }

    } else if(isset($_POST["dni"])){
        $dni = $_POST["dni"];
        $nom_cl = $_POST["nombre_c"];
        $ape_cl = $_POST["apellidos_c"];
        $tlf = $_POST["telefono"];
        $ciudad_c = $_POST["ciudad_c"];

        if(isset($_POST["insertar"])){
            if(isset($_POST["dni"]) && isset($_POST["nombre_c"]) && isset($_POST["apellidos_c"]) && isset($_POST["telefono"]) && isset($_POST["ciudad_c"])){
                $cons = $conn -> prepare("INSERT INTO cliente values (:dni, :nom, :ap, :t, :c, NULL)");
                $cons -> bindParam(":dni", $dni, PDO::PARAM_STR);
                $cons -> bindParam(":nom", $nom_cl, PDO::PARAM_STR);
                $cons -> bindParam(":ap", $ape_cl, PDO::PARAM_STR);
                $cons -> bindParam(":t", $tlf, PDO::PARAM_STR);
                $cons -> bindParam(":c", $ciudad_c, PDO::PARAM_STR);

                $res = $cons->execute();
                if ($res) {
                    echo "La consulta al menos no ha dado un error <br>";
                if ($cons->rowCount() > 0) {
                    echo "La inserción se realizó con éxito <br>";
                } else {
                    echo "No hay errores, pero tampoco se ha insertado <br>";
                }
            }
            } else {
                echo "Debe de informar todos los campos";
            }
    
            } else if(isset($_POST["actualizar"])){
                if(isset($_POST["dni"])){
                $cons = $conn -> prepare("update cliente set nombre = :nom, apellidos = :ap, telefono = :t, ciudad = :c where DNI = :dni");
                $cons -> bindParam(":dni", $dni, PDO::PARAM_STR);
                $cons -> bindParam(":nom", $nom_cl, PDO::PARAM_STR);
                $cons -> bindParam(":ap", $ape_cl, PDO::PARAM_STR);
                $cons -> bindParam(":t", $tlf, PDO::PARAM_STR);
                $cons -> bindParam(":c", $ciudad_c, PDO::PARAM_STR);
        
                $res = $cons -> execute();
        
                if ($res && $cons->rowCount()>0) {
                    echo "La actualización se realizó con éxito";
                } else if ($res){
                    echo "Ha intentado actualizar a un valor igual al que ya teníamos";
                } else {
                    echo "Ha habido algún tipo de error en la consulta";
                }
    
            } else {
                echo "Debe de informar el numero de producto que quiere actualizar";
            }
    
            } else if(isset($_POST["eliminar"])){
                if(isset($_POST["dni"])){
                $cons = $conn -> prepare("DELETE FROM cliente where DNI = :dni");
                $cons -> bindParam(":dni", $dni, PDO::PARAM_STR);
                $res = $cons -> execute();
    
                if($res){
                    echo "Dato eliminado correctamente";
                } else {
                    echo "Error al eliminar el dato";
                }
            } else {
                echo "Debe de informar el DNI del cliente que quiere eliminar";
            }
            } else {
                echo "La operacion solicitada no esta disponible";
            }

    } else {
        echo "No se ha encontrado nada";
    }


$conn = null;

} catch (PDOException $e){
    $cod = $e -> getCode();

    switch($cod){
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