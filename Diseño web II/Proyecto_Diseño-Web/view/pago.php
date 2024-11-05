<?php include('header.php'); 
session_start();
require_once '../modelos/Carrito.php';

$carrito = new Carrito();

// Manejo de la eliminación de productos del carrito
if (isset($_POST['eliminar'])) {
    $productoId = $_POST['producto_idB'];
    $carrito->eliminarProducto($productoId);
    $_SESSION['mensaje'] = "Producto eliminado del carrito";
}

// Manejo de la actualización de la cantidad de productos
if (isset($_POST['actualizar'])) {
    $productoId = $_POST['producto_idC'];
    $cantidad = $_POST['cantidad'];
    $carrito->actualizarCantidad($productoId, $cantidad);
    $_SESSION['mensaje'] = "Cantidad de producto actualizada";
}

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pago</title>
    <link rel="stylesheet" href="../assets/css/tienda.css">
    <style>
        .mensaje {
            display: none;
            background-color: #4CAF50;
            color: white;
            padding: 10px;
            margin-top: 20px;
            text-align: center;
            border-radius: 5px;
        }
    </style>
</head>
<body>

<h2>Detalles del Carrito</h2>

<?php 
if (isset($_SESSION['mensaje'])) {
    echo "<div class='mensaje'>" . $_SESSION['mensaje'] . "</div>";
    unset($_SESSION['mensaje']);
}
?>

<ul>
    <?php
    // Obtener todos los productos en el carrito
    foreach ($carrito->obtenerCarrito() as $id => $cantidad) {
        echo "<li>Producto ID: $id, Cantidad: $cantidad 
                <form method='post' style='display:inline;'>
                    <input type='hidden' name='producto_idB' value='$id'>
                    <button type='submit' name='eliminar'>Eliminar</button>
                </form>
                <form method='post' style='display:inline;'>
                    <input type='number' name='cantidad' value='$cantidad' min='1'>
                    <input type='hidden' name='producto_idC' value='$id'>
                    <button type='submit' name='actualizar'>Actualizar Cantidad</button>
                </form>
              </li>";
    }
    ?>
</ul>

<!-- Botón para proceder al pago -->
<?php if (count($carrito->obtenerCarrito()) > 0): ?>
    <form action="pago_final.php" method="get">
        <button type="submit">Proceder al Pago</button>
    </form>
<?php endif; ?>

<!-- Botón para volver a la tienda -->
<form action="tiendausuario.php" method="get">
    <button type="submit">Volver a la Tienda</button>
</form>

<script>
    // Mostrar el mensaje cuando haya uno en la sesión
    window.onload = function() {
        var mensaje = document.querySelector(".mensaje");
        if (mensaje && mensaje.innerHTML.trim() !== "") {
            mensaje.style.display = "block"; // Muestra el mensaje
            setTimeout(function() {
                mensaje.style.display = "none"; // Oculta el mensaje después de 3 segundos
            }, 3000);
        }
    };
</script>

</body>
</html>
<?php include('footer.php'); ?>