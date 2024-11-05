<?php
require_once '../configuraciones/DBConnection.php';

class UsuarioDAO {
    private $db;

    public function __construct() {
        $this->db = (new DBConnection())->getConnection();
    }

    public function obtenerUsuarioPorEmail($email) {
        $query = "SELECT * FROM usuario WHERE mail = :mail";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':mail', $email);
        $stmt->execute();
        
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
