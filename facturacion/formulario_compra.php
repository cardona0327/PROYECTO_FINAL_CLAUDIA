<?php
include 'funciones.php';
$productos = obtenerProductosCarrito();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Formulario de Compra</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <div class="container">
        <h1>Formulario de Compra</h1>
        <form action="procesar_compra.php" method="POST">
            <div class="form-group">
                <label for="nombre">Nombre:</label>
                <input type="text" name="nombre" id="nombre" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="apellido">Apellido:</label>
                <input type="text" name="apellido" id="apellido" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="correo">Correo:</label>
                <input type="email" name="correo" id="correo" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="direccion">Dirección:</label>
                <input type="text" id="direccion" name="direccion" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="telefono">Teléfono:</label>
                <input type="text" id="telefono" name="telefono" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="metodo_pago">Método de Pago:</label>
                <select name="metodo_pago" id="metodo_pago" class="form-control" required>
                    <option value="Tarjeta de Crédito">Tarjeta de Crédito</option>
                    <option value="PayPal">PayPal</option>
                    <option value="Transferencia Bancaria">Transferencia Bancaria</option>
                </select>
            </div>

            <h2>Productos Seleccionados</h2>
            <table class="table">
                <thead>
                    <tr>
                        <th>Producto</th>
                        <th>Cantidad</th>
                        <th>Precio</th>
                        <th>Subtotal</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($productos as $producto): ?>
                    <tr>
                        <td><?php echo $producto['nombre_producto']; ?></td>
                        <td><?php echo $producto['cantidad_pro']; ?></td>
                        <td><?php echo $producto['precio_pro']; ?></td>
                        <td><?php echo $producto['precio_pro'] * $producto['cantidad_pro']; ?></td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
                <tfoot>
                    <tr>
                        <td colspan="3">Total</td>
                        <td>
                            <?php
                            $total = 0;
                            foreach ($productos as $producto) {
                                $total += $producto['precio_pro'] * $producto['cantidad_pro'];
                            }
                            echo $total;
                            ?>
                        </td>
                    </tr>
                </tfoot>
            </table>

            <button type="submit" class="btn btn-primary">Terminar Compra</button>
        </form>
    </div>
</body>
</html>
