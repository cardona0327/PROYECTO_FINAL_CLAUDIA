function cambiarFotoAdmi() {
    var inputFoto = document.getElementById('inputFoto');
    var archivo = inputFoto.files[0];

    if (archivo) {
        var formData = new FormData();
        formData.append('foto', archivo);
        formData.append('cambiarfoto', 'true');

        $.ajax({
            url: 'ctroAdmi.php',
            type: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            success: function(respuesta) {
                console.log("Respuesta del servidor:", respuesta); // Verifica la respuesta del servidor
                if (respuesta.startsWith('../img/')) {
                    // Actualiza la imagen en la interfaz con la nueva ruta
                    var nuevaImagen = document.getElementById('perfilFoto');
                    nuevaImagen.src = respuesta + '?' + new Date().getTime(); // Evita la caché
                } else {
                    console.log("Error: " + respuesta);
                }
            },
            error: function(xhr, status, error) {
                console.error('Error: ' + error);
            }
        });
    } else {
        console.log("No se seleccionó ninguna foto.");
    }
}