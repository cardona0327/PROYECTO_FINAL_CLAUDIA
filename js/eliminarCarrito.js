function eliminarProducto(idProducto) {
    param = {
        "idProductoEliminar": idProducto
    };

    $.ajax({
        data: param,
        url: 'ctroUser.php',
        dataType: 'html',
        method: 'GET',
        success: function (respuesta) {
            console.log("Respuesta del servidor: " + respuesta.trim()); // Asegúrate de usar trim()

            // Usa trim() para evitar problemas con espacios adicionales
            if (respuesta.trim() === "1") {
                Swal.fire({
                    icon: "success",
                    title: "Eliminado correctamente",
                    text: "El producto ha sido eliminado del carrito."
                });
                mostrarCarrito(); // Actualiza el carrito después de eliminar
            } else {
                Swal.fire({
                    icon: "error",
                    title: "Error",
                    text: "Ocurrió un error al eliminar el producto."
                });
            }
        },
        error: function (xhr, status, error) {
            console.log("Error en la solicitud AJAX: " + error);
            Swal.fire({
                icon: "error",
                title: "Error",
                text: "Hubo un error en la solicitud al servidor."
            });
        }
    });
}
