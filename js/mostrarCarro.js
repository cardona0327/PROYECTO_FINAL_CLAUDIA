function mostrarCarrito() {
    $.ajax({
        url: 'ctroUser.php',
        data: { 'accion': 'mostrarCarrito' },
        method: 'GET',
        success: function (respuesta) {
            $('#contenedor-carrito').html(respuesta); // Actualiza el carrito en el DOM
        },
        error: function (xhr, status, error) {
            console.log("Error al mostrar el carrito: " + error);
        }
    });
}
