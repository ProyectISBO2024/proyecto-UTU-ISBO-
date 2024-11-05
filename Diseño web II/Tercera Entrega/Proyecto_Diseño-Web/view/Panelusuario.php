<?php include('header.php'); ?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Productos</title>
    <link rel="stylesheet" href="../assets/css/usuario.css">
</head>
<body>

    <table border="1">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Descripcion</th>
                <th>Precio</th>
                <th>Imagen</th>
            </tr>
        </thead>
        <tbody>
        <?php foreach ($productos as $producto): ?>
                <tr>
                
                    <td><?= $producto['nombre'] ?></td>
                    <td><?= $producto['descripcion'] ?></td>
                    <td><?= $producto['costo'] ?></td>
                    <td><img src="../assets/img/<?= $producto['imagen'] ?>" width="50"></td>
                  
                </tr>
            <?php endforeach; ?>
            
        </tbody>
    </table>
</body>
</html>
<?php include('footer.php'); ?>