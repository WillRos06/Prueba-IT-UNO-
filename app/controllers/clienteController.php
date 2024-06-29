<?php
include_once __DIR__ . '/../models/Cliente.php';
include_once __DIR__ . '/../../config/database.php';

class ClienteController {
    public function registrarCliente($nombre, $email, $telefono) {
        $db = new Database();
        $conn = $db->getConnection();

        $cliente = new Cliente($conn);
        if ($cliente->registrar($nombre, $email, $telefono)) {
            echo "Cliente registrado exitosamente.";
        } else {
            echo "Error al registrar el cliente: " . pg_last_error($conn);
        }

        $db->closeConnection();
    }

    public function obtenerClientes() {
        $db = new Database();
        $conn = $db->getConnection();

        $clientes = array();

        $query = "SELECT * FROM cliente";
        $result = pg_query($conn, $query);

        if ($result) {
            while ($row = pg_fetch_assoc($result)) {
                $clientes[] = $row;
            }
        } else {
            echo "Error al obtener clientes: " . pg_last_error($conn);
        }

        $db->closeConnection();

        return $clientes;
    }
}
?>