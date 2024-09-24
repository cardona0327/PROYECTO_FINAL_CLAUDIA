<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de Pago</title>
    <link rel="stylesheet" href="path/to/bootstrap.css"> <!-- Asegúrate de incluir Bootstrap -->
</head>
<body>
    <div class="container">
        <h2>Formulario de Pago</h2>
        <form action="ctroUser.php" method="GET">
            <input type="hidden" name="agrefa" value="agregarFactura"> <!-- Variable para el controlador -->
            <div class="form-group">
                <label for="telefono">Teléfono:</label>
                <input type="text" class="form-control" id="telefono" name="telefono" required>
            </div>
            <div class="form-group">
                <label for="direccion">Dirección:</label>
                <input type="text" class="form-control" id="direccion" name="direccion" required>
            </div>
            <div class="form-group">
                <label for="numeroTarjeta">Número de tarjeta:</label>
                <input type="text" class="form-control" id="numeroTarjeta" name="numeroTarjeta" required>
            </div>
            <div class="form-group">
                <label for="metodoPago">Método de pago:</label>
                <select class="form-control" id="metodoPago" name="metodoPago" required>
                    <option value="tarjeta">Tarjeta</option>
                    <option value="efectivo">Efectivo</option>
                </select>
            </div>
            <button type="submit" class="btn btn-success">Realizar Pago</button>
        </form>
    </div>
</body>
</html>
