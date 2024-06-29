<?php
class Database {
    private $host;
    private $db_name;
    private $username;
    private $password;
    private $port;
    public $conn;

    public function __construct() {
        $this->host = getenv('PGHOST');
        $this->db_name = getenv('PGDATABASE');
        $this->username = getenv('PGUSER');
        $this->password = getenv('PGPASSWORD');
        $this->port = getenv('PGPORT');
    }

    public function getConnection() {
        $this->conn = null;
        $connectionString = "host=$this->host port=$this->port dbname=$this->db_name user=$this->username password=$this->password";

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