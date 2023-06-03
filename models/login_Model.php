<?php

function validarCredenciales($email, $pwd) {
    require '../config/conectar_db.php';
    $conn=conectar_db($bd);
    $stmt = $conn->prepare("SELECT * FROM usuarios WHERE email = :email AND psw = :psw");
    $stmt->execute([':email' => $email, ':psw' => $pwd]);   
    $result = $stmt->fetch(); //OBTIENE SÓLO LA PRIMERA FILA
    
    // Verificar si se encontró un usuario válido
    $usuarioValido = ($result !== false);

    // Cerrar la conexión y liberar recursos
    $stmt->closeCursor();
    $conn = null;

    return $usuarioValido;
}

function obtenerTipoUsuario($email) {
  

    require '../config/conectar_db.php';
    $conn=conectar_db($bd);
    $stmt = $conn->prepare("SELECT rol FROM usuario WHERE email = :email");
    $stmt->execute([':email' => $email]);   
    $result = $stmt->fetch(); //OBTIENE SÓLO LA PRIMERA FILA
    
    // Obtener el tipo de usuario
    $tipoUsuario = $result['rol'];

    // Cerrar la conexión y liberar recursos
    $stmt->closeCursor();
    $conn = null;

    return $tipoUsuario;
}
function cambiaContraseña($email,$pwd,$newPwd){
    require("../config/conectar_db.php");
    $con = conectar_db($bd);
    $query = "SELECT * FROM usuario WHERE email = :email AND psw = :psw";
        $params = array(
            ':email' => $email,
            ':psw' => $pwd
        );
        $stmt = $con->prepare($query);
        $stmt->execute($params);
        $result = $stmt->rowCount();
        if ($result> 0) {
            $pwdHash=password_hash($newPwd, PASSWORD_DEFAULT);
            
            $sentencia = $con->prepare ("UPDATE usuario SET psw = :psw WHERE email = :email ;");
            $contraseñaCambiada = $sentencia -> execute(array(':psw' => $pwdHash,':email' => $email));

            return $contraseñaCambiada;
        }  
        else{
            return false;
        }
}
?>
