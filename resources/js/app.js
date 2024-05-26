import './bootstrap';

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();

window.onload = function() {
    document.querySelector('input[autofocus]').blur();
};

// Hacer que la alerta se elimine a los 5 segundos
document.addEventListener('DOMContentLoaded', function () {
    // Selecciona la alerta por su id
    var alerta = document.getElementById('alerta');

    // Verifica si la alerta existe
    if (alerta) {
        // Elimina la alerta después de 5 segundos
        setTimeout(function () {
            alerta.style.display = 'none';
        }, 5000);

         // Añade un event listener para ocultar la alerta al hacer clic
         alerta.addEventListener('click', function () {
            alerta.style.display = 'none';
        });
    }
});

document.addEventListener('DOMContentLoaded', function () {
    const profesorCheckbox = document.getElementById('profesorCheckbox');
    const inputContainer = document.getElementById('inputContainer');
    const alumnoCheckbox = document.getElementById('alumnoCheckbox');

    function toggleInput() {
        if (profesorCheckbox.checked) {
            inputContainer.classList.remove('hidden');
        } else {
            inputContainer.classList.add('hidden');
        }
    }

    profesorCheckbox.addEventListener('change', toggleInput);
    alumnoCheckbox.addEventListener('change', toggleInput);

    // Initial check on page load
    toggleInput();
});

document.addEventListener('DOMContentLoaded', function () {
    document.querySelectorAll('[data-modal-hide="popup-modal"]').forEach(function (element) {
        element.addEventListener('click', function () {
            window.location.reload();
        });
    });
});
