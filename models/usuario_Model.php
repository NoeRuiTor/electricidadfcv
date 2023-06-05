<?php
function obtenerUsuarios() {      

    require '../config/conectar_db.php';
    $conn=conectar_db($bd);
    $stmt = $conn->prepare("SELECT u.*, e.nombre AS nombre_estado
                            FROM usuario u
                            JOIN estado e ON u.estado = e.id
                            WHERE u.rol != 'administrador'");
    $stmt->execute();       
    $usuarios = array();
    while($fila = $stmt->fetch()) {
    $usuarios[] = $fila;
    }
    return $usuarios;
 }

 function obtenerUsuariosOrdenados($orderBy, $orderDirection) {
    require("../config/conectar_db.php");
    $con = conectar_db($bd);   

    $stmt = $con->prepare("SELECT u.*, e.nombre AS nombre_estado
                            FROM usuario u
                            JOIN estado e ON u.estado = e.id WHERE u.rol != 'administrador'
                            ORDER BY {$orderBy} {$orderDirection}");
    $stmt->execute();
    $usuariosOrdenados = array();
    while($fila = $stmt->fetch()) {
    $usuariosOrdenados[] = $fila;    
    
    }
    return $usuariosOrdenados;

}

function buscarUsuarios($nombre, $estado) {
    require("../config/conectar_db.php");
    $con = conectar_db($bd);

    $sql = "SELECT u.*, e.nombre AS nombre_estado
            FROM usuario u
            JOIN estado e ON u.estado = e.id
            WHERE 1 = 1 AND u.rol != 'administrador'"; // Filtro base para evitar problemas con las condiciones

    // Agregar condiciones según los parámetros de búsqueda ingresados
    if (!empty($nombre)) {
        $sql .= " AND u.nombre LIKE :nombre";
    }
    
    if (!empty($estado)) {
        // Obtener el identificador del estado por su nombre
        $subquery = "SELECT id FROM estado WHERE nombre = :estado";
        $sql .= " AND u.estado IN ($subquery)";
    }

    $stmt = $con->prepare($sql);

    if (!empty($nombre)) {
        $nombre = "%$nombre%"; // Agregar comodines % al valor
        $stmt->bindParam(':nombre', $nombre, PDO::PARAM_STR);
    }
    if (!empty($estado)) {
        $stmt->bindParam(':estado', $estado, PDO::PARAM_STR);
    }
    
    $stmt->execute();

    $usuariosEncontrados = array();
    while ($fila = $stmt->fetch()) {
        $usuariosEncontrados[] = $fila;
    }

    return $usuariosEncontrados;
}
?>