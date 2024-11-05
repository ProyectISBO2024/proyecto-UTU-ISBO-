<?php
session_start();
require_once '../controladores/ProductoController.php';
require_once '../modelos/Carrito.php';
//Verificar si el usuario está autenticado
if (!isset($_SESSION['usuario'])) {
    // Si no está autenticado, redirigir al login
    header("Location: login.php");
    exit();
}

// Obtener el nick del usuario
$usuario = $_SESSION['usuario'];
$nick = $usuario['nick'];

$productoController = new ProductoController();
$productoController->listarusuario();

$carrito = new Carrito();

// Manejo de la adición de productos al carrito
if (isset($_POST['agregar'])) {
    $productoId = $_POST['producto_idA'];
    $cantidad = $_POST['cantidad'];
    $carrito->agregarProducto($productoId, $cantidad);
    $_SESSION['mensaje'] = "Producto agregado al carrito";
}

// Manejo de la eliminación de productos del carrito
if (isset($_POST['eliminar'])) {
    $productoId = $_POST['producto_idB'];
    $carrito->eliminarProducto($productoId);
    $_SESSION['mensaje'] = "Producto eliminado del carrito";
}

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tienda</title>
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

    <h1>Bienvenido, <?= htmlspecialchars($nick) ?>!</h1>
    
    <p><a href="logout.php">Cerrar sesión</a></p>

<h2>Carrito de Compras</h2>
<ul>
    <?php
    foreach ($carrito->obtenerCarrito() as $id => $cantidad) {
        echo "<li>Producto ID: $id, Cantidad: $cantidad
                <form method='post' style='display:inline;'>
                    <input type='hidden' name='producto_idB' value='$id'>
                    <button type='submit' name='eliminar'>Eliminar</button>
                </form>
              </li>";
    }
    ?>
</ul>

<!-- Mensaje de éxito -->
<div class="mensaje" id="mensaje">
    <?php 
    if (isset($_SESSION['mensaje'])) {
        echo $_SESSION['mensaje']; 
        unset($_SESSION['mensaje']);  // Eliminar mensaje después de mostrarlo
    }
    ?>
</div>

<!-- Botón para proceder al pago -->
<?php if (count($carrito->obtenerCarrito()) > 0): ?>
    <form action="pago.php" method="get">
        <button type="submit">Proceder al Pago</button>
    </form>
<?php endif; ?>

<script>
    // Mostrar el mensaje cuando haya uno en la sesión
    window.onload = function() {
        var mensaje = document.getElementById("mensaje");
        if (mensaje.innerHTML.trim() !== "") {
            mensaje.style.display = "block"; // Muestra el mensaje
            setTimeout(function() {
                mensaje.style.display = "none"; // Oculta el mensaje después de 3 segundos
            }, 1000);
        }
    };
</script>

</body>
</html>

<?php include('footer.php'); ?>
