<?php include('headeradmin.php'); ?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Producto</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <h1>Editar Producto</h1>
    <form action="index.php?controller=Producto&action=actualizar" method="POST" enctype="multipart/form-data">
    <input type="hidden" name="idA" value="<?php echo $productoSeleccionado['idA']; ?>">
    
    <label>Nombre:</label>
    <input type="text" name="nombre" value="<?php echo $productoSeleccionado['nombre']; ?>" required>

    <label>Descripción:</label>
    <textarea name="descripcion" required><?php echo $productoSeleccionado['descripcion']; ?></textarea>

    <label>Costo:</label>
    <input type="number" name="costo" value="<?php echo $productoSeleccionado['costo']; ?>" required>

    <label>Stock:</label>
    <input type="number" name="stock" value="<?php echo $productoSeleccionado['stock']; ?>" required>

    <label>Imagen:</label>
    <input type="file" name="imagen">

    <input type="submit" value="Actualizar">
</form>

</form>

    <a href="index.php?controller=Producto&action=listar">Regresar a la Lista de Productos</a>
</body>
</html>
<?php include('header.php'); ?>