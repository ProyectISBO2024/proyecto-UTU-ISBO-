<?php
session_start();
require_once '../controladores/ProductoController.php';
include('header.php'); 

$productoController = new ProductoController();
$productoController->listarvisita(); 

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
  
</body>
</html>
<?php include('footer.php'); ?>