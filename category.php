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
    require "lib/navbar.php"
    ?>
    <main class="">
    <?php
    require './lib/db.php';

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
            echo $productos[0]["id"];
        }
    } else {
        $stmt = $pdo->query('SELECT * FROM producto');
        $productos = $stmt->fetchAll();
        echo $productos[0]["id"];
    }
    ?>

    </main>
    <?php 
       require "lib/footer.php"
    ?>
</body>
</html>