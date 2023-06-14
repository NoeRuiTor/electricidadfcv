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
    header("location: ../public/login.php?error=$error");
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
        $result = $stmt->rowCount();
        $hash = password_hash($pwd, PASSWORD_DEFAULT);
        if ($result > 0 && password_verify($pwd, $hash)) {
            $user = $stmt->fetch();
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
                header('Location: ../public/adminDashboard.php');
                exit();
            } elseif ($rol === 'usuario') {
                
                $_SESSION['usuario'] = $email;  
                $_SESSION['nombre'] = $user['nombre'];               
                $_SESSION['autentificado'] = "OK";
                $_SESSION['id'] = $user['id']; 
                $_SESSION['rol'] = $rol;
                // Redirigir al panel de usuario normal
                header('Location: ../public/usuarioDashboard.php');
                exit();
            }
        } else {
            // Credenciales inválidas, mostrar mensaje de error
            $error = 'Credenciales inválidas, pongase en contacto con nosotros.Gracias';
            header("Location: ../public/login.php?error=$error");
            exit();
        }
    
}

function cambiaPassword() {
    require("../config/conectar_db.php");
    $con = conectar_db($bd);

    $email = $_REQUEST['email'];
    $pwd = $_REQUEST['old-password'];
    $newPwd = $_REQUEST['new-password'];

    $query = "SELECT * FROM usuario WHERE email = :email";
    $params = array(
        ':email' => $email
    );
    $stmt = $con->prepare($query);
    $stmt->execute($params);
    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($result) {
        $hashedPwd = $result['psw'];

        if (password_verify($pwd, $hashedPwd)) {
            $pwdHash = password_hash($newPwd, PASSWORD_DEFAULT);

            $sentencia = $con->prepare("UPDATE usuario SET psw = :psw WHERE email = :email;");
            if ($sentencia->execute(array(':psw' => $pwdHash, ':email' => $email))) {
                $mensaje = 'CONTRASEÑA ACTUALIZADA';
                header("location:../public/login.php?mensaje=$mensaje");
                exit();
            } else {
                $error = 'ERROR AL INTRODUCIR LOS DATOS, VUELVA A INTENTARLO';
                header("location:../public/login.php?error=$error");
                exit();
            }
        } else {
            $error = 'CONTRASEÑA ANTIGUA INCORRECTA';
            header("location:../public/login.php?error=$error");
            exit();
        }
    } else {
        $error = 'USUARIO NO ENCONTRADO';
        header("location:../public/login.php?error=$error");
        exit();
    }
}



function logout() {
    // Cerrar sesión y redirigir al formulario de inicio de sesión
    session_start();
    $_SESSION = array(); 
    session_destroy();
    header('Location: ../public/index.php');
    exit();
}


?>