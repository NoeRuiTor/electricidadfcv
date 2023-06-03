<div class="presupuestos__tabla contenedor__row">

    <table class="col-12-12 col-10-12-sm">
        <tr class="tabla-head">
            <td>ID</td>
            <td></td>
            <td>Cliente</td>            
            <td>Fecha Solicitud</td>
            <td>Fecha Emisión</td>
            <td>Tipo de trabajo</td>           
            <td>Estado</td>
            <td>Importe</td>
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
