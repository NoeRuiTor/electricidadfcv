//VALIDAR FORMULALRIO DE CONTACTO
function validarCorreo(emeal) {
  // Expresión regular para validar correo electrónico
  var patronCorreo = /^[^\s@]+@[^\s@]+\.(com|org|net|gob|edu)$/;
  return patronCorreo.test(emeal);
}

function validarTelefono(tel) {
  // Expresión regular para validar número de teléfono español sin código de país
  var patronTelefono = /^[6-9]\d{8}$/;
  return patronTelefono.test(tel);
}
function validaDatosContacto(){
    let emeal = document.getElementById("emeal").value;
    let tel = document.getElementById("tel").value;
    let nom = document.getElementById("nom").value;
    let checkbox = document.getElementById("ppriva");
   
    
    if(nom ==="") {
      showCustomAlert("Debes completar el campo nombre");
        return false;
    } 

    if (emeal === "" && tel === "") {
      showCustomAlert("Debes completar el campo de correo electrónico o teléfono.");
      return false;
    }
    // Validar correo electrónico
    if (emeal !== "" && !validarCorreo(emeal)) {
      showCustomAlert("Correo electrónico no válido.");
      return false;
    }

   // Validar número de teléfono
     if (tel !== "" && !validarTelefono(tel)) {
      showCustomAlert("Número de teléfono español no válido.");
      return false;
     }


    if (!checkbox.checked) {
        // El checkbox no está marcado
        showCustomAlert("Debes aceptar la política de privacidad");
        return false;
    }
  
    
    return true;
  }
