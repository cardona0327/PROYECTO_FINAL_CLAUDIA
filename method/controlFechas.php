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

if (isset($_POST['accion'])) {
    $accion = $_POST['accion'];

    if ($accion == 'agregar') {
        $evento = $_POST['evento'];
        $fechaInicio = $_POST['fecha_inicio'];
        $fechaFin = $_POST['fecha_fin'];
        $colorEvento = $_POST['color_evento'];

        if (FechaEspecial::agregarFecha($evento, $fechaInicio, $fechaFin, $colorEvento)) {
            header('Location: ../admi/ctroBar.php?seccion=fechaEspecial&&mensaje=Fecha especial agregada');
        } else {
            header('Location: ../admi/ctroBar.php?seccion=fechaEspecial&&mensaje=Error al agregar fecha especial');
        }
    }

    if ($accion == 'eliminar') {
        $id = $_POST['id'];

        if (FechaEspecial::eliminarFecha($id)) {
            header('Location: ../admi/ctroBar.php?seccion=fechaEspecial&&mensaje=Fecha especial eliminada');
        } else {
            header('Location: ../admi/ctroBar.php?seccion=fechaEspecial&&mensaje=Error al eliminar fecha especial');
        }
    }
}
?>
