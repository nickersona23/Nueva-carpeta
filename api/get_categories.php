<?php
header('Content-Type: application/json');
require '../lib/db.php';

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    if (isset($_GET['nombre'])) {
        $nombre = $_GET['nombre'];
        $stmt = $pdo->prepare('SELECT * FROM producto WHERE nombre LIKE ?');
        $stmt->execute(["%$nombre%"]);
        $productos = $stmt->fetchAll();
        echo json_encode($productos);
    } else {
        $stmt = $pdo->query('SELECT * FROM producto');
        $productos = $stmt->fetchAll();
        echo json_encode($productos);
    }
} else {
    http_response_code(405);
    echo json_encode(['error' => 'Método no permitido']);
}
?>
