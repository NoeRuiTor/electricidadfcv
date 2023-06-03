<div class="presupuestos__tabla contenedor__row">

    <table class="col-12-12 col-10-12-sm">
        <tr class="tabla-head">
            <td>ID</td>
            <td></td>
            <td>Cliente</td>            
            <td>Fecha Solicitud
                 <a href="adminDashboard.php?orderBy=fecha_solicitud&orderDirection=ASC"><i class="fas fa-chevron-up"></i></a>
                 <a href="adminDashboard.php?orderBy=fecha_solicitud&orderDirection=DESC"><i class="fas fa-chevron-down"></i></a>
            </td>
            <td>Fecha Emisión
                <a href="adminDashboard.php?orderBy=fechaEmision&orderDirection=ASC"><i class="fas fa-chevron-up"></i></a>
                 <a href="adminDashboard.php?orderBy=fechaEmision&orderDirection=DESC"><i class="fas fa-chevron-down"></i></a>
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
        echo "<td class='nombre-cli'>{$fila["nombre_cliente"]}</td>";
        echo "<td>{$fila["fecha_solicitud"]}</td>";
        echo "<td>{$fila["fechaEmision"]}</td>";
        echo "<td>{$fila["tipo_trabajo"]}</td>";
        echo "<td class='estado estado-{$fila["nombre_estado"]}'><p>{$fila["nombre_estado"]}</p></td>";
        echo "<td>{$fila["importe"]}</td>";
        echo "<td><a href='editarPresupuesto.php?id='{$fila["id"]}'><img id='edit' src='../public/img/edit.svg'></a></td>";
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
</script>
