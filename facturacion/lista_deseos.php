<?php
require_once 'funciones_deseos.php';

include '../method/db_fashion/cb.php';
Deseos::setDb($conexion);

$documentoUsuario = "567"; // Este valor debe ser dinámico según el usuario logueado
$deseos = Deseos::obtenerDeseos($documentoUsuario);
$mensaje = isset($_GET['mensaje']) ? htmlspecialchars($_GET['mensaje']) : '';
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Deseos</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet"> 
    <link href="../css/listaDeseos.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <h1>Lista de Deseos</h1>
        <center><a href="../usuarios/conBaBus.php?seccion=home" class="btn btn-home"><i class="fas fa-home"> Home</i></a></center>
        <?php if ($mensaje): ?>
            <div class="alert <?php echo strpos($mensaje, 'Error') === false ? 'alert-success' : 'alert-danger'; ?>" role="alert">
                <?php echo $mensaje; ?>
            </div>
        <?php endif; ?>
 
        <h2>Agregar Nuevo Deseo</h2>
    <form action="controladorDeseo.php" method="post" enctype="multipart/form-data">
        <input type="hidden" name="documento" value="<?php echo htmlspecialchars($documentoUsuario); ?>">
        <div class="form-group">
            <label for="nombre_producto">Nombre del Producto:</label>
            <input type="text" name="nombre_producto" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="imagenes">Fotos del Producto:</label>
            <input type="file" name="imagenes[]" class="form-control-file" accept="image/*" multiple required>
        </div>
        <button type="submit" name="accion" value="agregar" class="btn btn-primary">Agregar a la Lista de Deseos</button>
    </form>
 
        <h2>Mis Deseos</h2>
        <?php if ($deseos && $deseos->num_rows > 0): ?>
            <div class="row">
                <?php while ($deseo = $deseos->fetch_assoc()): ?>
                    <div class="col-md-4 mb-3">
                        <div class="card">
                            <img class="card-img-top" src="<?php echo htmlspecialchars($deseo['foto_referencia']); ?>" alt="Foto del Producto">
                            <div class="card-body">
                                <h5 class="card-title"><?php echo htmlspecialchars($deseo['nombre_producto']); ?></h5>
                                <form action="controladorDeseo.php" method="post">
                                    <input type="hidden" name="id_deseo" value="<?php echo htmlspecialchars($deseo['id_deseo']); ?>">
                                    <button type="submit" name="accion" value="eliminar" class="btn btn-danger">Eliminar de la Lista</button>
                                </form>
                            </div>
                        </div>
                    </div>
                <?php endwhile; ?>
            </div>
        <?php else: ?>
            <p>No tienes productos en tu lista de deseos.</p>
        <?php endif; ?>
    </div>
</body>
</html>
