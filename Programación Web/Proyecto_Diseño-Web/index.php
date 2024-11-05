<?php include('view/header.php'); ?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Proyecto Diseño Web</title>
    <link rel="stylesheet" href="./assets/css/usuario.css">
    <script src="./assets/js/index.js" defer></script>
</head>
<body>
    <h1>Bienvenido a la Tienda</h1>
    <div id="auth-container">
        <button id="login-btn">Iniciar Sesión</button>
        <button id="adminlogin-btn">Iniciar Sesión como administrador</button>
        <button id="register-btn">Registrarse</button>
        <button id="guest-btn">Acceder a la Tienda como Invitado</button> 
    </div>

</body>
</html>
<?php include('view/footer.php'); ?>