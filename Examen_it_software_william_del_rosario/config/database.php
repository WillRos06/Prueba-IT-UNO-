<?php
class Database {
    private $host = "localhost";
    private $db_name = "prueba_db";
    private $username = "postgres";
    private $password = "postgres";
    public $conn;

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
?>