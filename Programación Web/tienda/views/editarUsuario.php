<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Editar Usuario</title>
    <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>
    <h1>Editar Usuario</h1>
    <form action="?action=edit&id=<?php echo $usuario['idC']; ?>" method="post">
        <input type="hidden" name="idC" value="<?php echo $usuario['idC']; ?>">
        <label for="mail">Mail:</label>
        <input type="mail" name="mail" value="<?php echo $usuario['mail']; ?>" required><br>

        <label for="nick">Nick:</label>
        <input type="text" name="nick" value="<?php echo $usuario['nick']; ?>" required><br>

        <label for="dirección">Dirección:</label>
        <input type="text" name="dirección" value="<?php echo $usuario['dirección']; ?>" required><br>

        <label for="contrasena">Contraseña:</label>
        <input type="password" name="contraseña" required><br>

        <input type="submit" value="Actualizar">
    </form>
    <a class="button" href="?action=list">Volver a la lista</a>
</body>
</html>
