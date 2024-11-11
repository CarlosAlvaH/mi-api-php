<?php
class Database {
    private $host = getenv('DB_HOST');
    private $db_name = getenv('DB_NAME');
    private $username = getenv('DB_USER');
    private $password = getenv('DB_PASSWORD');
    public $conn;

    public function getConnection(){
        $this->conn = null;
        try {
            $this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->db_name, $this->username, $this->password);
            $this->conn->exec("set names utf8");
        } catch(PDOException $exception){
            echo "Error de conexión: " . $exception->getMessage();
        }
        return $this->conn;
    }
}
?>