<?php include('header.php'); ?> <!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio</title>
    <link rel="stylesheet" href="../assets/css/usuario.css">
</head>
<body>
    <h1>Bienvenido a la gestión</h1>
    <p>Elige una opción para continuar:</p>
    <ul>
    <li><a href="index.php?controller=Producto&action=ingresar">Gestión de Productos</a></li>
    <li><a href="index.php?controller=Usuario&action=listar">Gestión de Vendedores</a></li>
    <li><a href="index.php?controller=VendedorEmpresa&action=crearVendedor">Registrar Vendedor</a></ll>

    <li><a href="../index.html">Salir</a></li>
    </ul>
</body>
</html>
<?php include('footer.php');