<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>
    <h1>Iniciar sesión</h1>
    <form action="?action=login" method="post">
        <label for="nick">Nombre de Usuario:</label>
        <input type="text" name="nick" required><br>
        <label for="contraseña">Contraseña:</label>
        <input type="password" name="contraseña" required><br>
        <input type="submit" value="Iniciar Sesión">
    </form>
    <?php if (isset($error)): ?>
        <p style="color: red;"><?php echo $error; ?></p>
    <?php endif; ?>
</body>
</html>
