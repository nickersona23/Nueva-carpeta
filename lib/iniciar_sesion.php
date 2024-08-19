<?php
session_start();
require 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $pass = $_POST['pass'];

    $stmt = $pdo->prepare('SELECT * FROM usuario WHERE email = ?');
    $stmt->execute([$email]);
    $usuario = $stmt->fetch();

    if ($usuario && password_verify($pass, $usuario['pass'])) {
        $_SESSION['usuario_id'] = $usuario['id'];
        echo "Inicio de sesión exitoso";
    } else {
        echo "Email o contraseña incorrectos";
    }
}
?>

