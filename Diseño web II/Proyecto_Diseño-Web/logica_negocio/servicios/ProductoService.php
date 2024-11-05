<?php
require_once '../acceso_datos/ProductoDAO.php';

class ProductoService {
    private $productoDAO;

    public function __construct() {
        $this->productoDAO = new ProductoDAO();
    }

    public function listarProductos() {
        return $this->productoDAO->getAllProductos(); 
    }




    public function agregarProducto($producto) {
        return $this->productoDAO->addProducto($producto['idCat'], $producto['idE'], $producto['imagen']);
    }

    public function obtenerProducto($idA) {
        return $this->productoDAO->getProductoById($idA);
    }

    public function actualizarProducto($producto) {
        return $this->productoDAO->updateProducto($producto);
    }

    public function eliminarProducto($idA) {
        return $this->productoDAO->deleteProducto($idA);
    }
}
?>
