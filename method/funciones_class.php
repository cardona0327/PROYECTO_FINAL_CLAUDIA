<?php

class HtmlGenerator {
    // Método estático para generar el HTML
    public static function createEmailHtml($name, $message, $dato,$id) {
        $html = "
            <!DOCTYPE html>
            <html lang='es'>
            <head>
                <meta charset='UTF-8'>
                <title>Mensaje de Correo</title>
                <style>
                    body { font-family: Arial, sans-serif; }
                    .container { padding: 20px; border: 1px solid #ccc; }
                    .message { margin-top: 10px; }
                    .code { margin-top: 10px; font-weight: bold; color: #333; }
                </style>
            </head>
            <body>
                <div class='container'>
                    <h1>Hola, $name!</h1>   
                    <div class='message'>
                        <p>$message</p>
                    </div>
                    <div class='code'>
                        <p>Ingresa esta nueva contraseña: $dato</p>
                        <a href='localhost/PROYECTO-CLAUDIA/cambioClave.php?codigo=".$id."'>dale click</a>
                    </div>
                </div>
            </body>
            </html>
        ";
        return $html;
    }
}
