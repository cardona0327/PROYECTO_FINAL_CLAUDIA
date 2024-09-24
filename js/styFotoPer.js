function cambiarFoto() {
    var inputFoto = document.getElementById('inputFoto');
    var archivo = inputFoto.files[0];

    if (archivo) {
        var formData = new FormData();
        formData.append('foto', archivo);

        $.ajax({
            data: formData,
            url: '../usuarios/ctroUser.php?cambioFoto=true',
            type: 'POST',
            processData: false, // No procesar los datos (formData)
            contentType: false, // No establecer el tipo de contenido
            success: function(response) {
                document.getElementById('perfilFoto').src = response;
            },
            error: function(xhr, status, error) {
                console.log('Error: ' + error);
            }
        });
    }
}
