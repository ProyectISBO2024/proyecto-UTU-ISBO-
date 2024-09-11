<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Lista de Usuarios</title>
    <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>
    <h1>Lista de Usuarios</h1>
    <table>
        <tr>
            <th>IdC</th>
            <th>Mail</th>
            <th>Nombre de Usuario</th>
            <th>Dirección</th>
            <th>Acciones</th>
        </tr>
        <?php while ($row = $usuario->fetch_assoc()): ?>
            <tr>
                <td><?php echo $row['idC']; ?></td>
                <td><?php echo $row['mail']; ?></td>
                <td><?php echo $row['nick']; ?></td>
                <td><?php echo $row['dirección']; ?></td>
                <td>
                    <a href="?action=edit&idC=<?php echo $row['idC']; ?>">Editar</a>
                    <a href="?action=delete&idC=<?php echo $row['idC']; ?>">Eliminar</a>
                </td>
            </tr>
        <?php endwhile; ?>
    </table>
    <br>
    <a href="?action=create">Crear Nuevo Usuario</a>
    <br>
    <a href="?action=logout">Cerrar Sesión</a>
</body>
</html>
