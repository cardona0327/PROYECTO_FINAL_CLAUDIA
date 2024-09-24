function agregarCarrito(idProducto, nombreProducto, precioProducto, cantidadProducto) {
    param = {
        "idProducto": idProducto,
        "nombreProducto": nombreProducto,
        "precioProducto": precioProducto,
        "cantidadProducto": cantidadProducto
    };

    $.ajax({
        data: param,
        url: 'ctroUser.php',
        dataType: 'html',
        method: 'GET',
        success: function (respuesta) {
            console.log("Respuesta del servidor: " + respuesta);

            // Comprobar la respuesta del servidor para mostrar la alerta adecuada
            if (respuesta.trim() === "1") {
                // Producto agregado correctamente
                Swal.fire({
                    icon: "success",
                    title: "Producto agregado",
                    text: "El producto se ha agregado al carrito correctamente."
                });
            } else if (respuesta.trim() === "2") {
                // Cantidad del producto actualizada
                Swal.fire({
                    position: "top-end",
                    icon: "success",
                    title: "Cantidad del producto actualizada",
                    showConfirmButton: false,
                    timer: 1500
                  });
            } else {
                // Error en la operación
                Swal.fire({
                    icon: "error",
                    title: "Error",
                    text: "Hubo un error al intentar agregar el producto al carrito."
                });
            }
        },
        error: function (xhr, status, error) {
            console.error("Error en la solicitud AJAX: " + error);
            Swal.fire({
                icon: "error",
                title: "Error",
                text: "Hubo un error en la solicitud al servidor."
            });
        }
    });
}
