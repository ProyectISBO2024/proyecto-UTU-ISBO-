<?php
require 'config/Database.php';

class Usuario {
    private $conn;
    private $table_name = "usuario";

    private $idC;
    private $mail;
    private $nick;
    private $dirección;
    private $contraseña;

    public function __construct() {
        $database = new Database();
        $this->conn = $database->getConnection();
    }

    public function getIdC() {
        return $this->idC;
    }

    public function setIdC($idC) {
        $this->idC = $idC;
    }

    public function getMail() {
        return $this->mail;
    }

    public function setMail($mail) {
        $this->mail = $mail;
    }

    public function getNick() {
        return $this->nick;
    }

    public function setNick($nick) {
        $this->nick = $nick;
    }

    public function getDirección() {
        return $this->dirección;
    }

    public function setDirección($dirección) {
        $this->dirección = $dirección;
    }

    public function getContraseña() {
        return $this->contraseña;
    }

    public function setContraseña($contraseña) {
        $this->contraseña = $contraseña;
    }

    public function create() {
        $query = "INSERT INTO " . $this->table_name . " SET mail=?, nick=?, dirección=?, contraseña=?";
        $stmt = $this->conn->prepare($query);

        $hashedPassword = password_hash($this->contrasena, PASSWORD_DEFAULT);
        $stmt->bind_param("ssss", $this->mail, $this->nick, $this->dirección, $hashedPassword);

        if ($stmt->execute()) {
            return true;
        } else {
            echo "Error: " . $stmt->error;
            return false;
        }
    }

    public function readAll() {
        $query = "SELECT * FROM " . $this->table_name;
        $result = $this->conn->query($query);
        return $result;
    }

    public function readOne() {
        $query = "SELECT * FROM " . $this->table_name . " WHERE idC = ? LIMIT 0,1";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("i", $this->idC);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_assoc();
    }

    public function update() {
        $query = "UPDATE " . $this->table_name . " SET mail=?, nick=?, dirección=?, contraseña=? WHERE id=?";
        $stmt = $this->conn->prepare($query);

        $hashedPassword = password_hash($this->contrasena, PASSWORD_DEFAULT);
        $stmt->bind_param("ssssi", $this->mail, $this->nick, $this->dirección, $hashedPassword, $this->idC);

        return $stmt->execute();
    }

    public function delete() {
        $query = "DELETE FROM " . $this->table_name . " WHERE idC = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("i", $this->idC);
        return $stmt->execute();
    }

    public function login() {
        $query = "SELECT * FROM " . $this->table_name . " WHERE nick = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("s", $this->nick);
        $stmt->execute();
        $result = $stmt->get_result();
        $usuario = $result->fetch_assoc();

        if ($usuario && password_verify($this->contraseña, $usuario['contraseña'])) {
            return $usuario;
        } else {
            return false;
        }
    }
}
?>
