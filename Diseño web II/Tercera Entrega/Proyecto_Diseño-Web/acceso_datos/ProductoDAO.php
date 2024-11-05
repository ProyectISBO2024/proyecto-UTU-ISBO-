<?php
require_once '../configuraciones/DBConnection.php';

class ProductoDAO {
    private $connection;

    public function __construct() {
        $dbConnection = new DBConnection();
        $this->connection = $dbConnection->getConnection();
    }

    // Método para agregar un nuevo producto
    public function addProducto($idCat, $idE, $imagen) {
        try {
            $query = "INSERT INTO articulo (idCat, idE, imagen) VALUES (:idCat, :idE, :imagen)";
            $stmt = $this->connection->prepare($query);
            $stmt->bindParam(':idCat', $idCat);
            $stmt->bindParam(':idE', $idE);
            $stmt->bindParam(':imagen', $imagen);
            return $stmt->execute();
        } catch (PDOException $exception) {
            echo "Error al agregar producto: " . $exception->getMessage();
            return false;
        }
    }

    // Método para obtener todos los productos
    public function getAllProductos() {
        try {
            $query = "SELECT * FROM articulo";
            $stmt = $this->connection->prepare($query);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $exception) {
            echo "Error al obtener productos: " . $exception->getMessage();
            return [];
        }
    }

    // Método para obtener un producto por ID
    public function getProductoById($idA) {
        try {
            $query = "SELECT * FROM articulo WHERE idA = :idA";
            $stmt = $this->connection->prepare($query);
            $stmt->bindParam(':idA', $idA);
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $exception) {
            echo "Error al obtener producto: " . $exception->getMessage();
            return null;
        }
    }

    // Método para eliminar un producto
    public function deleteProducto($idA) {
        try {
            $query = "DELETE FROM articulo WHERE idA = :idA";
            $stmt = $this->connection->prepare($query);
            $stmt->bindParam(':idA', $idA);
            return $stmt->execute();
        } catch (PDOException $exception) {
            echo "Error al eliminar producto: " . $exception->getMessage();
            return false;
        }
    }

    // Método para actualizar un producto
    public function updateProducto($producto) {
        try {
            $query = "UPDATE articulo SET nombre = :nombre, cantidad = :cantidad, precio = :precio, imagen = :imagen WHERE idA = :idA";
            $stmt = $this->connection->prepare($query);
            $stmt->bindParam(':nombre', $producto['nombre']);
            $stmt->bindParam(':cantidad', $producto['cantidad']);
            $stmt->bindParam(':precio', $producto['precio']);
            $stmt->bindParam(':imagen', $producto['imagen']);
            $stmt->bindParam(':idA', $producto['idA']);
            return $stmt->execute();
        } catch (PDOException $exception) {
            echo "Error al actualizar producto: " . $exception->getMessage();
            return false;
        }
    }
}
?>
