<?php

class EncriptarURl{

    public static function encriptar($dato) {
        return base64_encode($dato);
    }
    
    public static function desencriptar($dato) {
        return base64_decode($dato);
    }

}
