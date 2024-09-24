document.addEventListener('DOMContentLoaded', function() {
    const mensaje = localStorage.getItem('mensaje');
    if (mensaje) {
        Swal.fire({
            position: "top-end",
            icon: "success",
            title: mensaje,
            showConfirmButton: false,
            timer: 1500
        });

        localStorage.removeItem('mensaje');
    }
});
