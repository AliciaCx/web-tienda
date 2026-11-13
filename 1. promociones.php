<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Promociones</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js" integrity="sha384-k6d4wzSIapyDyv1kpU366/PK5hCdSbCRGRCMv+eplOQJWyd1fbcAu9OCUj5zNLiq" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="0. estilos.css">
</head>
<body>
    <nav class="navbar navbar-expand custom-bg">
        <div class="container-fluid">
            <a href="0. pag_inicial.html" class="navbar-brand inicio"><img src="adj/casa.png" alt="Inicio" width="35px"></a>
        
            <ul class="nav navbar-nav ms-auto">
                <li class="nav-item">
                    <a href="#ini" class="nav-link active" data-bs-toggle="tab"><img src="adj/promociones.png" alt="Inicio" width="30px"></a>
                </li>
                <li class="nav-item">
                    <a href="#basico" class="nav-link" data-bs-toggle="tab">Ofertas básicas</a>
                </li>
                <li class="nav-item">
                    <a href="#vip" class="nav-link" data-bs-toggle="tab">Ofertas VIP</a>
                </li>
                <li class="nav-item">
                    <a href="#premium" class="nav-link" data-bs-toggle="tab">Ofertas PREMIUM</a>
                </li>
            </ul>
        </div>
    </nav>

    <div class="tab-content">
        <div class=" tab-pane active" id="ini">
            <div class= "introduccion">
            <h1>Beauty Ofertas</h1>
            <p>¡Nos encantan nuestras ofertas especiales! Aquí podrás descubrir promociones irresistibles, ofertas únicas y regalos por compra que no querrás dejar escapar. Tanto si eres un cliente nuevo como si eres parte de nuestros exclusivos programas, ¡tenemos algo especial para ti!</p>
            <p>No dejes pasar la oportunidad de disfrutar de nuestras ofertas y llevarte productos fantásticos con beneficios extra.</p>
            </div>
        </div>

        <div id="basico" class="tab-pane">
            <h2>Contenido de Ofertas Básicas</h2>
            <div class="contenido">
                <img src="adj/basico/welcome.png" alt="Promocion">
                <div class="texto">
                    <h4>DESCUENTO EN TU PRIMERA COMPRA</h4>
                    <el>Disfruta de un 15% de descuento en tu primera compra >59€ con el código WELCOME.</p>
                    <p>¡LO NECESITO!</p>
                </div>
            </div>

            <div class="contenido">
                <div class="texto">
                    <h4>DESCUENTO PARA ESTUDIANTES</h4>
                    <p>Si eres estudiante puedes beneficiarte de un 20% de descuento por compras superiores a 50€ </p>
                    <p>¡PARA MI!</p>
                </div>
                <img src="adj/basico/estudiante.png" alt="Promocion">
            </div>

            <div class="contenido">
                <img src="adj/basico/prueba.png" alt="Promocion">
                <div class="texto">
                    <h4>Prueba... primero</h4>
                    <el>¡Descubre, prueba y déjate enamorar por tu próximo perfume, tratamiento y/o maquillaje favorito! Recibe una muestra y pruébalo en casa.</p>
                    <p>¡Quédatelo si te gusta y si no devuélvelo sin problemas!</p>
                </div>
            </div>

            <div class="contenido">
                <div class="texto">
                    <h4>3 MINIS DE REGALO</h4>
                    <p>3 minitallas por compras superiores a 59€ Código: GIFTTRIO. Hasta fin de existencias.</p>
                </div>
                <img src="adj/basico/minis.png" alt="Promocion">
            </div>

            <div class="contenido">
                <img src="adj/basico/neceser.png" alt="Promocion">
                <div class="texto">
                    <h4>UN NECESER DE REGALO</h4>
                    <el>Consigue un neceser de regalo por compras superiores a 60€.</p>
                </div>
            </div>

        </div>

        <div id="vip" class="tab-pane">
            <h2>Contenido de Ofertas VIP</h2>
            <?php
            try {
            $conn = new PDO("mysql:host=localhost;dbname=tienda;charset=utf8", "root", "");
            $query = "SELECT promociones FROM vip";
            $res = $conn->prepare($query);
            $res->execute();
            $o_vip = $res->fetchAll(PDO::FETCH_ASSOC);

            echo "<div class='vip'>";
                foreach ($o_vip as $vip) {
                echo "<div class='o_vip'>";
                echo  $vip['promociones'];
                echo "</div>";
            }
            echo "</div>";

            } catch (PDOException $e) {
                echo "Error al obtener ofertas premium: " . $e->getMessage();
            }
            ?>
        </div>

        <div id="premium" class="tab-pane">
            <h2>Contenido de Ofertas PREMIUM</h2>
            <?php
            try {
            $conn = new PDO("mysql:host=localhost;dbname=tienda;charset=utf8", "root", "");
            $query = "SELECT descuento FROM premium";
            $res = $conn->prepare($query);
            $res->execute();
            $o_premium = $res->fetchAll(PDO::FETCH_ASSOC);

            echo "<div class='premium'>";
                foreach ($o_premium as $premium) {
                echo "<div class='o_premium'>";
                echo  $premium['descuento'];
                echo "</div>";
            }
            echo "</div>";

            } catch (PDOException $e) {
                echo "Error al obtener ofertas premium: " . $e->getMessage();
            }
            ?>
        </div>
    </div>

</body>
</html>