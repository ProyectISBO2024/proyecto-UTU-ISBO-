<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Usuarios</title>
    <link rel="stylesheet" href="../assets/css/usuario.css">
</head>
<body>
    <h1>Lista de Usuarios</h1>
    <a href="index.php?controller=Usuario&action=ingresar">Ingresar Nuevo Usuario</a>
    
    <table border="1">
        <thead>
            <tr>
                <th>IdC</th>
                <th>Nick</th>
                <th>Mail</th>
                <th>Dirección</th>
</th>
            </tr>
        </thead>
        <tbody>
    <?php if (!empty($usuarios)): ?> 
        <?php foreach ($usuarios as $usuario): ?>
            <tr>
                <td><?= $usuario['idC'] ?></td>
                <td><?= $usuario['nick'] ?></td>
                <td><?= $usuario['mail'] ?></td>

                <td><?= $usuario['dirección'] ?></td>
                <td>
                    <a href="index.php?controller=Usuario&action=editar&idC=<?= $usuario['idC']; ?>">Editar</a>
                    <a href="index.php?controller=Usuario&action=eliminar&idC=<?= $usuario['idC']; ?>">Eliminar</a>
                </td>
            </tr>
        <?php endforeach; ?>
    <?php else: ?>
        <tr>
            <td colspan="6">No hay usuarios registrados.</td>
        </tr>
    <?php endif; ?>
</tbody>

    </table>
    <a href="index.php?">Volver</a>
</body>
</html>
