<div id="galery" class="galeria contenedor__row">
          <?php
              // Cantidad de resultados por página
          $resultadosPorPagina = 6;

          // Calcular el número total de páginas
          $totalPaginas = ceil(count($galeriaCategoria) / $resultadosPorPagina);
          $totalPaginas = round($totalPaginas,0,PHP_ROUND_HALF_UP);
          // Obtener el número de página actual
          if (isset($_GET['pagina'])) {
              $paginaActual = $_GET['pagina'];
          } else {
              $paginaActual = 1;
          }

          // Calcular el índice de inicio y fin de los resultados a mostrar
          $inicio = ($paginaActual - 1) * $resultadosPorPagina;
          $fin = $inicio + $resultadosPorPagina;

          // Obtener el subconjunto de elementos del arreglo
          $resultadosPagina = array_slice($galeriaCategoria, $inicio, $resultadosPorPagina);
            foreach ($resultadosPagina as $foto) {
                // Mostrar la foto y la descripción
                echo '<div class="galeria__card-foto card-foto col-4-12 col-12-12-sm">';
                echo '<img src="' . $foto['imagen'] . '" alt="foto-' . $foto['id'] . '">';
                echo '<p class="foto-descripcion">' . $foto['descripcion'] . '</p>';
                echo '</div>';
            }
          ?>
</div>
<div class="paginacion">
<?php
    // Mostrar la paginación
    for ($i = 1; $i <= $totalPaginas; $i++) {
        // Agregar el parámetro de página a los enlaces
        $url = $_SERVER['PHP_SELF'] . '?pagina=' . $i;

        // Resaltar la página actual
        if ($i == $paginaActual) {
            echo "<span class='pagina-actual'>$i</span>";
        } else {
            echo "<a href='$url'>$i</a>";
        }
    }
?>
  
</div>