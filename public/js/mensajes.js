window.onload = function() {
    mostrarSiContenido('errores');
    mostrarSiContenido('mensaje');
};

function mostrarSiContenido(elementId) {
    var elemento = document.getElementById(elementId);
    
    if (elemento && elemento.textContent.trim() !== '') {
        elemento.style.display = 'block';
    }
}

