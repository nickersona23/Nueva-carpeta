<?php
session_start();
require 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $pass = $_POST['pass'];
    $login_success = "false";
    $error_message = "";

    $stmt = $pdo->prepare('SELECT * FROM usuario WHERE email = ?');
    $stmt->execute([$email]);
    $usuario = $stmt->fetch();

    if ($usuario && password_verify($pass, $usuario['pass'])) {
        $_SESSION['usuario_id'] = $usuario['id'];
         // Contraseña correcta, iniciar sesión
         $_SESSION['email'] = $email;
         $_SESSION['user_id'] = $usuario['id'];
         $_SESSION['nombre'] = $usuario['nombre'];
         $_SESSION['apellido'] = $usuario['apellido'];
        $login_success = "true";
    } else {
        $error_message = "Correo electrónico o contraseña incorrectos.";
    }
    header("Location: ../validar.php?success=$login_success&message=$error_message");
}
?>
