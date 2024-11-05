<?php include('header.php'); ?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesión</title>
    <link rel="stylesheet" href="../assets/css/usuario.css">
    <script src="../assets/js/login.js" defer></script>
</head>
<body>
    <h1>Iniciar Sesión</h1>
    <form id="login-form">
        <label for="email">Correo Electrónico:</label>
        <input type="email" id="email" required>
        
        <label for="password">Contraseña:</label>
        <input type="password" id="password" required>
        
        <button type="submit">Iniciar Sesión</button>
    </form>
    <div id="error-message" class="hidden"></div>
    <p>¿No tienes una cuenta? <a href="ingresarUsuario.php">Regístrate aquí</a></p>
</body>
</html>
<?php include('footer.php'); ?>