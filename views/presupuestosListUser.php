<div class="presupuestos__tabla contenedor__row">

    <table class="col-12-12 col-10-12-sm">
        <tr class="tabla-head">
            <td>ID</td>
            <td></td>
            <td></td>                 
            <td>Fecha Solicitud
                 <a href="usuarioDashboard.php?orderBy=fecha_solicitud&orderDirection=ASC"><i class="fas fa-chevron-up"></i></a>
                 <a href="usuarioDashboard.php?orderBy=fecha_solicitud&orderDirection=DESC"><i class="fas fa-chevron-down"></i></a>
            </td>
            <td>Fecha Emisión
                <a href="usuarioDashboard.php?orderBy=fechaEmision&orderDirection=ASC"><i class="fas fa-chevron-up"></i></a>
                 <a href="usuarioDashboard.php?orderBy=fechaEmision&orderDirection=DESC"><i class="fas fa-chevron-down"></i></a>
            </td>
            <td>Tipo de trabajo</td>           
            <td>Estado</td>
            <td>Importe</td>
            <td></td>
        </tr>
    <?php
        foreach ($presupuestos as $fila) {
        echo "<tr class='tabla-fila'>";
        echo "<td>{$fila["id"]}</td>";
        echo "<td>";
        if (!empty($fila["documento"])) {
            echo "<span class='icono-descarga'></span>";
        }
        echo "</td>";
        echo "<td>";
        if ($fila["nombre_estado"] == "Pendiente") {
            echo "<a href='#' onclick='mostrarAlertPersonalizado({$fila["id"]});'>";
            echo "<i class='fas fa-signature'></i>";
            echo "</a>";
        }
        echo "</td>";        
        echo "<td>{$fila["fecha_solicitud"]}</td>";
        echo "<td>{$fila["fechaEmision"]}</td>";
        echo "<td>{$fila["tipo_trabajo"]}</td>";
        echo "<td class='estado estado-{$fila["nombre_estado"]}'><p>{$fila["nombre_estado"]}</p></td>";
        echo "<td>{$fila["importe"]}</td>";        
        echo "</tr>";
        }
    ?>
    </table>
</div>
<script>
    const orderArrows = document.querySelectorAll('.order-arrow');

    orderArrows.forEach(arrow => {
        arrow.addEventListener('click', () => {
            arrow.classList.toggle('asc');
            arrow.classList.toggle('desc');
        });
    });


  
  function mostrarAlertPersonalizado(idPresupuesto) {
    // Personaliza el mensaje de la ventana de alerta según tus necesidades
    var mensaje = "¿Estás seguro de aceptar este presupuesto?";

    if (confirm(mensaje)) {
      // Si se acepta el presupuesto, puedes realizar alguna acción adicional aquí
      // Por ejemplo, puedes enviar una solicitud al servidor para actualizar el estado del presupuesto a "Aceptado"
      // utilizando AJAX o redirigir a otra página.
      // Puedes utilizar el parámetro `idPresupuesto` para identificar el presupuesto seleccionado.
    } else {
      // Acción cuando se cancela la aceptación del presupuesto
    }
  }

</script>
