<?php
include_once("../method/usuarios_class.php");
include_once("../method/productos_class.php");
include_once("../method/token_class.php");
include_once("../method/correo_class.php");
include_once("../method/modelo.php");
include_once("../method/encrip_class.php");
include_once("../method/controler_login.php");
include_once("../method/factura_class.php");
include_once("../method/modeloFactu.php");
 

if(isset($_GET['eliCuenta'])){
    if(Usuarios::eliminarCuentaUser($_SESSION['id'])){
        header("location:../index.php");
    }
}

if(isset($_GET['idBuscador'])){
    echo Productos::mostrarPro($_GET['idBuscador']);
    

}

if (isset($_GET['recuperar'])) {
    if (isset($_POST['correo'])) {
        if (Usuarios::buscarId($_POST['correo']) == 0) {
            echo "Error: escribiste mal la contraseña o no apareces en el sistema";
        } else {
            $correo = $_POST['correo'];
            $dato = token::creartoken(10);
            echo Correo::enviarCorreo($correo, $dato);
        }
    }
}

if(isset($_GET['ediUser'])) {
    if(isset($_GET['dato'])) {
        $idUser = $_GET['dato'];
        $nombre = $_POST['nombre'];
        $apellido = $_POST['apellido'];
        $correo = $_POST['correo'];
        if(Productos::actualizarUser($idUser, $nombre, $apellido, $correo)==1) {
            header("location: conBaBus.php?seccion=perfil");
        }
    }
}

if(isset($_GET['cambioCo'])){
    if(isset($_POST['nuevaClave']) && isset($_POST['newPassword'])){
        $contraseñaN = $_POST['nuevaClave'];
        $contraseñaUser = $_POST['newPassword'];
        $doc = EncriptarURl::desencriptar($_GET['codigo']);
        
        if(Usuarios::verificaCon($contraseñaN,$doc)==0){
            echo "la contraseña no coincide";
        }else{
            if( Modelo::sqlCambiarClaveEncrip($contraseñaUser,$doc)){
                header("location:../login.php");
            }
           
        }
        
        // if(Modelo::verficaClave($contraseñaN)){ 
        //     header("location: conBaBus.php");
        //     exit; // Agrega esta línea para evitar problemas con la redirección
        // }
    }
}

if (isset($_GET['like'])) {
    $usuario_id = $_SESSION['id'];
    $producto_id = $_POST['idProducto'];

    // Llama a la función para agregar o quitar like
    $resultado = Productos::agregarLike($usuario_id, $producto_id);
    
    if ($resultado) {
        // Usar la conexión desde cb.php
        include("../method/db_fashion/cb.php");  // Asegúrate de que $conexion esté disponible

        // Consulta actualizada para obtener los likes del producto específico
        $sql = "SELECT COUNT(*) as total_likes FROM tb_likes WHERE producto_id = '$producto_id'";
        $consulta = $conexion->query($sql);
        
        if ($consulta) {
            $fila = $consulta->fetch_assoc();
            echo $fila['total_likes'];  // Retorna el número de 'likes'
        } else {
            echo "Error en la consulta SQL";
        }
    } else {
        echo "Error al procesar el like";
    }
    exit;
}


if (isset($_POST['cambiarfoto']) && $_POST['cambiarfoto'] === 'true') {
    if (isset($_FILES['foto']) && $_FILES['foto']['error'] === UPLOAD_ERR_OK) {
        $fileTmpPath = $_FILES['foto']['tmp_name'];
        $fileName = $_FILES['foto']['name'];
        $fileExtension = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));
        $newFileName = uniqid() . '.' . $fileExtension; // Genera un nombre único para evitar conflictos
        $uploadFileDir = '../img/';
        $dest_path = $uploadFileDir . $newFileName;

        $id_user = $_SESSION['id'];

        // Obtener la foto actual del usuario
        $consulta = Modelo::sqlPerfil($id_user);
        $fila = $consulta->fetch_assoc();
        $fotoAnterior = $fila['foto'];

        // Eliminar la imagen anterior si existe
        if (!empty($fotoAnterior) && file_exists($uploadFileDir . $fotoAnterior)) {
            unlink($uploadFileDir . $fotoAnterior);
        }

        // Mover la nueva imagen al servidor
        if (move_uploaded_file($fileTmpPath, $dest_path)) {
            // Actualizar la base de datos con la nueva imagen
            if (Modelo::sqlActuFoto($newFileName, $id_user)) {
                // Devuelve la ruta completa para actualizar la imagen en la interfaz
                echo $uploadFileDir . $newFileName;  
            } else {
                echo 'Error al actualizar la base de datos';
            }
        } else {
            echo 'Error al mover el archivo';
        }
    } else {
        echo 'Error en la carga del archivo';
    }
}

if (isset($_GET['idProducto'])) {
    // Procesar el ID del producto y otros datos
    $idProducto = $_GET['idProducto'];
    $nombreProducto = $_GET['nombreProducto'];
    $precioProducto = $_GET['precioProducto'];
    $cantidadProducto = $_GET['cantidadProducto'];
    $documentoUsuario = $_SESSION['id']; // Usar el ID del usuario según tu lógica

    // Llamar a la función que agregará o actualizará el producto en el carrito
    $resultado = Factura::agregarProductoCarrito($idProducto, $nombreProducto, $precioProducto, $cantidadProducto, $documentoUsuario);

    // Devolver el resultado exacto sin caracteres adicionales
    if ($resultado === 1) {
        echo '1'; // Producto agregado
    } elseif ($resultado === 2) {
        echo '2'; // Cantidad actualizada
    } else {
        echo '0'; // Error
    }
    exit; // Importante para evitar cualquier salida adicional
}

// Eliminar producto del carrito
if (isset($_GET['idProductoEliminar'])) {
    $idProducto = $_GET['idProductoEliminar'];
    $documentoUsuario = $_SESSION['id']; // Usar el ID del usuario desde la sesión

    // Llamar a la función que elimina el producto
    $resultado = Factura::eliminarProductoCarrito($idProducto, $documentoUsuario);

    // Devolver el resultado de la operación
    echo $resultado; // 1 si fue exitoso, 0 si hubo un error
    exit;
}

// Mostrar el carrito actualizado
if (isset($_GET['accion']) && $_GET['accion'] == 'mostrarCarrito') {
    $documentoUsuario = $_SESSION['id']; // Usar el ID del usuario desde la sesión
    echo Factura::mostrarCarrito($documentoUsuario);
    exit;
}

if (isset($_POST['accion']) && $_POST['accion'] == 'realizarCompra') {
    $documentoUsuario = $_SESSION['id']; // Asumiendo que tienes el ID del usuario en la sesión

    // Aquí deberías crear una nueva factura y luego llenar los detalles
    $idFactura = Factura::crearFactura($documentoUsuario); // Necesitarás implementar esta función

    if ($idFactura) {
        $resultado = Factura::agregarDetallesFactura($idFactura, $documentoUsuario); // Necesitarás implementar esta función

        echo $resultado ? "1" : "0"; // Retorna 1 si se completó, 0 si hubo un error
    } else {
        echo "0"; // Error al crear la factura
    }
}

if (isset($_GET['agrefa']) && $_GET['agrefa'] == 'agregarFactura') {
    $documentoUsuario = $_SESSION['id']; // Suponiendo que el documento está en la sesión
    $telefono = $_GET['telefono'];
    $direccion = $_GET['direccion'];
    $numeroTarjeta = $_GET['numeroTarjeta'];
    $metodoPago = $_GET['metodoPago'];

    // Lógica para calcular el total
    $total = ModeloFactu::calcularTotalCarrito($documentoUsuario);

    // Agregar la factura
    $resultadoFactura = ModeloFactu::agregarFactura($documentoUsuario, $metodoPago, $direccion,$numeroTarjeta , $telefono, $total);
    echo $resultadoFactura;
    if ($resultadoFactura) {
        // Ahora agregamos los detalles de la factura
        $resultadoDetalles = ModeloFactu::agregarDetallesFactura($resultadoFactura, $documentoUsuario);

        if ($resultadoDetalles) {
            $limpiar = ModeloFactu::limpiarCarrito($documentoUsuario);
            if($limpiar){
                header("Location: conBaBus.php?seccion=detallesFactu&idFactura=$resultadoFactura");
            } else {
                echo "Error al agregar los detalles de la factura.";
            }
        }


    } else {
        echo "Error al crear la factura.";
    }
}





?>