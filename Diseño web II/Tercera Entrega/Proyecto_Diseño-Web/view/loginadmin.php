<?php include('header.php'); ?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesión</title>
    <link rel="stylesheet" href="../assets/css/usuario.css">
</head>
<body>
    <h1>Iniciar Sesión</h1>
    
    <!-- Mostrar mensaje de error si existe -->
    <?php 
    if (isset($_SESSION['error_message'])) {
        echo '<div id="error-message">' . $_SESSION['error_message'] . '</div>';
        unset($_SESSION['error_message']);
    }
    ?>

    <!-- Formulario de login -->
    <form action="../index.php?action=authenticate" method="POST">
        <label for="email">Correo Electrónico:</label>
        <input type="email" name="email" id="email" required>
        
        <label for="password">Contraseña:</label>
        <input type="password" name="password" id="password" required>
        
        <button type="submit">Iniciar Sesión</button>
    </form>
</body>
</html>

<?php include('footer.php'); ?>
