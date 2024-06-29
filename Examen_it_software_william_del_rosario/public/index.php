<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PRUEBA IT SOFTWARE UNO</title>
    <link rel="stylesheet" href="CSS/style.css">
</head>
<body>

<div class="container">
    <h1 class="text_align_center">PRUEBA IT REGISTRO</h1>
    
    <div id="menu">
        <h2 class="text_align_center">Menu</h2>

        <ul>
            <li class="text_align_center"><a href="../app/views/registro_clientes.php">Registro de Clientes</a></li>
            <li class="text_align_center"><a href="../app/views/registro_productos.php">Registro de Productos</a></li>
            <li class="text_align_center"><a href="../app/views/registro_facturas.php">Facturación</a></li>
            <li class="text_align_center"><a href="../app/views/reporteclientes.php">Despliegue de Tabla de Clientes</a></li>
            <li class="text_align_center"><a href="../app/views/reportefacturas.php">Despliegue de Tabla de Facturas</a></li>
        </ul>
    </div>

    <div id="content">
        <?php
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            include '../app/controllers/clienteController.php';
            include '../app/controllers/productoController.php';

            if (isset($_POST['nombre'], $_POST['email'], $_POST['telefono'])) {
                $controller = new ClienteController();
                $nombre = $_POST['nombre'];
                $email = $_POST['email'];
                $telefono = $_POST['telefono'];
                $controller->registrarCliente($nombre, $email, $telefono);
            }

            if (isset($_POST['nombre'], $_POST['descripcion'], $_POST['precio'])) {
                $controller = new ProductoController();
                $nombre = $_POST['nombre'];
                $descripcion = $_POST['descripcion'];
                $precio = $_POST['precio'];
                $controller->registrarProducto($nombre, $descripcion, $precio);
            }

            if (isset($_POST['productos'])) {
                include '../app/controllers/facturaController.php';
                
                $controller = new FacturaController();
                $id_cliente = $_POST['id_cliente'];
                $productos = $_POST['productos'];
                $controller->registrarFactura($id_cliente, $productos);
            }
            
            
        } elseif (isset($_GET['page'])) {
            $page = $_GET['page'];
            switch ($page) {
                case 'registro_clientes':
                    include '../app/views/registro_clientes.php';
                    break;
                case 'registro_productos':
                    include '../app/views/registro_productos.php';
                    break;
                case 'registro_facturas':
                    include '../app/views/registro_facturas.php';
                    break;
                case 'reporteclientes':
                    include '../app/views/clientes.php';
                    break;
                case 'reportefacturas':
                    include '../app/views/facturas.php';
                    break;
                default:
                    echo "<p>Página no encontrada.</p>";
                    break;
            }
        } else {
            echo "<p>Bienvenido al sistema de registro.</p>";
        }
        ?>
    </div>
</div>
</body>
</html>