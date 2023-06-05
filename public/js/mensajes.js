window.addEventListener('DOMContentLoaded', function() {
    mostrarSiContenido('errores');
    mostrarSiContenido('mensaje');
});

function mostrarSiContenido(elementId) {
    var elemento = document.getElementById(elementId);
    
    if (elemento.textContent.trim() !== '') {
        elemento.style.display = 'block';
    }
}
