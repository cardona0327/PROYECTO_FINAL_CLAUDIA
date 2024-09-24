function buscadorUser() {
    var valor = document.getElementById('nombreUser').value;
    var param = {
        "IDbuscar": valor
    };

    $.ajax({
        data: param,
        url: 'ctroAdmi.php',
        datatype: 'text', // Asegúrate de que el tipo de datos coincida con la respuesta del servidor
        method: 'GET',
        success: function(respuesta) {
            // Verifica si la respuesta contiene algún usuario
            if (respuesta.trim() === '' ) {
                Swal.fire({
                    icon: "error",
                    title: "Oops...",
                    text: "Este usuario no se encuentra registrado!",
                  });
            } else {
                document.getElementById('mostrarUser').innerHTML = respuesta;
            }
        },
        error: function(xhr, status, error) {
            // Manejo del error
            if (xhr.status === 404) {
                alert('El usuario no se encuentra.');
            } else {
                alert('Ocurrió un error: ' + error);
            }
        }
    });
}

