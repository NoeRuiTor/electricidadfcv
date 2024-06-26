<?php
session_start();

// Verificar si el formulario de inicio de sesión se ha enviado
if (isset($_REQUEST['entrar'])) {
    login();
} elseif (isset($_REQUEST['cambiar'])) {
    cambiaPassword();
} elseif (isset($_REQUEST['logout']) && $_REQUEST['logout'] === 'logout') {
    logout();
} else {
    $error = "Ha habido problemas al gestionar el login, vuelva a intentarlo";
    header("location: login.php?error=$error");
    exit();
}

function login(){
   
    require("../config/conectar_db.php");
    $con = conectar_db($bd);
   
        $email=$_REQUEST['email'];
        $pwd=$_REQUEST['password'];

        $query = "SELECT * FROM usuario WHERE email = :email AND estado = '1'";
        $params = array(
            ':email' => $email
             );
        $stmt = $con->prepare($query);
        $stmt->execute($params);
        $user = $stmt->fetch();  
		$hash = $user['psw'];
        if ($user && password_verify($pwd, $hash)) {            
            $rol = $user['rol'];

            // Inicio de sesión exitoso, establecer el tipo de usuario en la sesión
            $_SESSION['rol'] = $rol;

            if ($rol === 'administrador') {
                
                $_SESSION['usuario'] = $email;  
                $_SESSION['nombre'] = $user['nombre'];               
                $_SESSION['autentificado'] = "OK";
                $_SESSION['id'] = $user['id']; 
                $_SESSION['rol'] = $rol ; 

                // Redirigir al panel de administrador
                header('Location: adminDashboard.php');
                exit();
            } elseif ($rol === 'usuario') {
                
                $_SESSION['usuario'] = $email;  
                $_SESSION['nombre'] = $user['nombre'];               
                $_SESSION['autentificado'] = "OK";
                $_SESSION['id'] = $user['id']; 
                $_SESSION['rol'] = $rol;
                // Redirigir al panel de usuario normal
                header('Location:usuarioDashboard.php');
                exit();
            }
        } else {
            // Credenciales inválidas, mostrar mensaje de error
            $error = 'Credenciales inválidas, pongase en contacto con nosotros.Gracias';
            header("Location:login.php?error=$error");
            exit();
        }
    
}

function cambiaPassword(){
    require("../config/conectar_db.php");
    $con = conectar_db($bd);
    
        $email=$_REQUEST['email'];
        $pwd=$_REQUEST['old-password'];	    
        $newPwd=$_REQUEST['new-password'];
        $query = "SELECT * FROM usuario WHERE email = :email";
        $params = array(
            ':email' => $email
             );
        $stmt = $con->prepare($query);
        $stmt->execute($params);
        $user = $stmt->fetch();  
		$hash = $user['psw'];
        if ($user && password_verify($pwd, $hash)) {  
            $pwdHash=password_hash($newPwd, PASSWORD_DEFAULT);
            
            $sentencia = $con->prepare ("UPDATE usuario SET psw = :psw WHERE email = :email ;");
                if($sentencia -> execute(array(':psw' => $pwdHash,':email' => $email))){            
                    $mensaje='CONTRASEÑA ACTUALIZADA';
                    header("location:login.php?mensaje=$mensaje");
                    exit();   
                }else {
                    $error = 'ERROR AL INTRODUCIR LOS DATOS, VUELVA A INTENTARLO';
                    header("location:login.php?error=$error");
                    exit();
                }
        } else {
        $error = 'ERROR AL INTRODUCIR LOS DATOS, VUELVA A INTENTARLO';
                    header("location:login.php?error=$error");
                    exit();
        }   
    
}

function logout() {
    // Cerrar sesión y redirigir al formulario de inicio de sesión
    session_start();
    $_SESSION = array(); 
    session_destroy();
    header('Location: index.php');
    exit();
}


?>