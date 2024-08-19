<?php
session_start();
session_unset();
session_destroy();
header("Location: ../cerrar_sesion.php")
?>

<a href="login.php">Iniciar sesión</a>
