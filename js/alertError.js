document.addEventListener("DOMContentLoaded", function() {
    const urlParams = new URLSearchParams(window.location.search);

    if (urlParams.has('error')) {
        const error = urlParams.get('error');
        const tiempo = parseInt(urlParams.get('tiempo'), 10);

        if (error === 'blocked') {
            const tiempoRestante = Math.max(tiempo, 0); // Evitar valores negativos
            const fechaFin = new Date().getTime() + tiempoRestante * 1000; // Tiempo de fin en milisegundos

            Swal.fire({
                icon: 'warning',
                title: 'Cuenta Bloqueada',
                html: `Estás bloqueado durante <strong id="countdown">${Math.ceil(tiempoRestante / 60)} minutos</strong>.`,
                showConfirmButton: false,
                allowOutsideClick: true,
                didOpen: () => {
                    const countdownElement = Swal.getHtmlContainer().querySelector('#countdown');
                    const timerInterval = setInterval(() => {
                        const tiempoRestanteActual = Math.max(0, Math.ceil((fechaFin - new Date().getTime()) / 1000));
                        const minutos = Math.floor(tiempoRestanteActual / 60);
                        const segundos = tiempoRestanteActual % 60;
                        countdownElement.textContent = `${minutos} minutos ${segundos} segundos`;

                        if (tiempoRestanteActual <= 0) {
                            clearInterval(timerInterval);
                            countdownElement.textContent = 'Tu cuenta está desbloqueada. Puedes intentar nuevamente.';
                        }
                    }, 1000);
                }
                
            }).then(() => {
                // Limpia los parámetros de la URL después de mostrar la alerta
                window.history.replaceState({}, document.title, window.location.pathname);
            });
        } else if (error === '1') {
            Swal.fire({
                icon: 'error',
                title: 'Contraseña Incorrecta',
                text: 'La contraseña ingresada es incorrecta o tu cuenta no existe. Inténtalo de nuevo.',
                confirmButtonText: 'Aceptar'
            }).then(() => {
                // Limpia los parámetros de la URL después de mostrar la alerta
                window.history.replaceState({}, document.title, window.location.pathname);
            });
        }
    }
});
