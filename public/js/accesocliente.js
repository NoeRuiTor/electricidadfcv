document.getElementById("darAccesoCliente").addEventListener("click", function() {
    // Realizar una solicitud al servidor para enviar el correo electrónico
    fetch("enviar_correo.php")
      .then(function(response) {
        if (response.ok) {
          // El correo electrónico ha sido enviado exitosamente
          mostrarMensaje("El correo electrónico ha sido enviado exitosamente.", "success");
          cambiarColorIcono("blue");
        } else {
          // Ha ocurrido un error al enviar el correo electrónico
          mostrarMensaje("Ha ocurrido un error al enviar el correo electrónico.", "error");
        }
      })
      .catch(function(error) {
        // Ha ocurrido un error al enviar el correo electrónico
        mostrarMensaje("Ha ocurrido un error al enviar el correo electrónico.", "error");
      });
  });
  
  function mostrarMensaje(mensaje, tipo) {
    // Crear un elemento de mensaje
    var mensajeElemento = document.createElement("div");
    mensajeElemento.textContent = mensaje;
  
    // Asignar la clase de estilo según el tipo de mensaje
    if (tipo === "success") {
      mensajeElemento.classList.add("success");
    } else if (tipo === "error") {
      mensajeElemento.classList.add("error");
    }
  
    // Agregar el mensaje al documento
    var contenedorMensajes = document.getElementById("errores");
    contenedorMensajes.appendChild(mensajeElemento);
  }

  function activarIcono() {
    var icono = document.getElementById("enviarCorreo");
    icono.style.color = color;
  }