<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Crear Usuario</title>
    <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>
    <h1>Crear Usuario</h1>
    <form action="?action=create" method="post">
        <label for="mail">Mail:</label>
        <input type="mail" name="mail" required><br>
        <label for="nick">Nombre de Usuario:</label>
        <input type="text" name="nick" required><br>
        <label for="dirección">Dirección:</label>
        <input type="text" name="dirección" required><br>
        <label for="contraseña">Contraseña:</label>
        <input type="password" name="contraseña" required><br>
        <input type="submit" value="Crear">
    </form>
</body>
</html>