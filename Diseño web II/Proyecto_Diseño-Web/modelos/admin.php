<?php
require_once '../config/DBConnection.php';

class Admin {

    // Método para obtener un usuario por su email
    public function getUserByEmail($email) {
        $db = new DBConnection();
        $conn = $db->getConnection();

        // Consulta SQL para obtener el usuario por email
        $sql = "SELECT * FROM usuarios WHERE email = :email LIMIT 1";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':email', $email);
        $stmt->execute();

        // Si el usuario existe, retornamos los datos
        if ($stmt->rowCount() > 0) {
            return $stmt->fetch(PDO::FETCH_ASSOC);
        }

        return null; // Si no existe, retornamos null
    }
}
?>
