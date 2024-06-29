<?php
include_once __DIR__ . '/../models/Producto.php';
include_once __DIR__ . '/../../config/database.php';

class ProductoController {
    public function registrarProducto($nombre, $descripcion, $precio) {
        $db = new Database();
        $conn = $db->getConnection();

        $producto = new Producto($conn);
        if ($producto->registrar($nombre, $descripcion, $precio)) {
            echo "Producto registrado exitosamente.";
        } else {
            echo "Error al registrar el Producto: " . pg_last_error($conn);
        }

        $db->closeConnection();
    }
}
?>