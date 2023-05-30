<?php
   

    function obtenerGaleria() {      

        require '../config/conectar_db.php';
        $conn=conectar_db($bd);
        $stmt = $conn->prepare("SELECT * FROM trabajo");
        $stmt->execute();       
        $galeria = array();
        while($fila = $stmt->fetch()) {
        $galeria[] = $fila;
    }
        return $galeria;
    }

function obtenerCategoriaGaleria($categoria) {
        require '../config/conectar_db.php';
        $conn=conectar_db($bd);
        $stmt = $conn->prepare("SELECT * FROM trabajo WHERE categoria = :categoria");
        $stmt->execute([':categoria' => $categoria]);
        $categoriaGaleria = array();
        while ($fila = $stmt->fetch()) {
            $categoriaGaleria[] = $fila;
        }
        return $categoriaGaleria;
    }
    

    function obtenerImagen($id) {
        require '../config/conectar_db.php';
        $conn=conectar_db($bd);
        $stmt = $conn->prepare("SELECT * FROM trabajo where id = $id");
        $stmt->execute();
        $datosImagen = array();
        while($fila = $stmt->fetch()) {
        $datosImagen[] = $fila;
        
        }
      return $datosImagen;
    }



?>
