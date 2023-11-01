function validaLogin() {
    let user = document.getElementById("user").value;
    let pwd = document.getElementById("password").value;

    if (user === "") {
        document.getElementById("errores").innerHTML = "<p class='errores__content'>Debe introducir el email</p>";
        return false;
    }

    if (pwd === "") {
        document.getElementById("errores").innerHTML = "<p class='errores__content'>Debe introducir la contraseña</p>";
        return false;
    }

    return true;
}

// Función para manejar el envío del formulario
function enviaForm() {
    document.getElementById("errores").innerHTML = "";
    // Validar campos
    if (validaLogin()) {
        return true;
    } else {
        return false;
    }
}
