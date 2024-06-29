<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Registro de Facturas</title>
</head>
<body>
    <div class="path">
        <p><a href="../../public/index.php">Inicio</a> > Registro de facturas</p>
    </div>
    <form action="../../public/index.php" method="post">
        <label for="id_cliente">ID Cliente:</label>
        <input type="number" id="id_cliente" name="id_cliente" required><br><br>
        
        <label for="productos">Productos (ID Producto, Cantidad, Precio Unitario):</label>
        <textarea id="productos" name="productos" placeholder="Ejemplo: 1, 3, 100.00" required></textarea><br><br>      
        <button type="submit">Generar Factura</button>
    </form>
</body>
</html>