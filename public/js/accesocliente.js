
  
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