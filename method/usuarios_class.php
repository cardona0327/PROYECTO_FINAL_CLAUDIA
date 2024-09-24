<?php

class Usuarios{

    public static function eliminarCuentaUser($id){
        include_once("modelo.php");
        $salida = 0;
        $consulta = Modelo::sqlEliminarUser($id);
        if($consulta){
            $salida = 1;
        }
        return $salida;
    }

    public static function buscarId($email){
        include_once("modelo.php");
        $salida = "";
        $consulta = Modelo::sqlBuscarId($email);
        while($fila = $consulta->fetch_array()){
            $salida = $fila[0];
        }
        return $salida;
    }

    public static function verificaCon($contraseñaN,$doc){
        include_once("modelo.php");
        $consulta = Modelo::verficaClave($contraseñaN,$doc);
        while($fila = $consulta->fetch_array()){
            $salida = $fila[0];
        }
        return $salida;
    }
    
    

    public static function perfilUsuario($id) {
        include_once("modelo.php");
        include_once("login_class.php");
    
        $consulta = Modelo::sqlPerfil($id);
        $salida = "<div class='perfil-container'>";
    
        while ($fila = $consulta->fetch_assoc()) {
            // Definir la ruta de la foto o usar una predeterminada si no hay foto
            $foto = !empty($fila['foto']) ? '../img/' . $fila['foto'] : '../img/perfil.jpg';
            $rol = Loguin::verRol($id); // Verificar el rol del usuario
            
            $salida .= "<div class='perfil-foto-container'>";
            if($rol==0){
                echo "<h1><center>Perfil del Administrador</center></h1>";
                $salida .= "<img id='perfilFoto' src='" . $foto . "' alt='Foto de perfil' class='perfil-foto' onclick='document.getElementById(\"inputFoto\").click();'>";
                $salida .= "<input type='file' id='inputFoto' style='display: none;' onchange='cambiarFotoAdmi()'>";
            }else{
                $salida .= "<img id='perfilFoto' src='" . $foto . "' alt='Foto de perfil' class='perfil-foto' onclick='document.getElementById(\"inputFoto\").click();'>";
                $salida .= "<input type='file' id='inputFoto' style='display: none;' onchange='cambiarFoto()'>";
    
            }
            $salida .= "</div>";
            $salida .= "<div class='perfil-datos'>";
            $salida .= "<div class='perfil-item'><span>Documento:</span> " . $fila['documento'] . "</div>";
            $salida .= "<div class='perfil-item'><span>Nombre:</span> " . $fila['nombre'] . "</div>";
            $salida .= "<div class='perfil-item'><span>Apellido:</span> " . $fila['apellido'] . "</div>";
            $salida .= "<div class='perfil-item'><span>Correo:</span> " . $fila['correo'] . "</div>";
            $salida .= "<div class='perfil-item'><span>Contraseña:</span> " . $fila['contraseña'] . "</div>";
            $salida .= "<div class='perfil-item'><span>Fecha de nacimiento:</span> " . $fila['fecha'] . "</div>";
            
            if(Loguin::verRol($id)==0 or Loguin::verRol($id)==1){
                $salida .= "<a class='btn btn-success' href='../admi/ctroBar.php?seccion=actuUser' role='button'><i class='fa fa-pencil-alt'></i> Editar</a><br>";
                $salida .= "<a class='btn btn-danger' href='../usuarios/ctroBar.php?seccion=ctroAdmi&eliCuenta=true'><i class='fas fa-trash-alt'></i> Eliminar cuenta</a>";
            }else{
                $salida .= "<a class='btn btn-success' href='../usuarios/conBaBus.php?seccion=actuUser' role='button'><i class='fa fa-pencil-alt'></i> Editar</a><br>";
                $salida .= "<a class='btn btn-danger' href='../usuarios/conBaBus.php?seccion=ctroUser&eliCuenta=true'><i class='fas fa-trash-alt'></i> Eliminar cuenta</a>";

            }
            $salida .= "</div>";
        }
    
        $salida .= "</div>";
        return $salida;
    }

    public static function mostrarDeseosConEliminar($documento_usuario) {
        include_once("modelo.php");
        $deseos = Modelo::obtenerDeseosUsuario($documento_usuario);
        if ($deseos) {
            echo "<div class='lista-deseos'>";
            while ($deseo = mysqli_fetch_assoc($deseos)) {
                echo "<div class='deseo'>";
                echo "<h3>" . $deseo['nombre_deseo'] . "</h3>";
                echo "<p>Fecha de creación: " . $deseo['fecha_creacion'] . "</p>";
                $imagenes = explode(',', $deseo['foto_referencia']);
                echo "<div class='imagenes-deseo'>";
                foreach ($imagenes as $imagen) {
                    echo "<img src='../img/$imagen' alt='Imagen de referencia'>";
                }
                echo "</div>";
                echo "<a class='btn-eliminar' href='../method/controladorDeseo.php?accion=eliminar&id_deseo=" . $deseo['id_deseo'] . "'>Eliminar</a>";
                echo "</div>";
            }
            echo "</div>";
        }
    }
    



}
