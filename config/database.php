<?php
class Database {
    private $host;
    private $db_name;
    private $username;
    private $password;
    public $conn;

    public function __construct() {
        $this->host = getenv('DB_HOST');
        $this->db_name = getenv('DB_NAME');
        $this->username = getenv('DB_USER');
        $this->password = getenv('DB_PASSWORD');
    }

    public function getConnection() {
        $this->conn = null;
        $connectionString = "host=$this->host dbname=$this->db_name user=$this->username password=$this->password";

        $this->conn = pg_connect($connectionString);

        if (!$this->conn) {
            die("Conexion fallida: " . pg_last_error());
        }

        return $this->conn;
    }

    public function closeConnection() {
        pg_close($this->conn);
    }
}