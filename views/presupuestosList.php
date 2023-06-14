<form class="buscadorListados contenedor__row" method="get" action="../public/adminDashboard.php">
            <div class="col-3-12 col-4-12-sm">                
                <label for="nombre_cliente">Nombre cliente</label>
                <input type="text" name="nombre_cliente" id="nombre_cliente"/>
            </div>
            <div class="col-2-12 col-4-12-sm">                
                <label for="tipo_trabajo">Tipo de trabajo</label>
                <input type="text" name="tipo_trabajo" id="tipo_trabajo"/>
            </div>
            <div class="col-2-12 col-4-12-sm">                
                <label for="estado">Estado</label>
                <input type="text" name="estado" id="estado"/>
            </div>
            <div class="col-2-12 col-4-12-sm">                
                <label for="fechaEmisionIni">Fecha Emisión (Desde)</label>
                <input type="date" name="fechaEmisionIni" id="fechaEmisionIni"/>
            </div>
            <div class="col-2-12 col-4-12-sm">                
                <label for="fechaEmisionFin">Fecha Emisión (Hasta)</label>
                <input type="date" name="fechaEmisionFin" id="fechaEmisionFin"/>
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
            <td></td>
            <td>Cliente</td>            
            <td>Fecha Solicitud
                 <a href="../public/adminDashboard.php?orderBy=fecha_solicitud&orderDirection=ASC"><i class="fas fa-chevron-up"></i></a>
                 <a href="../public/adminDashboard.php?orderBy=fecha_solicitud&orderDirection=DESC"><i class="fas fa-chevron-down"></i></a>
            </td>
            <td>Fecha Emisión
                <a href="../public/adminDashboard.php?orderBy=fechaEmision&orderDirection=ASC"><i class="fas fa-chevron-up"></i></a>
                 <a href="../public/adminDashboard.php?orderBy=fechaEmision&orderDirection=DESC"><i class="fas fa-chevron-down"></i></a>
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
            echo "<span class='icono-descarga'>
            <a href='../public/presupuestos/{$fila["id"]}_{$fila["documento"]}' download><img id='edit' src='../public/img/download.svg'>
            </span>";
        }
        echo "</td>";
        echo "<td class='nombre-cli'>{$fila["nombre_cliente"]}</td>";
        echo "<td>{$fila["fecha_solicitud"]}</td>";
        echo "<td>{$fila["fechaEmision"]}</td>";
        echo "<td>{$fila["tipo_trabajo"]}</td>";
        echo "<td class='estado estado-{$fila["nombre_estado"]}'><p>{$fila["nombre_estado"]}</p></td>";
        echo "<td>{$fila["importe"]}€</td>";
        if($fila['nombre_estado'] == 'solicitado' || $fila['nombre_estado'] == 'pendiente'){
            echo "<td><a href='../public/adminDashboard.php?idPresu={$fila["id"]}'><img id='edit' src='../public/img/edit.svg'></a></td>";  
           
        }else{
            echo "<td></td>";
        }
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
