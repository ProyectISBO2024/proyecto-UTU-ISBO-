<?php
require_once '../configuraciones/DBConnection.php';

class Producto {
    private $idA;
    private $nombre;
    private $descripcion;
    private $costo;
    private $stock;
    private $imagen;

    private $conn;

    public function __construct() {
        $database = new DBConnection();
        $this->conn = $database->getConnection();
    }

    public function listarProductos() {
        if ($this->conn === null) {
            echo "Error: no se pudo conectar a la base de datos.";
            return [];
        }

        $query = "SELECT * FROM articuloid";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function obtenerProducto($idA) {
        $query = "SELECT * FROM articuloid WHERE idA = :idA";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':idA', $idA, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function guardar() {
        // Obtener un ID disponible si existe
        $query = "SELECT idA FROM ids_disponibles LIMIT 1";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        $idDisponible = $stmt->fetchColumn();
    
        if ($idDisponible !== false) {
            // Si hay un ID disponible, usarlo y eliminarlo de la lista
            $query = "DELETE FROM ids_disponibles WHERE idA = :idA";
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(':idA', $idDisponible, PDO::PARAM_INT);
            $stmt->execute();
            $idA = $idDisponible;
        } else {
            // De lo contrario, usar el último ID autoincremental generado
            $query = "SELECT MAX(idA) as max_id FROM articuloid";
            $stmt = $this->conn->prepare($query);
            $stmt->execute();
            $maxId = $stmt->fetchColumn();
            $idA = $maxId + 1; // Generar un nuevo ID a partir del máximo
        }
    
        // Insertar el nuevo producto
        $query = "INSERT INTO articuloid (idA, nombre, descripcion, costo, stock, imagen) VALUES (:idA, :nombre, :descripcion, :costo, :stock, :imagen)";
        $stmt = $this->conn->prepare($query);
        
        $stmt->bindParam(':idA', $idA);
        $stmt->bindParam(':nombre', $this->nombre);
        $stmt->bindParam(':descripcion', $this->descripcion);
        $stmt->bindParam(':costo', $this->costo);
        $stmt->bindParam(':stock', $this->stock);
        $stmt->bindParam(':imagen', $this->imagen);
        
        return $stmt->execute();
    }
    

    public function actualizar() {
        $query = "UPDATE articuloid SET nombre = :nombre, descripcion = :descripcion, costo = :costo , stock = :stock, imagen = :imagen WHERE idA = :idA";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':idA', $this->idA, PDO::PARAM_INT);
        $stmt->bindParam(':nombre', $this->nombre);
        $stmt->bindParam(':descripcion', $this->descripcion);
        $stmt->bindParam(':costo', $this->costo);
        $stmt->bindParam(':stock', $this->stock);
        $stmt->bindParam(':imagen', $this->imagen);
        return $stmt->execute();
    }

    public function eliminar($idA) {
        $query = "DELETE FROM articuloid WHERE idA = :idA";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':idA', $idA, PDO::PARAM_INT);
        $stmt->execute();
    
        // Agregar el ID a la tabla de IDs disponibles
        $query = "INSERT INTO ids_disponibles (idA) VALUES (:idA)";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':idA', $idA, PDO::PARAM_INT);
        $stmt->execute();
    }
    

    // Getters y Setters

    public function setIdA($idA) {
        $this->idA = $idA;
    }

    public function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    public function setDescripcion($descripcion) {
        $this->descripcion = $descripcion;
    }

    public function setstock($stock) {
        $this->stock = $stock;
    }

    public function setImagen($imagen) {
        $this->imagen = $imagen;
    }
    public function setCosto($costo) {
        $this->costo = $costo;
    }
}
 
