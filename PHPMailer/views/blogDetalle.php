
<article class="blog__detallePost post post--detalle col-12-12 col-12-12-sm">
    <div>
        <img class="post-img" src='<?php echo $postContenido['imagen']; ?>' alt="img-post".<?php echo $postContenido['id']; ?>.>
        <div class="post-detalles">
        <p class="post-detalles--color"><?php echo $postContenido['fecha_emision']; ?></p>
        <p class="post-detalles--estilo"><?php echo $postContenido['etiqueta']; ?></p>
        </div>
        <h2 class="post-heading heading heading-secondary"><?php echo $postContenido['titulo']; ?></h2>
        <p class="post-contenido"><?php echo $postContenido['contenido']; ?></p>
    </div>   
</article>
<div id="volver" class="col-12-12 col-12-12-sm">
 <a  href="blog.php">Volver</a> 
</div>





