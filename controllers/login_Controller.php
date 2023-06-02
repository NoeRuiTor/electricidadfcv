<?php

session_start();

// Verificar si el formulario de inicio de sesión se ha enviado
if (isset($_REQUEST['entrar'])) {
    login();
} elseif (isset($_REQUEST['cambiar'])) {
    cambiaPassword();
} elseif (isset($_REQUEST['logout'])) {
    logout();
}

function login(){
    require("../config/conectar_db.php");
    $con = conectar_db($bd);
   
        $email=$_REQUEST['email'];
        $pwd=$_REQUEST['password'];

        $query = "SELECT * FROM usuario WHERE email = :email AND psw = :psw";
        $params = array(
            ':email' => $email,
            ':psw' => $pwd
        );
        $stmt = $con->prepare($query);
        $stmt->execute($params);
        $result = $stmt->rowCount();
        if ($result > 0) {
            $user = $stmt->fetch();
            $rol = $user['rol'];

            // Inicio de sesión exitoso, establecer el tipo de usuario en la sesión
            $_SESSION['rol'] = $rol;

            if ($rol === 'administrador') {
             
                $_SESSION['usuario'] = $email;  
                $_SESSION['nombre'] = $user['nombre'];               
                $_SESSION['autentificado'] = "OK";
                $_SESSION['id'] = $user['id'];   

                // Redirigir al panel de administrador
                header('Location: admin_dashboard.php');
                exit();
            } elseif ($rol === 'usuario') {
                
                $_SESSION['usuario'] = $email;  
                $_SESSION['nombre'] = $user['nombre'];               
                $_SESSION['autentificado'] = "OK";
                $_SESSION['id'] = $user['id']; 
                // Redirigir al panel de usuario normal
                header('Location: user_dashboard.php');
                exit();
            }
        } else {
            // Credenciales inválidas, mostrar mensaje de error
            $error = 'Credenciales inválidas';
            header("Location: ../public/login.php?error=$error");
            exit();
        }
    
}
function cambiaPassword(){
    require("../config/conectar_db.php");
    $con = conectar_db($bd);
    
        $email=$_REQUEST['email'];
        $pwd=$_REQUEST['old-password'];
        $newPwd=$_REQUEST['new-password'];
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
                if($sentencia -> execute(array(':psw' => $pwdHash,':email' => $email))){            
                    $mensaje='CONTRASEÑA ACTUALIZADA';
                    header("location:../public/login.php?mensaje=$mensaje");
                        
                }else {
                    $error = 'ERROR AL INTRODUCIR LOS DATOS, VUELVA A INTENTARLO';
                    header("location:../public/login.php?error=$error");
                }
        } else {
        $error = 'ERROR AL INTRODUCIR LOS DATOS, VUELVA A INTENTARLO';
                    header("location:../public/login.php?error=$error");
        }   
    
}


function logout() {
    // Cerrar sesión y redirigir al formulario de inicio de sesión
    session_destroy();
    header('Location: login.php');
    exit();
}


?>