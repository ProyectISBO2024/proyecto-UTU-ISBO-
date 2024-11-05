<?php
require_once '../logica_negocio/controladores/ProductoController.php';

$productoController = new ProductoController();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = json_decode(file_get_contents("php://input"), true);
    $nombre = $data['nombre'];
    $descripcion = $data['descripcion'];
    $precio = $data['precio'];
    $stock = $data['stock'];

    if ($productoController->agregarProducto($nombre, $descripcion, $precio, $stock)) {
        echo json_encode(["message" => "Producto agregado correctamente"]);
    } else {
        echo json_encode(["message" => "Error al agregar el producto"]);
    }
} elseif ($_SERVER['REQUEST_METHOD'] === 'GET') {
    echo json_encode($productoController->obtenerProductos());
}
?>
