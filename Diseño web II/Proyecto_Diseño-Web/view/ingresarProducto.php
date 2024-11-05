<?php include('header.php'); ?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ingresar Producto</title>
    <link rel="stylesheet" href="../assets/css/tienda.css">
</head>
<body>
    <h1>Ingresar Nuevo Producto</h1>
    <form action="index.php?controller=Producto&action=guardar" method="POST" enctype="multipart/form-data">
        <label for="nombre">Nombre:</label>
        <input type="text" name="nombre" id="nombre" required>
        
        <label for="descripcion">descripcion:</label>
        <input type="text" name="descripcion" id="descripcion" required>
        
        <label for="costo">Precio:</label>
        <input type="number" step="0.01" name="costo" id="costo" required>

        <label for="stock">Stock:</label>
        <input type="number" step="1" name="stock" id="stock" required>
        
        
        <label for="imagen">Imagen:</label>
        <input type="file" name="imagen" id="imagen" required>
        
        <input type="submit" value="Guardar">
    </form>
    <a href="index.php?controller=Producto&action=listar">Regresar a la Lista de Productos</a>
</body>
</html>
<?php include('footer.php'); ?>