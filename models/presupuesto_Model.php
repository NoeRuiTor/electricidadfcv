<?php
require_once("../config/conectar_db.php");

function insertarSolicitudPresupuesto($nombre,$ciudad,$cpostal,$telefono,$email,$tipoTrabajo, $fechaActual ){
    $con = conectar_db("electricidad_fcv");

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
?>