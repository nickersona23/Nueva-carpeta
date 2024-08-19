<?php
header('Content-Type: application/json');
require '../lib/db.php';

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    if (isset($_GET['id'])) {
        $id = (int) $_GET['id'];
        $stmt = $pdo->prepare('SELECT * FROM producto WHERE id = ?');
        $stmt->execute([$id]);
        $producto = $stmt->fetch();

        if ($producto) {
            echo json_encode($producto);
        } else {
            echo json_encode(['error' => 'Producto no encontrado']);
        }
    } else {
        echo json_encode(['error' => 'ID de producto no proporcionado']);
    }
} else {
    http_response_code(405);
    echo json_encode(['error' => 'Método no permitido']);
}
?>
