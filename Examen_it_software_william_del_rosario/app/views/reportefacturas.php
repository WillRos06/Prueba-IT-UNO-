<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reporte de Facturas</title>
</head>
<body>
    <h1>Reporte de Facturas</h1>
    <div class="path">
        <p><a href="../../public/index.php">Inicio</a> > reporte de facturas</p>
    </div>
    <table border="1">
        <thead>
            <tr>
                <th>ID Factura</th>
                <th>ID Cliente</th>
                <th>Fecha</th>
                <th>Total</th>
            </tr>
        </thead>
        <tbody>
            <?php
            include_once '../controllers/facturaController.php';
            $controller = new FacturaController();
            $facturas = $controller->obtenerFacturas();
            if ($facturas) {
                foreach ($facturas as $factura) {
                    echo "<tr>";
                    echo "<td>" . $factura['id'] . "</td>";
                    echo "<td>" . $factura['id_cliente'] . "</td>";
                    echo "<td>" . $factura['fecha'] . "</td>";
                    echo "<td>" . $factura['total'] . "</td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='4'>No hay facturas registradas.</td></tr>";
            }
            ?>
        </tbody>
    </table>
</body>
</html>