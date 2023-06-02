//VALIDAR FORMULALRIO DE CONTACTO
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

    

    if (!checkbox.checked) {
        // El checkbox no está marcado
        showCustomAlert("Debes aceptar la política de privacidad");
        return false;
    }
  
    
    return true;
  }
