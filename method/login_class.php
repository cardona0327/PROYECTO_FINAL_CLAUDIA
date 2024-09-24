<?php

class Loguin{
    // public static function verificaUsuarios($documento,$contraseña){
    //     include_once("modelo.php");
    //     $salida = 0;
    //     $consulta = Modelo::sqlLoguin($documento,$contraseña);
    //     while($fila = $consulta->fetch_array()){
    //         $salida = $fila[0];
    //     }
    //     return $salida;
    // }

    public static function verificaUsuarios($documento, $contraseña) {
        include_once("modelo.php");
        // Recuperar el hash de la contraseña
        $consulta = Modelo::sqlLoguin($documento);

        if ($consulta) {
            $hashAlmacenado = $consulta['contraseña'];

            // Verificar la contraseña ingresada con el hash almacenado
            if (password_verify($contraseña, $hashAlmacenado)) {
                return true; // Contraseña correcta
            } else {
                return false; // Contraseña incorrecta
            }
        } else {
            return false; // Usuario no encontrado
        }
    }


    public static function registraUsuarios($documento, $nombre, $apellido, $correo, $contraseña, $fecha) {
        include_once("modelo.php");
        $salida = 0;

        // Configuración para password_hash (nota: el tercer parámetro es ignorado para PASSWORD_DEFAULT)
        $cont = [
            "cost" => 12
        ];

        // Encriptar la contraseña
        $contraEncrip = password_hash($contraseña, PASSWORD_DEFAULT, $cont);

        // Registrar al usuario en la base de datos
        $consulta = Modelo::sqlRegistar($documento, $nombre, $apellido, $correo, $contraEncrip, $fecha);
        
        if ($consulta) {
            $salida = 2; // Registro exitoso
        } else {
            echo "Error en el registro";
        }
        return $salida;
    }

    public static function verRol($id){
        include_once("modelo.php");
        $salida = 0;
        $consulta = Modelo::sqlRol($id);
        while($fila = $consulta->fetch_array()){
            $salida = $fila[0];
        }
        return $salida;
    }

    public static function verDuplicados($documento,$correo){
        include_once("modelo.php");
        return Modelo::sqliDuplicados($documento, $correo) > 0;
    }
}