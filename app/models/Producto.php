<?php
class Producto {
    private $conn;
    private $table_name = "producto";

    public function __construct($db) {
        $this->conn = $db;
    }

    public function registrar($nombre, $descripcion, $precio) {
        $query = "INSERT INTO " . $this->table_name . " (nombre, descripcion, precio) VALUES ($1, $2, $3)";
        $result = pg_query_params($this->conn, $query, array($nombre, $descripcion, $precio));

        if ($result) {
            return true;
        } else {
            return false;
        }
    }
}
?>