<?php
session_start();
session_unset();
session_destroy();
echo "Sesión cerrada";
?>

<a href="login.php">Iniciar sesión</a>
