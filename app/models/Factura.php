<?php
class Factura {
    private $conn;
    private $table_name = "factura";
    private $table_factura_producto = "factura_producto";

    public function __construct($db) {
        $this->conn = $db;
    }

    public function registrar($id_cliente, $productos) {
        $total_factura = 0;
        $query_factura = "INSERT INTO " . $this->table_name . " (id_cliente, fecha, total) VALUES ($1, CURRENT_TIMESTAMP, $2) RETURNING id";
        $result_factura = pg_query_params($this->conn, $query_factura, array($id_cliente, $total_factura));

        if ($result_factura) {
            $id_factura = pg_fetch_result($result_factura, 0, 0);

            $productos_array = explode("\n", $productos);

            foreach ($productos_array as $producto) {
                list($id_producto, $cantidad, $precio_unitario) = explode(",", $producto);
                
                $precio_total_producto = $cantidad * $precio_unitario;

                
                $total_factura += $precio_total_producto;

                
                $query_factura_producto = "INSERT INTO " . $this->table_factura_producto . " (id_factura, id_producto, cantidad, precio_unitario) VALUES ($1, $2, $3, $4)";
                $result_fp = pg_query_params($this->conn, $query_factura_producto, array($id_factura, $id_producto, $cantidad, $precio_unitario));

                if (!$result_fp) {
                    return false;
                }
            }

            
            $query_update_total = "UPDATE " . $this->table_name . " SET total = $1 WHERE id = $2";
            $result_update_total = pg_query_params($this->conn, $query_update_total, array($total_factura, $id_factura));

            if (!$result_update_total) {
                return false;
            }

            return true;
        } else {
            return false;
        }
    }

    public function obtenerFacturas() {
        $query = "SELECT * FROM " . $this->table_name;
        $result = pg_query($this->conn, $query);

        if ($result) {
            $facturas = pg_fetch_all($result);
            return $facturas;
        } else {
            return false;
        }
    }
}
?>