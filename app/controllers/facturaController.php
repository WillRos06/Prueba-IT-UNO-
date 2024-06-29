<?php
include_once __DIR__ . '/../models/Factura.php';
include_once __DIR__ . '/../../config/database.php';

class FacturaController {
    public function registrarFactura($id_cliente, $productos) {
        $db = new Database();
        $conn = $db->getConnection();

        $factura = new Factura($conn);
        if ($factura->registrar($id_cliente, $productos)) {
            echo "Factura generada exitosamente.";
        } else {
            echo "Error al generar la Factura: " . pg_last_error($conn);
        }

        $db->closeConnection();
    }

    public function obtenerFacturas() {
        $db = new Database();
        $conn = $db->getConnection();
    
        $facturas = array();
    
        $query = "SELECT id, id_cliente, fecha, total FROM factura";
        $result = pg_query($conn, $query);
    
        if ($result) {
            while ($row = pg_fetch_assoc($result)) {
                $facturas[] = $row;
            }
        } else {
            echo "Error al obtener facturas: " . pg_last_error($conn);
        }
    
        $db->closeConnection();
    
        return $facturas;
    }

    
}
?>