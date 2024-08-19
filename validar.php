<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>

<body>
    <?php
    // Inicializar variables para manejar mensajes
    $login_success = false;
    $error_message = "";

    // Verificar si se ha enviado el formulario
    if ($_SERVER["REQUEST_METHOD"] == "GET") {
        $login_success = $_GET["success"];
        $error_message = $_GET["message"];
    }

    ?>

    <div class="login-container">
        <?php if ($login_success === "true") : ?>
            <p class="success-message">Inicio de sesión exitoso. Redirigiendo...</p>
            <script>
                setTimeout(function() {
                    window.location.href = 'index.php'; // Cambiar a la página de inicio correspondiente
                }, 3000); // Redirigir después de 3 segundos
            </script>
        <?php else : ?>
            <p class="error-message"><?php echo $error_message; ?></p>
            <script>
                setTimeout(function() {
                   window.location.href = 'login.php'; // Redirigir después de 1 segundo
                }, 1000);
            </script>
        <?php endif; ?>
    </div>

</body>

</html>
