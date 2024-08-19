<?php
require 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $email = $_POST['email'];
    $pass = password_hash($_POST['pass'], PASSWORD_BCRYPT);
    $direccion = $_POST['direccion'];
    $telefono = $_POST['telefono'];

    $stmt = $pdo->prepare('INSERT INTO usuario (nombre, apellido, email, pass, direccion, telefono) VALUES (?, ?, ?, ?, ?, ?)');
    if ($stmt->execute([$nombre, $apellido, $email, $pass, $direccion, $telefono])) {
        echo "Registro exitoso";
    } else {
        echo "Error en el registro";
    }
}
?>


