<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reporte de Clientes</title>
    <link rel="stylesheet" href="../CSS/style.css">
</head>
<body>

<div class="container">
    <h1 class="text_align_center">Reporte de Clientes</h1>
    <div class="path">
        <p><a href="../../public/index.php">Inicio</a> > reporte de clientes</p>
    </div>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Email</th>
                <th>Teléfono</th>
            </tr>
        </thead>
        <tbody>
            <?php
            include_once '../controllers/clienteController.php';
            $controller = new ClienteController();
            $clientes = $controller->obtenerClientes();
        
            foreach ($clientes as $cliente) {
                echo "<tr>";
                echo "<td>" . $cliente['id'] . "</td>";
                echo "<td>" . $cliente['nombre'] . "</td>";
                echo "<td>" . $cliente['email'] . "</td>";
                echo "<td>" . $cliente['telefono'] . "</td>";
                echo "</tr>";
            }
            ?>
        </tbody>
    </table>
</div>

</body>