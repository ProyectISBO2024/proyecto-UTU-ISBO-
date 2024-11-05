<?php include('header.php'); ?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/style.css">

    <title>Editar Vendedor</title>
</head>
<body>
    <h1>Editar Vendedor</h1>
    <form action="index.php?controller=Vendedor&action=actualizar" method="POST">
        <input type="hidden" name="id" value="<?= $vendedorSeleccionado['id'] ?>">
        
        <label for="nick">Nick:</label>
        <input type="text" name="nick" id="nick" value="<?= $vendedorSeleccionado['nick'] ?>" required>
        
        <label for="direccion">Dirección:</label>
        <input type="text" name="direccion" id="direccion" value="<?= $vendedorSeleccionado['direccion'] ?>" required>
          
        <input type="submit" value="Actualizar">
    </form>
    <a href="index.php?controller=Vendedor&action=listar">Regresar a la Lista de Vendedores</a>
</body>
</html>
<?php include('footer.php'); ?>