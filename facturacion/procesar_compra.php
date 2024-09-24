<?php
include 'funciones.php';
session_start();

$documento_usuario = 123; // Esto debería ser dinámico
$metodo_pago = $_POST['metodo_pago'];
$direccion = $_POST['direccion'];
$telefono = $_POST['telefono'];
$id = $_SESSION['id'];
$productos = obtenerProductosCarrito();

$factura_id = crearFactura($documento_usuario, $metodo_pago, $direccion, $telefono, $productos);

if ($factura_id) {
    header("Location: factura.php?factura_id=" . $factura_id);
    exit();
} else {
    echo "Error al crear la factura.";
}
?>
