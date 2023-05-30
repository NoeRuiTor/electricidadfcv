<?php

function listadoPosts(){
    require '../config/conectar_db.php';
    $conn=conectar_db($bd);
    $stmt = $conn->prepare("SELECT * FROM post");
    $stmt->execute();       
    $post = array();
    while($fila = $stmt->fetch()) {
    $post[] = $fila;
}
    return $post;
}


function filtradoEtiquetas($etiqueta){
    require '../config/conectar_db.php';
    $conn=conectar_db($bd);
    $stmt = $conn->prepare("SELECT * FROM post WHERE etiqueta like :etiqueta");
    $stmt->execute([':etiqueta' => $etiqueta]);       
    $postFiltrado = array();
    while($fila = $stmt->fetch()) {
    $postFiltrado[] = $fila;
}
    return $postFiltrado;

}


function detallePost($id){
    require '../config/conectar_db.php';
    $conn=conectar_db($bd);
    $stmt = $conn->prepare("SELECT * FROM post WHERE id = :id");
    $stmt->execute([':id' => $id]);   
    $postContenido = $stmt->fetch(); //OBTIENE SÓLO LA PRIMERA FILA
    return $postContenido;

}

?>