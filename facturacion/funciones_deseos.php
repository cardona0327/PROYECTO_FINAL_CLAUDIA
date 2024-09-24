<?php
class Deseos {
    private static $db;

    // Establecer la conexión a la base de datos
    public static function setDb($conexion) {
        self::$db = $conexion;
    }

    // Verificar si el documento existe en la base de datos
    public static function verificarDocumento($documento) {
        $consulta = self::$db->prepare('SELECT COUNT(*) FROM tb_usuarios WHERE documento = ?');
        $consulta->bind_param('s', $documento);
        $consulta->execute();
        $resultado = $consulta->get_result();
        $numUsuarios = $resultado->fetch_row()[0];
        return $numUsuarios > 0;
    }

    // Agregar un deseo a la base de datos
    public static function agregarDeseo($documento, $nombreProducto, $fotoReferencia) {
        $insercion = self::$db->prepare('INSERT INTO tb_lista_deseos (documento, nombre_producto, foto_referencia) VALUES (?, ?, ?)');
        $insercion->bind_param('sss', $documento, $nombreProducto, $fotoReferencia);
        return $insercion->execute();
    }
    

    // Eliminar un deseo de la base de datos
    public static function eliminarDeseo($idDeseo) {
        $eliminacion = self::$db->prepare('DELETE FROM tb_lista_deseos WHERE id_deseo = ?');
        $eliminacion->bind_param('i', $idDeseo);
        return $eliminacion->execute();
    }

    // Obtener deseos de la base de datos para un usuario específico
    public static function obtenerDeseos($documento) {
        $consulta = self::$db->prepare('SELECT * FROM tb_lista_deseos WHERE documento = ?');
        $consulta->bind_param('s', $documento);
        $consulta->execute();
        return $consulta->get_result();
    }
}
?>
