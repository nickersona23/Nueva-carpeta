<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./assect/layout.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:ital,wght@0,200..1000;1,200..1000&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
</head>

<body>
    <?php
    session_start();
    require "lib/navbar.php"
    ?>
    <main class="">
        <div class="container_categorie">
            <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 lg:grid-cols-3">
                <?php

                require './lib/db.php';
                function rederElement($id, $name, $descripcion, $precio)
                {
                    echo "<div class='card-container'><div class='card-header'><h2 class='card-title'>$name</h2></div><div class='card-content'><img src='https://via.placeholder.com/150' alt='Imagen del Producto' class='card-image'><div class='card-description'><p class='card-text'>$descripcion</p><p class='card-price'>$precio$</p></div></div><div class='card-footer'><button class='card-pay-button' onclick='guardarProductoEnLocalStorage($id)'>Añadir</button></div></div>";
                }

                if ($_SERVER['REQUEST_METHOD'] === 'GET') {
                    if (isset($_GET['nombre'])) {
                        $nombre = $_GET['nombre'];
                        $stmt = $pdo->prepare('SELECT * FROM producto WHERE nombre LIKE ?');
                        $stmt->execute(["%$nombre%"]);
                        $productos = $stmt->fetchAll();

                        echo $productos["id"];
                    } else {
                        $stmt = $pdo->query('SELECT * FROM producto');
                        $productos = $stmt->fetchAll();

                        foreach ($productos as $key => $value) {
                            rederElement($value["id"], $value["nombre"], $value["descripcion"], $value["precio"]);
                        }
                    }
                } else {
                    $stmt = $pdo->query('SELECT * FROM producto');
                    $productos = $stmt->fetchAll();
                    echo 4124;
                }
                echo "</div></div>";
                require "lib/carrito.php";
                ?>

    </main>
    <?php
    require "lib/footer.php"
    ?>

    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <script src="./assect/carrito.js"></script>
</body>

</html>