<?php
class DBConnection {
    private $host = "localhost";
    private $db_name = 'compramaster';
    private $username = 'root';
    private $password = '';
    private $connection;

    public function getConnection() {
        $this->connection = null;
        try {
            $this->connection = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->db_name, $this->username, $this->password);
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch(PDOException $exception) {
            echo "Connection error: " . $exception->getMessage();
        }
        return $this->connection;
    }

    public function prepare($query) {
        if ($this->connection === null) {
            $this->getConnection();
        }
        return $this->connection->prepare($query);
    }

    public function execute($query, $params = []) {
        $stmt = $this->prepare($query);
        $stmt->execute($params);
        return $stmt;
    }
}
?>
