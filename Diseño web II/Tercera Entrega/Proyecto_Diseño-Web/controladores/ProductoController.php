<?php
require_once '../modelos/Producto.php';

class ProductoController {
    public function listar() {
        $producto = new Producto();
        $productos = $producto->listarProductos();
        require_once '../view/listarProducto.php';
    }
    public function listarUsuario() {
        $producto = new Producto();
        $productos = $producto->listarProductos();
        require_once '../view/Panelusuario.php';
    }
    public function listarvisita() {
        $producto = new Producto();
        $productos = $producto->listarProductos();
        require_once '../view/listarvisita.php';
    }
    public function ingresar() {
        require_once '../view/ingresarProducto.php';
    }

    public function guardar(){
        
        if (isset($_POST['nombre'])) {
            $producto = new Producto();
            $idA  = "SELECT MAX(idA)+1 from articuloid;";
            $producto->setIdA($idA);
            $producto->setstock($_POST['stock']);
            $producto->setNombre($_POST['nombre']);
            $producto->setDescripcion($_POST['descripcion']);
            $producto->setCosto($_POST['costo']);
           
            
            
            // Guardar la imagen
            $nombreImagen = $_FILES['imagen']['name'];
            $rutaImagen = '../assets/img/' . $nombreImagen;
            move_uploaded_file($_FILES['imagen']['tmp_name'], $rutaImagen);
            $producto->setImagen($nombreImagen);
            $producto->guardar();
        }
        header('Location: index.php?controller=Producto&action=listar');
    }

  
    public function editar() {
        $idA = $_GET['idA']; // Obtener el idA del producto a editar
        $producto = new Producto();
        $productoSeleccionado = $producto->obtenerProducto($idA); // Obtener los datos del producto
    
        // Cargar la vista de edición
        require_once '../view/editarProducto.php';
    }
    
  public function actualizar() {
    if (isset($_POST['idA'])) {
        $producto = new Producto();
        $producto->setIdA($_POST['idA']);
        $producto->setNombre($_POST['nombre']);
        $producto->setDescripcion($_POST['descripcion']);
        $producto->setCosto($_POST['costo']);
        $producto->setStock($_POST['stock']);

        // Manejar la imagen (si se proporciona una nueva)
        if (!empty($_FILES['imagen']['name'])) {
            $nombreImagen = $_FILES['imagen']['name'];
            $rutaImagen = '../assets/img/' . $nombreImagen;
            move_uploaded_file($_FILES['imagen']['tmp_name'], $rutaImagen);
            $producto->setImagen($nombreImagen);
        } else {
            // Aquí deberías cargar la imagen existente desde la base de datos
            $productoExistente = $producto->obtenerProducto($_POST['idA']);
            $producto->setImagen($productoExistente['imagen']); // Usar la imagen existente
        }

        $producto->actualizar(); // Llamar al método de actualización
        header('Location: index.php?controller=Producto&action=listar');
    } else {
        echo "Error: idA no está definido.";
        header('Location: index.php?controller=Producto&action=listar');
        exit();
    }
}

    
    

    public function eliminar() {
        $idA = $_GET['idA'];
        $producto = new Producto();
        $producto->eliminar($idA);
        header('Location: index.php?controller=Producto&action=listar');
    }
}
?>
