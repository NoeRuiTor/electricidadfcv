<?php


function insertarSolicitudPresupuesto($nombre,$ciudad,$cpostal,$telefono,$email,$tipoTrabajo,$fechaActual){
    require("../config/conectar_db.php");
    $con = conectar_db($bd);

    try {
        // Iniciar transacción
            $con->beginTransaction();
        // Con esta sentencia SQL insertaremos los datos en la base de datos
        $smtpUsuario = $con->prepare("INSERT INTO usuario (nombre,ciudad,cpostal,telefono,email)
                                    VALUES (:nombre,:ciudad,:cpostal,:telefono,:email)");
       $smtpUsuario->execute(array(
            ':nombre' => $nombre,
            ':email' => $email,
            ':ciudad'=> $ciudad,
            ':cpostal'=> $cpostal,
            ':telefono'=> $telefono            
       ));
            
        //obtener ID del usuario:
        $idUsuario=$con->lastInsertId();       
        
    // Insertar presupuesto
    $stmtPresupuesto = $con->prepare("INSERT INTO presupuesto (id_usuario,tipo_trabajo,fecha_solicitud) VALUES (:id_usuario,:tipo_trabajo,:fecha_solicitud)");
    $stmtPresupuesto->execute(array(
        ':id_usuario' => $idUsuario,
        ':tipo_trabajo' => $tipoTrabajo,
        ':fecha_solicitud' => $fechaActual     
    ));

    // Confirmar transacción
    $con->commit();

        // La inserción fue exitosa
        return true;
    } catch (PDOException $e) {
        // Ocurrió un error, deshacer la transacción
        $con->rollback();
        return false;
    }
    
}

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
    $stmt = $conn->prepare("SELECT * FROM presupuesto WHERE id_usuario = :id_usuario");
    $stmt->execute([':id_usuario' => $idUser]);
    $presupuestosUser = array();
    while ($fila = $stmt->fetch()) {
        $presupuestosUser[] = $fila;
    }
    return $presupuestosUser;
}




?>