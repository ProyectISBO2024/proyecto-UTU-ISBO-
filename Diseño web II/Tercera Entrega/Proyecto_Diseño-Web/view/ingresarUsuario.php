<?php include('header.php'); ?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/usuario.css">
    <title>Ingresar Usuario</title>
</head>
<body>
    <h1>Ingresar Usuario</h1>
    <form action="index.php?controller=Usuario&action=crearusr" method="POST">
        <label for="nick">Nombre:</label>
        <input type="text" name="nick" id="nick" required>

        <label for="mail">Mail:</label>
        <input type="text" name="mail" id="mail" required>
        
        <label for="dirección">Dirección:</label>
        <input type="text" name="dirección" id="dirección" required>

        <label for="contraseña">Contraseña:</label>
        <input type="password" name="contraseña" id="contraseña" required>

        <input type="submit" value="Guardar">
    </form>
    <h>ya tienes una cuenta? </h><a href="login.php"> ingresa aqui</a>
</body>
</html>
<?php include('footer.php'); ?>