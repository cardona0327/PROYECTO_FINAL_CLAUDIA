<?php
require_once 'modeloFechaEspe.php'; // Asegúrate de que la ruta sea correcta

// Establece la conexión a la base de datos
$host = 'localhost';
$user = 'root';
$password = 'root';
$database = 'fw';

$conn = new mysqli($host, $user, $password, $database);

// Verifica si hay algún error en la conexión
if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

// Establecer la conexión en la clase FechaEspecial
FechaEspecial::setDb($conn);

$fechas = FechaEspecial::obtenerFechas();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fechas Especiales</title>
    <link href="../css/fechas_espe.css" rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">  
</head>
<body>
<center><a href="../usuarios/conBaBus.php?seccion=home" class="btn btn-home"><i class="fas fa-home"> Home</i></a></center>

    <h1>Fechas Especiales</h1>
    <h2>Agregar Nueva Fecha Especial</h2>
    <form action="controlFechas.php" method="post">
        <label for="evento">Evento:</label>
        <input type="text" name="evento" required>
        <label for="fecha_inicio">Fecha de Inicio:</label>
        <input type="date" name="fecha_inicio" required>
        <label for="fecha_fin">Fecha de Fin:</label>
        <input type="date" name="fecha_fin" required>
        <label for="color_evento">Color del Evento:</label>
        <input type="text" name="color_evento" required>
        <button type="submit" name="accion" value="agregar">Agregar Fecha Especial</button>
    </form>

    <h2>Listado de Fechas Especiales</h2>
    <?php if ($fechas->num_rows > 0): ?>
        <?php while ($fecha = $fechas->fetch_assoc()): ?>
            <div class="fecha" style="border-color: <?php echo htmlspecialchars($fecha['color_evento']); ?>;">
                <h3><?php echo htmlspecialchars($fecha['evento']); ?></h3>
                <p>Inicio: <?php echo htmlspecialchars($fecha['fecha_inicio']); ?></p>
                <p>Fin: <?php echo htmlspecialchars($fecha['fecha_fin']); ?></p>
                <div class="acciones">
                    <form action="controlFechas.php" method="post">
                        <input type="hidden" name="id" value="<?php echo htmlspecialchars($fecha['id']); ?>">
                        <button type="submit" name="accion" value="eliminar">Eliminar</button>
                    </form>
                </div>
            </div>
        <?php endwhile; ?>
    <?php else: ?>
        <center><p>No hay fechas especiales registradas.</p></center>
    <?php endif; ?>
</body>
</html>
