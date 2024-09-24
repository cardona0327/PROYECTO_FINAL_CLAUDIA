function filtrarPorColor(color) {
    const categorias = document.querySelectorAll('.categoria');
    categorias.forEach(categoria => {
        const productoColor = categoria.getAttribute('data-color'); // Asegúrate de que cada categoría tenga este atributo
        if (color === 'todos' || productoColor === color) {
            categoria.style.display = 'block'; // Muestra el producto
        } else {
            categoria.style.display = 'none'; // Oculta el producto
        }
    });
}

function filtrarPorTalla(talla) {
    const categorias = document.querySelectorAll('.categoria');
    categorias.forEach(categoria => {
        const productoTalla = categoria.getAttribute('data-talla');
        if (talla === 'todos' || productoTalla === talla) {
            categoria.style.display = 'block'; // Muestra el producto
        } else {
            categoria.style.display = 'none'; // Oculta el producto
        }
    });
}

