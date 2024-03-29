<?php


function listarPresupuestos(){
    require("../config/conectar_db.php");  
    $conn=conectar_db($bd);
        $stmt = $conn->prepare('SELECT p.*, u.nombre AS nombre_cliente, e.nombre AS nombre_estado
                        FROM presupuesto p
                        JOIN usuario u ON p.id_usuario = u.id
                        JOIN estado e ON p.estado = e.id;
        ');
        $stmt->execute();       
        $presupuestos = array();
        while($fila = $stmt->fetch()) {
        $presupuestos[] = $fila;
    }
        return $presupuestos;
}

function obtenerPresupuestosUsuario($idUser) {
    require '../config/conectar_db.php';
    $conn=conectar_db($bd);
    $stmt = $conn->prepare('SELECT p.*, u.nombre AS nombre_cliente, e.nombre AS nombre_estado
                            FROM presupuesto p
                            JOIN usuario u ON p.id_usuario = u.id
                            JOIN estado e ON p.estado = e.id WHERE p.id_usuario = :id_usuario;');
    $stmt->execute([':id_usuario' => $idUser]);
    $presupuestosUser = array();
    while ($fila = $stmt->fetch()) {
        $presupuestosUser[] = $fila;
    }
    return $presupuestosUser;
}
function obtenerPresupuestosOrdenados($orderBy, $orderDirection) {
    require("../config/conectar_db.php");
    $con = conectar_db($bd);   

    $stmt = $con->prepare("SELECT p.*, u.nombre AS nombre_cliente, e.nombre AS nombre_estado
            FROM presupuesto p
            JOIN usuario u ON p.id_usuario = u.id
            JOIN estado e ON p.estado = e.id ORDER BY p.{$orderBy} {$orderDirection}");

    $stmt->execute();
    $presupuestosOrdenados = array();
    while($fila = $stmt->fetch()) {
    $presupuestosOrdenados[] = $fila;    
    
    }
    return $presupuestosOrdenados;

}

function buscarPresupuestos($nombreCliente, $tipoTrabajo, $fechaEmisionIni, $fechaEmisionFin, $estado) {
    require("../config/conectar_db.php");
    $con = conectar_db($bd);

    $sql = "SELECT p.*, u.nombre AS nombre_cliente, e.nombre AS nombre_estado
            FROM presupuesto p
            JOIN usuario u ON p.id_usuario = u.id
            JOIN estado e ON p.estado = e.id
            WHERE 1 = 1"; // Filtro base para evitar problemas con las condiciones

    // Agregar condiciones según los parámetros de búsqueda ingresados
    if (!empty($nombreCliente)) {
        $sql .= " AND u.nombre LIKE :nombreCliente";
    }

    if (!empty($tipoTrabajo)) {
        $sql .= " AND p.tipo_trabajo LIKE :tipo_trabajo";
    }

    if (!empty($fechaEmisionIni) && !empty($fechaEmisionFin)) {
        $sql .= " AND p.fechaEmision BETWEEN :fechaEmisionIni AND :fechaEmisionFin";
    }

    if (!empty($estado)) {
        // Obtener el identificador del estado por su nombre
        $subquery = "SELECT id FROM estado WHERE nombre = :estado";
        $sql .= " AND p.estado IN ($subquery)";
    }

    $stmt = $con->prepare($sql);

    // Asociar los valores de los parámetros utilizando bindParam()
    if (!empty($nombreCliente)) {
        $nombreCliente = "%$nombreCliente%"; // Agregar comodines % al valor
        $stmt->bindParam(':nombreCliente', $nombreCliente, PDO::PARAM_STR);
    }

    if (!empty($tipoTrabajo)) {
        $tipoTrabajo = "%$tipoTrabajo%";
        $stmt->bindParam(':tipo_trabajo', $tipoTrabajo, PDO::PARAM_STR);
    }

    if (!empty($fechaEmisionIni) && !empty($fechaEmisionFin)) {
        $stmt->bindParam(':fechaEmisionIni', $fechaEmisionIni, PDO::PARAM_STR);
        $stmt->bindParam(':fechaEmisionFin', $fechaEmisionFin, PDO::PARAM_STR);
    }

    if (!empty($estado)) {
        $stmt->bindParam(':estado', $estado, PDO::PARAM_STR);
    }

    $stmt->execute();

    $presupuestosEncontrados = array();
    while ($fila = $stmt->fetch()) {
        $presupuestosEncontrados[] = $fila;
    }

    return $presupuestosEncontrados;
}

function obtenerPresupuestosOrdenadosCliente($orderBy, $orderDirection,$idUser) {
    require("../config/conectar_db.php");
    $con = conectar_db($bd);   

    $stmt = $con->prepare("SELECT p.*, u.nombre AS nombre_cliente, e.nombre AS nombre_estado
            FROM presupuesto p
            JOIN usuario u ON p.id_usuario = u.id
            JOIN estado e ON p.estado = e.id WHERE p.id_usuario = :id_usuario ORDER BY p.{$orderBy} {$orderDirection}");

    $stmt->execute([':id_usuario' => $idUser]);
    $presupuestosOrdenadosCliente = array();
    while($fila = $stmt->fetch()) {
    $presupuestosOrdenadosCliente[] = $fila;    
    
    }
    return $presupuestosOrdenadosCliente;

}


function buscarPresupuestosCliente($nombreCliente, $tipoTrabajo,  $fechaEmisionIni, $fechaEmisionFin, $estado, $idUser) {
    require("../config/conectar_db.php");
    $con = conectar_db($bd);

    $sql = "SELECT p.*, u.nombre AS nombre_cliente, e.nombre AS nombre_estado
            FROM presupuesto p
            JOIN usuario u ON p.id_usuario = u.id
            JOIN estado e ON p.estado = e.id
            WHERE p.id_usuario = :id_usuario"; // Filtro por ID de usuario

    // Agregar condiciones según los parámetros de búsqueda ingresados
    if (!empty($nombreCliente)) {
        $sql .= " AND u.nombre LIKE :nombreCliente";
    }

    if (!empty($tipoTrabajo)) {
        $sql .= " AND p.tipo_trabajo LIKE :tipo_trabajo";
    }

    if (!empty($fechaEmisionIni) && !empty($fechaEmisionFin)) {
        $sql .= " AND p.fechaEmision BETWEEN :fechaEmisionIni AND :fechaEmisionFin";
    }

    if (!empty($estado)) {
        // Obtener el identificador del estado por su nombre
        $subquery = "SELECT id FROM estado WHERE nombre = :estado";
        $sql .= " AND p.estado IN ($subquery)";
    }

    $stmt = $con->prepare($sql);

    // Asociar los valores de los parámetros utilizando bindParam()
    $stmt->bindParam(':id_usuario', $idUser, PDO::PARAM_INT);

    if (!empty($nombreCliente)) {
        $nombreCliente = "%$nombreCliente%"; // Agregar comodines % al valor
        $stmt->bindParam(':nombreCliente', $nombreCliente, PDO::PARAM_STR);
    }

    if (!empty($tipoTrabajo)) {
        $tipoTrabajo = "%$tipoTrabajo%";
        $stmt->bindParam(':tipo_trabajo', $tipoTrabajo, PDO::PARAM_STR);
    }

    if (!empty($fechaEmisionIni) && !empty($fechaEmisionFin)) {
        $stmt->bindParam(':fechaEmisionIni', $fechaEmisionIni, PDO::PARAM_STR);
        $stmt->bindParam(':fechaEmisionFin', $fechaEmisionFin, PDO::PARAM_STR);
    }

    if (!empty($estado)) {
        $stmt->bindParam(':estado', $estado, PDO::PARAM_STR);
    }

    $stmt->execute();

    $presupuestosEncontradosCliente = array();
    while ($fila = $stmt->fetch()) {
        $presupuestosEncontradosCliente[] = $fila;
    }

    return $presupuestosEncontradosCliente;
}

function consultaPresupuesto($idPresu){
    require("../config/conectar_db.php");  
    $conn=conectar_db($bd);
    $stmt = $conn->prepare('SELECT p.*, u.nombre AS nombre_cliente
                            FROM presupuesto p
                            INNER JOIN usuario u ON p.id_usuario = u.id
                            WHERE p.id = :id');        
        $stmt->execute([':id'=>$idPresu]);       
        $presupuesto = $stmt->fetch(PDO::FETCH_ASSOC);

    return $presupuesto;   
  
}

function modificaPresupuesto($idPresu, $fechaEmision, $importe, $fechaVencimiento, $numPresu, $documento, $estado) {
    require("../config/conectar_db.php");  
    $conn = conectar_db($bd);
    $stmt = $conn->prepare("UPDATE presupuesto SET fechaEmision=:fechaEmision, importe=:importe, fechaVencimiento=:fechaVencimiento, num_presupuesto=:num_presupuesto, documento=:documento, estado=:estado WHERE id = :id;");
    $result = $stmt->execute([
        ':id' => $idPresu,
        ':fechaEmision' => $fechaEmision,
        ':importe' => $importe,
        ':fechaVencimiento' => $fechaVencimiento,
        ':num_presupuesto' => $numPresu,
        ':documento' => $documento,
        ':estado' => $estado
    ]);

    return $result !== false; // Devuelve true si la ejecución fue exitosa, false en caso contrario
}
function modificaEstadoPresu($idPresu,$estado){
    require("../config/conectar_db.php");  
    $conn = conectar_db($bd);
    $stmt = $conn->prepare("UPDATE presupuesto SET estado=:estado WHERE id = :id;");
    $result = $stmt->execute([
        ':id' => $idPresu,        
        ':estado' => $estado
    ]);

    return $result !== false; // Devuelve true si la ejecución fue exitosa, false en caso contrario
}
?>