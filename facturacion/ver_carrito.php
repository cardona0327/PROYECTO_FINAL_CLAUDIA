<?php
include 'funciones.php';

$productos_carrito = obtenerProductosCarrito();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Carrito de Compras</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1>Carrito de Compras</h1>
        <?php if (empty($productos_carrito)): ?>
            <p>No hay productos en el carrito.</p>
        <?php else: ?>
            <table class="table">
                <thead>
                    <tr>
                        <th>Producto</th>
                        <th>Cantidad</th>
                        <th>Precio</th>
                        <th>Subtotal</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($productos_carrito as $producto): ?>
                    <tr>
                        <td><?php echo $producto['nombre_producto']; ?></td>
                        <td><?php echo $producto['cantidad_pro']; ?></td>
                        <td><?php echo $producto['precio_pro']; ?></td>
                        <td><?php echo $producto['precio_pro'] * $producto['cantidad_pro']; ?></td>
                        <td>
                            <form action="eliminar_del_carrito.php" method="POST" style="display:inline;">
                                <input type="hidden" name="id_ca" value="<?php echo $producto['id_ca']; ?>">
                                <button type="submit" class="btn btn-danger">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
                <tfoot>
                    <tr>
                        <td colspan="3">Total</td>
                        <td>
                            <?php
                            $total = 0;
                            foreach ($productos_carrito as $producto) {
                                $total += $producto['precio_pro'] * $producto['cantidad_pro'];
                            }
                            echo $total;
                            ?>
                        </td>
                        <td></td>
                    </tr>
                </tfoot>
            </table><br>

            <center><a href="formulario_compra.php" class="btn btn-primary">Finalizar Compra</a></center>
        <?php endif; ?>
    </div>
</body>
</html>
