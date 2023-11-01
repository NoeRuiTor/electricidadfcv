<?php

    function mostrarGaleria() {
      require '../models/trabajos_Model.php';
      $galeria = obtenerGaleria();
      include("../views/trabajos.php");
    }

    function mostrarGaleriaCategoria($categoria) {
        require '../models/trabajos_Model.php';
        $galeriaCategoria = obtenerCategoriaGaleria($categoria);
        include("../views/trabajosCategoria.php");
    }

    function detalle($id) {
        require '../models/trabajos_Model.php';
        $detalleImagen = obtenerImagen($id);
        include("../views/trabajos.php");
    }

?>
