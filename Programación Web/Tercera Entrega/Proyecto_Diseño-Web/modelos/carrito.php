<?php

class Carrito {
    private $productos = [];

    public function __construct() {
        if (isset($_SESSION['carrito'])) {
            $this->productos = $_SESSION['carrito'];
        }
    }

    // Agregar producto al carrito
    public function agregarProducto($productoId, $cantidad) {
        if (isset($this->productos[$productoId])) {
            $this->productos[$productoId] += $cantidad;
        } else {
            $this->productos[$productoId] = $cantidad;
        }
        $_SESSION['carrito'] = $this->productos;
    }

    // Eliminar producto del carrito
    public function eliminarProducto($productoId) {
        if (isset($this->productos[$productoId])) {
            unset($this->productos[$productoId]);
            $_SESSION['carrito'] = $this->productos;
        }
    }

    // Modificar cantidad de un producto en el carrito
    public function actualizarCantidad($productoId, $cantidad) {
        if (isset($this->productos[$productoId])) {
            if ($cantidad > 0) {
                $this->productos[$productoId] = $cantidad;
            } else {
                $this->eliminarProducto($productoId);
            }
            $_SESSION['carrito'] = $this->productos;
        }
    }

    // Obtener los productos del carrito
    public function obtenerCarrito() {
        return $this->productos;
    }
}

