<?php


    class ModeloFactu{
        

        public static function insertarProductoCarrito($idProducto, $nombreProducto, $precioProducto, $cantidadProducto, $documentoUsuario) {
            include("db_fashion/cb.php");
            
            // Consulta para insertar producto
            $sql = "INSERT INTO tb_carrito (id_producto, nombre_producto, precio_pro, cantidad_pro, documento_usuario)
                    VALUES ('$idProducto', '$nombreProducto', '$precioProducto', '$cantidadProducto', '$documentoUsuario')";
            
            return $resultado = $conexion->query($sql);
            // // Ejecutar consulta e imprimir depuración
            // if ($conexion->query($sql) === TRUE) {
            //     echo "Producto insertado correctamente<br>";
            //     return true;
            // } else {
            //     echo "Error al insertar producto: " . $conexion->error . "<br>";
            //     return false;
            // }
        }
        
        
        public static function sqlMostrarCarrito($documentoUsuario) {
            include("db_fashion/cb.php");
        
            $sql = "SELECT id_ca, nombre_producto, cantidad_pro, precio_pro FROM tb_carrito WHERE documento_usuario = '$documentoUsuario'";
            return $conexion->query($sql);
        }
        
        public static function sqlEliminarProducto($idProducto, $documentoUsuario) {
            include("db_fashion/cb.php");
        
            // Eliminar producto basándose en id_ca y documento_usuario
            $sql = "DELETE FROM tb_carrito WHERE id_ca = '$idProducto' AND documento_usuario = '$documentoUsuario'";
            return $conexion->query($sql);
        }
        
        
        
        public static function verificarProductoEnCarrito($idProducto, $documentoUsuario) {
            include 'db_fashion/cb.php';
            $sql = "SELECT * FROM tb_carrito WHERE id_producto = '$idProducto' AND documento_usuario = '$documentoUsuario'";
            $resultado = $conexion->query($sql);
            return $resultado->fetch_assoc(); // Devuelve la fila si existe, o `false` si no existe
        }
        
        public static function actualizarCantidadProducto($idProducto, $nuevaCantidad, $documentoUsuario) {
            include("db_fashion/cb.php");
        
            // Consulta para actualizar la cantidad
            $sql = "UPDATE tb_carrito SET cantidad_pro = '$nuevaCantidad' WHERE id_producto = '$idProducto' AND documento_usuario = '$documentoUsuario'";
            
            return $resultado = $conexion->query($sql);
            // // Ejecutar consulta e imprimir depuración
            // if ($conexion->query($sql) === TRUE) {
            //     echo "Cantidad actualizada correctamente<br>";
            //     return true;
            // } else {
            //     echo "Error al actualizar cantidad: " . $conexion->error . "<br>";
            //     return false;
            // }
        }
        public static function agregarFactura($documentoUsuario, $metodoPago, $direccion,$numeroTarjeta, $telefono, $total) {
            include("db_fashion/cb.php"); // Asegúrate de tener tu conexión a la base de datos aquí
        
            // Insertar la factura en la tabla tb_facturas
            $sql = "INSERT INTO tb_facturas (documento_usuario, metodo_pago, direccion,numero_tarjeta ,telefono, total) 
                    VALUES ('$documentoUsuario', '$metodoPago', '$direccion',$numeroTarjeta, '$telefono', '$total')";
        
            // Ejecutamos la consulta
            if ($conexion->query($sql)) {
                // Si la factura se inserta correctamente, devolvemos el ID de la factura recién creada
                return $conexion->insert_id; // Esto devuelve el ID de la factura
            } else {
                // Si hay un error en la inserción, devolvemos false
                return false;
            }
        }
        
        
        public static function calcularTotalCarrito($documentoUsuario) {
            include("db_fashion/cb.php");
        
            $sql = "SELECT SUM(cantidad_pro * precio_pro) AS total FROM tb_carrito WHERE documento_usuario = '$documentoUsuario'";
            $resultado = $conexion->query($sql);
        
            if ($resultado) {
                $fila = $resultado->fetch_assoc();
                return $fila['total'] ? floatval($fila['total']) : 0; // Devuelve el total o 0 si no hay productos
            }
        
            return 0; // En caso de error
        }
        
        public static function agregarDetallesFactura($idFactura, $documentoUsuario) {
            include("db_fashion/cb.php");
        
            // Obtener los productos del carrito del usuario
            $sqlCarrito = "SELECT id_producto, cantidad_pro, precio_pro FROM tb_carrito WHERE documento_usuario = '$documentoUsuario'";
            $resultCarrito = $conexion->query($sqlCarrito);
        
            // Verificar si hay productos en el carrito
            if ($resultCarrito->num_rows > 0) {
                // Recorrer el carrito y agregar cada producto a la tabla de detalles de la factura
                while ($fila = $resultCarrito->fetch_assoc()) {
                    $idProducto = $fila['id_producto'];  // Asegúrate de que este valor exista en la consulta
                    $cantidad = $fila['cantidad_pro'];
                    $precioUnitario = $fila['precio_pro'];
                    $subtotal = $cantidad * $precioUnitario;
        
                    // Insertar los detalles en la tabla tb_detalle_factura
                    $sqlDetalle = "INSERT INTO tb_detalle_factura (id_factura, id_producto, cantidad, precio_unitario, subtotal) 
                                   VALUES ('$idFactura', '$idProducto', '$cantidad', '$precioUnitario', '$subtotal')";
        
                    if (!$conexion->query($sqlDetalle)) {
                        // Si ocurre un error, puedes registrar el error o manejarlo adecuadamente
                        return false;
                    }
                }
        
                // Si se agregaron todos los detalles correctamente, retorna true
                return true;
            } else {
                // Si no hay productos en el carrito
                return false;
            }
        }
        
        
        public static function sqlMostrarDetallesFactura($idFactura) {
            include("db_fashion/cb.php"); // Conexión a la base de datos
        
            // Unir tb_detalle_factura con tb_productos para obtener el nombre del producto
            $sql = "SELECT dp.cantidad, dp.precio_unitario, dp.subtotal, p.nombre_producto 
                    FROM tb_detalle_factura dp 
                    INNER JOIN tb_productos p ON dp.id_producto = p.id_producto 
                    WHERE dp.id_factura = '$idFactura'";
        
            $consulta = $conexion->query($sql);
            return $consulta;
        }
        
        
        
        public static function obtenerFactura($idFactura) {
            include("db_fashion/cb.php"); // Conexión a la base de datos
        
            $sql = "SELECT * FROM tb_facturas WHERE id_factura = '$idFactura'";
            $resultado = mysqli_query($conexion, $sql);
        
            if ($resultado) {
                return mysqli_fetch_assoc($resultado); // Retorna los detalles de la factura como un array
            } else {
                return null; // En caso de error o si no existe la factura
            }
        }
        
        public static function limpiarCarrito($documentoUsuario) {
            // Incluye la conexión a la base de datos
            include("db_fashion/cb.php");
        
            // Consulta para eliminar todos los productos del carrito para este usuario
            $query = "DELETE FROM tb_carrito WHERE documento_usuario = '$documentoUsuario'";
        
            // Ejecuta la consulta
            $resultado = $conexion->query($query);
        
            // Verifica si se eliminó correctamente
            if ($resultado) {
                return true;  // Se limpió el carrito correctamente
            } else {
                return false; // Ocurrió un error al limpiar el carrito
            }
        }
        
        
    }
    // public static function verificarProductoEnCarrito($idProducto, $documentoUsuario) {
    //     include("db_fashion/cb.php");
    //     $sql = "SELECT * FROM tb_carrito WHERE id_producto = '$idProducto' AND documento_usuario = '$documentoUsuario'";
        
    //     $resultado = $conexion->query($sql);
    
    //     // Chequea si la consulta fue exitosa
    //     if (!$resultado) {
    //         // Imprime el error de la base de datos
    //         echo "Error en la consulta SQL: " . $conexion->error;
    //         return false;
    //     }
    
    //     // Retorna el resultado si existe
    //     return $resultado->fetch_assoc();
    // }
    