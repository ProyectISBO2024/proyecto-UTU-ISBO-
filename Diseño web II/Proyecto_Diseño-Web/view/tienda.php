<?php
session_start();
require_once '../controladores/ProductoController.php';

 include('header.php'); 
$productoController = new ProductoController();
$productoController->listar(); 

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tienda</title>
    <link rel="stylesheet" href="../assets/css/tienda.css">
</head>
<body>
    <h1>Artículos Disponibles</h1>
    <div id="articulos">
        <?php if (empty($productoController)): ?>
            <p>No hay artículos disponibles.</p>
        <?php else: ?>
            <ul>
                <?php foreach ($productoController as $producto): ?>
                    <li>
                        <h2><?php echo htmlspecialchars($producto['nombre']); ?></h2>
                        <p><?php echo htmlspecialchars($producto['descripcion']); ?></p>
                        <p>Precio: <?php echo htmlspecialchars($producto['costo']); ?>$</p>
                    </li>
                <?php endforeach; ?>
            </ul>
        <?php endif; ?>
    </div>
</body>
</html>
<?php include('footer.php'); ?>