<?php
class Cliente {
    private $conn;
    private $table_name = "cliente";

    public function __construct($db) {
        $this->conn = $db;
    }

    public function registrar($nombre, $email, $telefono) {
        $query = "INSERT INTO " . $this->table_name . " (nombre, email, telefono) VALUES ($1, $2, $3)";
        $result = pg_query_params($this->conn, $query, array($nombre, $email, $telefono));

        if ($result) {
            return true;
        } else {
            return false;
        }
    }
}
?>