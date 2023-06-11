<form class="buscadorListados contenedor__row" method="get" action="../public/adminDashboardUsuarios.php">
            <div class="col-6-12 col-4-12-sm">                
                <label for="nombre">Nombre cliente</label>
                <input type="text" name="nombre" id="nombre"/>
            </div>           
            <div class="col-2-12 col-4-12-sm">                
                <label for="estado">Estado</label>
                <input type="text" name="estado" id="estado"/>
            </div>
            <div class="col-1-12 col-1-12-sm"> 
                 <button type="submit" name="btnBuscar" id="search-button">
                    <i class="fas fa-search"></i>
                 </button>
            </div>
             
</form>


<div class="tablaListados contenedor__row">

    <table class="col-12-12 col-12-12-sm">
        <tr class="tabla-head">
            <td>ID</td>        
            <td>Cliente
                <a href="../public/adminDashboardUsuarios.php?orderBy=nombre&orderDirection=ASC"><i class="fas fa-chevron-up"></i></a>
                <a href="../public/adminDashboardUsuarios.php?orderBy=nombre&orderDirection=DESC"><i class="fas fa-chevron-down"></i></a>
            </td>            
            <td>Ciudad
                <a href="../public/adminDashboardUsuarios.php?orderBy=ciudad&orderDirection=ASC"><i class="fas fa-chevron-up"></i></a>
                <a href="../public/adminDashboardUsuarios.php?orderBy=ciudad&orderDirection=DESC"><i class="fas fa-chevron-down"></i></a>
            </td>        
            <td>C.Postal</td>
            <td>Email</td>            
            <td>Teléfono</td>           
            <td>Estado</td>        
            <td >Edit</td>
            <td>Access</td>
        </tr>
    <?php
    $contador = 0;
    foreach ($usuarios as $fila) {
        $iconoID = "icono-ojo-" . $contador;
        echo "<tr class='tabla-fila'>";
        echo "<td>{$fila["id"]}</td>";
        echo "<td class='nombre-cli'>{$fila["nombre"]}</td>";
        echo "<td>{$fila["ciudad"]}</td>";
        echo "<td>{$fila["cpostal"]}</td>";
        echo "<td>{$fila["email"]}     <a class='td-contact' href='mailto:{$fila["email"]}'>
                <i class='fas fa-envelope'></i>
                </a>";      
        echo "</td>";
        echo "<td>{$fila["telefono"]}   <a class='td-contact' href='tel:{$fila["telefono"]}'>
                <i class='fas fa-phone'></i>
                </a>";
        echo "</td>";
        echo "<td class='estado estado-{$fila["nombre_estado"]}'><p>{$fila["nombre_estado"]}</p></td>";    
        echo "<td><a href='../public/adminDashboardUsuarios.php?idUser={$fila["id"]}'><img id='edit' src='../public/img/edit.svg'></a></td>";
        echo "<td><i class='fas fa-eye-slash' id ='iconoID' data-cliente-id={$fila["id"]} onclick='alternarIcono(this)'></i></td>";
        echo "</tr>";
        $contador++;
        }
        
    ?>
     
    </table>   
   
</div>

<script>
  document.addEventListener('DOMContentLoaded', function() {
    <?php foreach ($usuarios as $contador => $fila) { ?>
      // Obtener el ID único del icono del ojo
      var iconoID = "icono-ojo-<?php echo $contador; ?>";

      // Obtener el elemento del icono del ojo utilizando el ID
      var iconoOjo = document.getElementById(iconoID);

      // Asignar el evento de clic al icono del ojo
      iconoOjo.addEventListener('click', function() {
        alternarIcono(iconoId);
        // Obtener el ID del cliente desde un atributo de datos (por ejemplo, data-cliente-id)
        //var clienteId = this.getAttribute('data-cliente-id');
      
    /*fetch("../controllers/enviar_acceso.php?clienteId=" + clienteId)
    .then(function(response) {
      if (response.ok) {
        // El correo electrónico ha sido enviado exitosamente
        mostrarMensaje("El correo electrónico ha sido enviado exitosamente.", "success");
        alternarIcono(iconoId);
        
      } else {
        // Ha ocurrido un error al enviar el correo electrónico
        mostrarMensaje("Ha ocurrido un error al enviar el correo electrónico.", "error");
      }
    })
    .catch(function(error) {
      // Ha ocurrido un error al enviar el correo electrónico
      mostrarMensaje("Ha ocurrido un error al enviar el correo electrónico.", "error");
    });*/
      });
    <?php } ?>
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

  function alternarIcono(icono) {
      var icon = icono;
       // Comprobar si el elemento tiene la clase 'fa-eye-slash'
    if (icon.classList.contains('fa-eye-slash')) {
      // Cambiar la clase a 'fa-eye'
      icon.classList.remove('fa-eye-slash');
      icon.classList.add('fa-eye');
    } else {
      // Cambiar la clase a 'fa-eye-slash'
      icon.classList.remove('fa-eye');
      icon.classList.add('fa-eye-slash');
    }
  }
    


</script>

