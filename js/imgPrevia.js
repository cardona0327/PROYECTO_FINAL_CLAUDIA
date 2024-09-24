function previewImage() {
    var preview = document.getElementById('preview'); // Imagen de vista previa
    var file = document.getElementById('imagen').files[0]; // Archivo seleccionado
    var reader = new FileReader();

    if (file) {
        reader.onloadend = function () {
            preview.src = reader.result; // Si hay un archivo, mostrar la imagen seleccionada
        }
        reader.readAsDataURL(file);
    } else {
        preview.src = "../img/hellokitty.gif"; // Si no se selecciona nada, mostrar la imagen predeterminada
    }
}
