<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Registro de Productos</title>
</head>
<body>
    <div class="path">
        <p><a href="../../public/index.php">Inicio</a> > Registro de productos</p>
    </div>
    <form action="../../public/index.php" method="post">
        <label for="nombre">Nombre:</label>
        <input type="text" id="nombre" name="nombre" required><br>
        <label for="descripcion">Descripcion:</label>
        <textarea id="descripcion" name="descripcion"></textarea><br><br>
        <label for="precio">Precio:</label>
        <input type="number" id="precio" name="precio" required><br>
        <input type="submit" value="Registrar">
    </form>
</body>
</html>