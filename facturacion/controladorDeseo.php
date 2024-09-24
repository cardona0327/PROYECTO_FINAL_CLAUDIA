<?php
require_once 'funciones_deseos.php'; // Asegúrate de que la ruta sea correcta

include '../method/db_fashion/cb.php'; // Incluye tu archivo de conexión a la base de datos

// Establecer la conexión en la clase Deseos
Deseos::setDb($conexion);

// Manejar la acción de agregar un deseo
if (isset($_POST['accion']) && $_POST['accion'] == 'agregar') {
    $documento = $_POST['documento'];
    $nombreProducto = $_POST['nombre_producto'];

    // Verificar si se han subido archivos
    if (isset($_FILES['imagenes']) && $_FILES['imagenes']['error'][0] == UPLOAD_ERR_OK) {
        $imagenes = $_FILES['imagenes'];
        $numArchivos = count($imagenes['name']);
        $rutasImagenes = [];

        for ($i = 0; $i < $numArchivos; $i++) {
            $nombreArchivo = basename($imagenes['name'][$i]);
            $rutaDestino = 'uploads/' . preg_replace('/[^a-zA-Z0-9\.\-_]/', '_', $nombreArchivo);

            if (move_uploaded_file($imagenes['tmp_name'][$i], $rutaDestino)) {
                $rutasImagenes[] = $rutaDestino; // Guarda la ruta de cada imagen
            } else {
                // Si ocurre un error al subir una imagen, redirige con un mensaje de error
                header('Location: lista_deseos.php?mensaje=Error al subir algunas imágenes');
                exit;
            }
        }

        // Agregar el deseo a la base de datos para cada imagen
        foreach ($rutasImagenes as $ruta) {
            if (Deseos::agregarDeseo($documento, $nombreProducto, $ruta)) {
                header('Location: lista_deseos.php?mensaje=Producto añadido a la lista de deseos');
            } else {
                header('Location: lista_deseos.php?mensaje=Error al agregar el producto');
                exit;
            }
        }
    } else {
        header('Location: lista_deseos.php?mensaje=No se han subido imágenes');
    }
}

// Manejar la acción de eliminar un deseo
if (isset($_POST['accion']) && $_POST['accion'] == 'eliminar') {
    $idDeseo = $_POST['id_deseo'];
    if (Deseos::eliminarDeseo($idDeseo)) {
        header('Location: lista_deseos.php?mensaje=Producto eliminado de la lista de deseos');
    } else {
        header('Location: lista_deseos.php?mensaje=Error al eliminar el producto');
    }
}

// Cerrar conexión
$conexion->close();
?>
