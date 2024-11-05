<?php
require_once '../configuraciones/DBConnection.php';

class Usuario {
    private $conn;
    private $idC;
    private $nick;
    private $mail;
    private $contraseña;
    private $dirección;

    public function __construct() {
        $database = new DBConnection();
        $this->conn = $database->getConnection();
    }

    // Métodos para establecer propiedades
  

    public function setnick($nick) {
        $this->nick = $nick;
    }

    public function setMail($mail) {
        $this->mail = $mail;
    }

    public function setContraseña($contraseña) {
        $this->contraseña = password_hash($contraseña, PASSWORD_DEFAULT);
    }

    public function setDirección($dirección) {
        $this->dirección = $dirección;
    }
    public function guardar() {
        
            $query = "INSERT INTO usuario (mail, nick, 'Contraseña', 'dirección')  VALUES (:mail, :nick, :contraseña, :dirección)";
         $stmt = $this->conn->prepare($query);

          // Vincula las variables a los marcadores de parámetros
            $stmt->bindParam(':mail', $this->mail);
            $stmt->bindParam(':nick', $this->nick);
            $stmt->bindParam(':contraseña', $this->contraseña);
            $stmt->bindParam(':dirección', $this->dirección);

         // Verifica que todas las variables estén correctamente definidas antes de ejecutar
            echo "mail: " . $this->mail . "<br>";
            echo "nick: " . $this->nick . "<br>";
            echo "Contraseña: " . $this->contraseña . "<br>";
            echo "dirección: " . $this->dirección . "<br>";

        
         try {
            // Ejecutar la consulta
            $stmt->execute();
            echo "Usuario guardado exitosamente.";
          } catch (PDOException $e) {
            // Capturamos cualquier error que ocurra durante la ejecución de la consulta
            echo "Error al guardar el usuario: " . $e->getMessage();
          }
          
    }

    
    
    public function listarUsuarios() {
        $query = "SELECT * FROM usuario"; 
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC); 
    }

    public function obtenerUsuario($idC) {
        $query = "SELECT * FROM usuario WHERE idC = :idC";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':idC', $idC);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function actualizar() {
        $query = "UPDATE usuario SET nick = :nick, mail = :mail, contraseña = :contraseña, dirección = :dirección WHERE idC = :idC";
        $stmt = $this->conn->prepare($query);
        
        $stmt->bindParam(':idC', $this->idC);
        $stmt->bindParam(':nick', $this->nick);
        $stmt->bindParam(':mail', $this->mail);
        $stmt->bindParam(':contraseña', $this->contraseña);
        $stmt->bindParam(':dirección', $this->dirección);
        
        return $stmt->execute();
    }

    public function eliminar($idC) {
        $query = "DELETE FROM usuario WHERE idC = :idC";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':idC', $idC);
        return $stmt->execute();
    }

public function verificarCredenciales($email, $password) {
    // Consulta para obtener los datos del usuario basado en el correo
    $query = "SELECT * FROM usuario WHERE mail = :mail";
    $stmt = $this->conn->prepare($query);
    $stmt->bindParam(':mail', $email);
    $stmt->execute();

    $usuario = $stmt->fetch(PDO::FETCH_ASSOC);

    // Si se encuentra el usuario y la contraseña es correcta
    if ($usuario && password_verify($password, $usuario['Contraseña'])) {
        return $usuario; // Devuelve el usuario si las credenciales son correctas
    }
    return false; // Si las credenciales son incorrectas
}
public function obtenerUsuarioPorEmail($email) {
    $query = "SELECT * FROM usuario WHERE mail = :mail";
    $stmt = $this->conn->prepare($query);
    $stmt->bindParam(':mail', $email);
    $stmt->execute();
    
    return $stmt->fetch(PDO::FETCH_ASSOC); // Retorna los datos del usuario si existe, o null si no
}

}
