<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrar Vendedor Empresa</title>
</head>
<body>
    <h1>Registrar Vendedor Empresa</h1>
    
    <form action="index.php?controller=VendedorEmpresa&action=registrar" method="POST">
    <label for="idC">ID del Usuario:</label>
    <input type="number" name="idC" id="idC" required>
    
    <label for="telefono">Teléfono:</label>
    <input type="text" name="telefono" id="telefono" required>
    
    <button type="submit">Registrar Vendedor</button>
</form>
</body>
</html>
