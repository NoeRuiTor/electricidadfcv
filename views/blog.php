 <!---listado posts---->
    <div class="blog__posts col-9-12 col-12-12-sm">
    <?php
              // Cantidad de resultados por página
          $resultadosPorPagina = 2;

          // Calcular el número total de páginas
          $totalPaginas = ceil(count($post) / $resultadosPorPagina);
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
          $resultadosPagina = array_slice($post, $inicio, $resultadosPorPagina);
    
         //html de cada post
    
        foreach ($post as $p) : ?>
        
         <article class="posts__post post">
            <div>
                <img class="post-img" src='<?php echo $p['imagen']; ?>' alt="img-post".<?php echo $p['id']; ?>.>
                <div class="post-detalles">
                    <p class="post-detalles--color"><?php echo $p['fecha_emision']; ?></p>
                    <p class="post-detalles--estilo"><?php echo $p['etiqueta']; ?></p>
                </div>
                <h3 class="post-heading heading heading-terciary"><?php echo $p['titulo']; ?></h3>
                <p class="post-resumen"><?php echo $p['resumen']; ?><a href="blog.php?id=<?php echo $p['id']; ?>"> leer más...</a></p>
            </div>
        </article>
           
        <?php endforeach; 
        
    ?>
        

    </div>

 <!----aside con títulos y listado etiquetas---->

     <aside class="blog__aside col-3-12 col-12-12-sm">
            <div class="blog__aside-listado post_list">
                 <!-- Código HTML específico de la sección "Titulos de los posts" -->
 
                <?php foreach ($post as $p) : ?>
                    <div>
                        <a href="blog.php?id=<?php echo $p['id']; ?>"><h4 class="post_list-heading heading heading-cuaternary"><?php echo $p['titulo']; ?></h4></a>
                        <p class="post_list-fecha"><?php echo $p['fecha_emision']; ?></p>
                    </div>   
                <?php endforeach; ?>


            </div>  
       
           <div class="blog__aside-etiquetas">
            <!-- Código HTML específico de la sección "Listado de etiquetas" -->
                <h4 class="etiquetas-heading heading heading-primary ">
                            <p>Etiquetas</p>
                                <span></span>
                </h4>
                <?php foreach ($post as $p) : ?>
                    <a href="blog.php?etiqueta=<?php echo $p['etiqueta']; ?>"><p class="etiquetas-etiqueta"><?php echo $p['etiqueta']; ?> </p></a>
                <?php endforeach; ?>

           </div>
   
    </aside>

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