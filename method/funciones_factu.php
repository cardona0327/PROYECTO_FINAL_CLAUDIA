<?php
class Facturass{

    include '../method/db_fashion/cb.php'; // Asegúrate de que este archivo tiene la conexión a la base de datos

    function obtenerProductosCarrito() {
        global $con;
        $sql = "SELECT * FROM tb_carrito";
        $result = mysqli_query($con, $sql);
        
        $productos = [];
        while ($row = mysqli_fetch_assoc($result)) {
            $productos[] = $row;
        }
        
        return $productos; 
    }
    
    function crearFactura($documento_usuario, $metodo_pago, $direccion, $telefono, $productos) {
        global $con;
    
        // Validar documento_usuario
        if (!is_numeric($documento_usuario) || $documento_usuario <= 0) {
            die('Documento de usuario inválido.');
        }
    
        // Validar metodo_pago
        $metodo_pago = mysqli_real_escape_string($con, $metodo_pago);
    
        // Validar dirección y teléfono
        $direccion = mysqli_real_escape_string($con, $direccion);
        $telefono = mysqli_real_escape_string($con, $telefono);
    
        // Calcular el total
        $total = 0;
        foreach ($productos as $producto) {
            $total += $producto['precio_pro'] * $producto['cantidad_pro'];
        }
    
        // Insertar la factura
        $sqlFactura = "INSERT INTO tb_facturas (documento_usuario, metodo_pago, total, direccion, telefono) 
                       VALUES ('$documento_usuario', '$metodo_pago', '$total', '$direccion', '$telefono')";
        if (mysqli_query($con, $sqlFactura)) {
            $factura_id = mysqli_insert_id($con);
    
            // Insertar los detalles de la factura
            foreach ($productos as $producto) {
                $id_producto = (int)$producto['id_producto'];
                $cantidad = (int)$producto['cantidad_pro'];
                $precio_unitario = (float)$producto['precio_pro'];
                $subtotal = $precio_unitario * $cantidad;
    
                $sqlDetalle = "INSERT INTO tb_detalle_factura (id_factura, id_producto, cantidad, precio_unitario, subtotal)
                               VALUES ('$factura_id', '$id_producto', $cantidad, $precio_unitario, $subtotal)";
                if (!mysqli_query($con, $sqlDetalle)) {
                    echo "Error en la inserción del detalle: " . mysqli_error($con);
                    mysqli_close($con);
                    return false;
                }
            }
    
            return $factura_id;
        } else {
            echo "Error en la inserción de la factura: " . mysqli_error($con);
            return false;
        }
    }
    
    function obtenerFactura($factura_id) {
        global $con;
        $sql = "SELECT * FROM tb_facturas WHERE id_factura = '$factura_id'";
        $result = mysqli_query($con, $sql);
        return mysqli_fetch_assoc($result);
    }
    
    function obtenerDetallesFactura($factura_id) {
        global $con;
        $sql = "SELECT df.*, p.nombre_producto 
                FROM tb_detalle_factura df 
                JOIN tb_productos p ON df.id_producto = p.id_producto 
                WHERE df.id_factura = '$factura_id'";
        $result = mysqli_query($con, $sql);
        return mysqli_fetch_all($result, MYSQLI_ASSOC);
    }
    
    function obtenerTodosLosProductos() {
        global $con;
        $sql = "SELECT * FROM tb_productos";
        $result = mysqli_query($con, $sql);
        return mysqli_fetch_all($result, MYSQLI_ASSOC);
    }
    
    function agregarAlCarrito($id_producto, $cantidad) {
        global $con;
        $sql_producto = "SELECT * FROM tb_productos WHERE id_producto = $id_producto";
        $result_producto = mysqli_query($con, $sql_producto);
        $producto = mysqli_fetch_assoc($result_producto);
    
        $nombre_producto = $producto['nombre_producto'];
        $precio_producto = $producto['precio'];
    
        $sql = "INSERT INTO tb_carrito (nombre_producto, cantidad_pro, precio_pro, id_producto,documento_usuario) 
                VALUES ('$nombre_producto', $cantidad, $precio_producto, $id_producto,$id)";
        mysqli_query($con, $sql);
    }
    
    function eliminarDelCarrito($id_ca) {
        global $con;
        $sql = "DELETE FROM tb_carrito WHERE id_ca = $id_ca";
        mysqli_query($con, $sql);
    }
}
?>
