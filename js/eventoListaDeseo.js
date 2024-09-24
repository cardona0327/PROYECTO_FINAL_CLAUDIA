document.addEventListener('DOMContentLoaded', function() {
    const formulario = document.getElementById('formulario-deseo');
    const inputArchivos = document.getElementById('foto_referencia');
    const mensajeError = document.getElementById('mensaje-error');
    

    formulario.addEventListener('submit', function(event) {
        // Verificar el número de archivos seleccionados
        if (inputArchivos.files.length > 5) {
            // Prevenir el envío del formulario
            event.preventDefault();

            // Mostrar el mensaje de error
            mensajeError.textContent = 'No puedes subir más de 5 imágenes.';
            mensajeError.style.display = 'block';
        } else {
            // Ocultar el mensaje de error si el número de imágenes es correcto
            mensajeError.style.display = 'none';
        }
    });
});