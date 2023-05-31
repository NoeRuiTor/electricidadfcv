//CARROUSEL DE LOS SERVICIOS

function carrousel() {
    'use strict';
  
    const grande = document.querySelector('.carrousel__grande');
    const punto = document.querySelectorAll('.punto');
  
    // Cuando CLICK en punto
    // Saber la posición de ese punto
    // Aplicar un transform translateX al grande
    // QUITAR la clase activo de TODOS puntos
    // AÑADIR la clase activo al punto que hemos hecho CLICK
  
    // Recorrer TODOS los punto
    punto.forEach((cadaPunto, i) => {
      // Asignamos un CLICK a cadaPunto
      punto[i].addEventListener('click', () => {
        // Guardar la posición de ese PUNTO
        let posicion = i;
        // Calculando el espacio que debe DESPLAZARSE el GRANDE
        let operacion = posicion * -(100 / 6);
  
        // MOVEMOS el grande
        grande.style.transform = `translateX(${operacion}%)`;
  
        // Recorremos TODOS los punto
        punto.forEach((cadaPunto, i) => {
          // Quitamos la clase ACTIVO a TODOS los punto
          punto[i].classList.remove('activo');
        });
        // Añadir la clase activo en el punto que hemos hecho CLICK
        punto[i].classList.add('activo');
      });
    });
  }
  
  // Llamar a la función para ejecutar el código
  carrousel();

  //VALIDAR FORMULARIO

  ///Función de validación de NOMBRE y APELLIDOS
  function validarNombre() {
      let nombre = document.getElementById("nombre").value;   
      if (!nombre) {
        document.getElementById("errores").innerHTML = "<p class='errores__content'>Debe introducir nombre</p>";
        document.getElementById("nombre").focus();
        return false;
      }
    return true;
}

function validaEmail() {
    let email = document.getElementById("correo").value;

    // La expresión regular permite una combinación de caracteres alfanuméricos, seguidos de una arroba,
    // más caracteres alfanuméricos, un punto y dos o más caracteres alfanuméricos
    let emailRegex = /^[A-Za-z0-9]+@[A-Za-z0-9]+\.[A-Za-z]{2,}$/;

    if (!emailRegex.test(email)) {
        document.getElementById("errores").innerHTML = "<p class='errores__content'>Email inválido, debe seguir el formato usuario@dominio.com.</p>";
      document.getElementById("correo").focus();
      return false;
    }
    return true;
}

function validaTelefono() {
    let telefono = document.getElementById("telefono").value;
    let telefonoRegex = /^\d{9}$/;
    if (!telefonoRegex.test(telefono)) {
        document.getElementById("errores").innerHTML = "<p class='errores__content'>El teléfono debe contener 9 dígitos</p>";
      document.getElementById("telefono").focus();
      return false;
    }
   
    return true;
}

function validarCodigoPostal() {
    let cp = document.getElementById("cp").value;
    let cpRegex = /^\d{5}$/;

    if (!cpRegex.test(cp)) {
      document.getElementById("errores").innerHTML = "<p class='errores__content'>Debe introducir un código postal válido</p>";
      document.getElementById("cp").focus();
      return false;
    }
   
    return true;
}

function validarPrivacidad() {
    let checkbox = document.getElementById("ppriva");

    if (!checkbox.checked) {
      // El checkbox no está marcado
      document.getElementById("errores").innerHTML= "<p class='errores__content'>Debes aceptar la política de privacidad</p>";
      return false;
    }

    // El checkbox está marcado
    
    return true;
}

function validarTipoTrabajo() {
    let radios = document.getElementsByName("trabajo");
    let seleccionado = false;

    for (var i = 0; i < radios.length; i++) {
      if (radios[i].checked) {
        seleccionado = true;
        break;
      }
    }

    if (!seleccionado) {
      // No se ha seleccionado ninguna opción
      document.getElementById("errores").innerHTML= "<p class='errores__content'>Debe seleccionar algún tipo de trabajo</p>";
      return false;
    }

    // Al menos una opción está seleccionada
   
    return true;
}

 
// Función para manejar el envío del formulario
function enviaForm() {
  document.getElementById("errores").innerHTML="";
  // Validar campos
  if(validarNombre() && validaEmail() && validaTelefono() && validarCodigoPostal() && validarPrivacidad() && validarTipoTrabajo()){
      if(confirm("¿Está seguro de enviar el formulario?")){
         return true;           
      } else{
          return false;
      }  
  } else {
    
    return false;
  }
}
  
 

  