<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Productos</title>
    <link rel="stylesheet" href="../assets/css/usuario.css">
</head>
<body>
    <h1>Lista de Productos</h1>
    <a href="index.php?controller=Producto&action=ingresar">Ingresar Nuevo Producto</a>
    
    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Descripcion</th>
                <th>Precio</th>
                <th>Imagen</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
        <?php foreach ($productos as $producto): ?>
                <tr>
                <td><?= $producto['idA']  ?></td>
                    <td><?= $producto['nombre'] ?></td>
                    <td><?= $producto['descripcion'] ?></td>
                    <td><?= $producto['costo'] ?></td>
                    <td><img src="../assets/img/<?= $producto['imagen'] ?>" width="50"></td>
                    <td>
                    <a href="index.php?controller=Producto&action=editar&idA=<?php echo $producto['idA']; ?>">Editar</a>
                        <a href="index.php?controller=Producto&action=eliminar&idA=<?php echo $producto['idA']; ?>">Eliminar</a>
                        

                    </td>
                </tr>
            <?php endforeach; ?>
            
        </tbody>
    </table>
    <a href="index.php?">volver</a>
</body>
</html>
