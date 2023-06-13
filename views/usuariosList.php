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
        </tr>
    <?php
    $contador = 0;
    foreach ($usuarios as $fila) {
       
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
        echo "</tr>";
      
        }
        
    ?>
     
    </table>   
   
</div>



