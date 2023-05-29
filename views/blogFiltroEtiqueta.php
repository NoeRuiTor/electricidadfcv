<div class="blog__posts col-12-12 col-12-12-sm">
    <?php
              // Cantidad de resultados por página
          $resultadosPorPagina = 2;

          // Calcular el número total de páginas
          $totalPaginas = ceil(count($postFiltrado) / $resultadosPorPagina);
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
          $resultadosPagina = array_slice($postFiltrado, $inicio, $resultadosPorPagina);
    
         //html de cada post
    
        foreach ($postFiltrado as $p) : ?>
        
         <article class="posts__post post post--filtrado">
            <div>
                <img class="post-img" src='<?php echo $p['imagen']; ?>' alt="img-post".<?php echo $p['id']; ?>.>
                <div class="post-detalles">
                    <p class="post-detalles--color"><?php echo $p['fecha_emision']; ?></p>
                    <p class="post-detalles--estilo"><?php echo $p['etiqueta']; ?></p>
                </div>
                <h2 class="post-heading heading heading-secondary"><?php echo $p['titulo']; ?></h2>
                <p class="post-resumen"><?php echo $p['resumen']; ?><a href="blog.php?id=<?php echo $p['id']; ?>">leer más...</a></p>
            </div>
        </article>
        <div id="volver" class="col-12-12 col-12-12-sm">
            <a  href="blog.php">Volver</a> 
        </div>
           
        <?php endforeach; 
        
    ?>
        

    </div>
    <div class="paginacion col-12-12 col-12-12-sm">
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
