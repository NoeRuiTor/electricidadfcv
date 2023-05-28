<?php

    function mostrarPosts() {
      require '../models/blog_Model.php';
      $post = listadoPosts();
      include("../views/blog.php");
    }

   
    function mostrarPostsFiltrados($etiqueta) {
        require '../models/blog_Model.php';
        $postFiltrado = filtradoEtiquetas($etiqueta);
        include("../views/blogFiltroEtiqueta.php");
    }

    function mostrarPostContenido($id) {
        require '../models/blog_Model.php';
        $postContenido = detallePost($id);
        include("../views/blogDetalle.php");
    }

?>
