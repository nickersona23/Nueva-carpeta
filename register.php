<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de Registro</title>
    <link rel="stylesheet" href="./assect/register.css">
</head>
<body>
<div class="container">

    <!-- Formulario de registro -->
    <form method="post" action="lib/registrar.php">
        <label for="nombre">Nombre:</label>
        <input type="text" id="nombre" name="nombre" class="input-field" required>

        <label for="apellido">Apellido:</label>
        <input type="text" id="apellido" name="apellido" class="input-field" required>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" class="input-field" required>

        <label for="pass">Contraseña:</label>
        <input type="password" id="pass" name="pass" class="input-field" required>

        <label for="direccion">Dirección:</label>
        <input type="text" id="direccion" name="direccion" class="input-field" required>

        <label for="telefono">Teléfono:</label>
        <input type="text" id="telefono" name="telefono" class="input-field" required>

        <button type="submit" class="register-button">Registrarse</button>
    </form>

    <a href="../index.php" class="login-link">¿Ya tienes cuenta? Inicia sesión</a>
</div>
</body>
</html>
