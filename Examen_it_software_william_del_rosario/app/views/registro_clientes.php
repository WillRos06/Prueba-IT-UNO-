<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Registro de Clientes</title>
</head>
<body>
    <div class="path">
        <p><a href="../../public/index.php">Inicio</a> > Registro de Clientes</p>
    </div>
    <form action="../../public/index.php" method="post">
        <label for="nombre">Nombre:</label>
        <input type="text" id="nombre" name="nombre" required><br>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required><br>

        <label for="telefono">Teléfono:</label>
        <input type="text" id="telefono" name="telefono" required><br>

        <input type="submit" value="Registrar">
    </form>
</body>
</html>