<?php
session_start();

// Verificar si el formulario de inicio de sesión se ha enviado
if (isset($_REQUEST['entrar'])) {
    validarLogin();
} elseif (isset($_REQUEST['cambiar'])) {
    validarCambioContraseña();
} elseif (isset($_REQUEST['logout'])) {
    logout();
}else{
    mostrarFormularioLogin();
}

function mostrarFormularioLogin() {
    include("../views/login.php");
}

function validarLogin() {

    require '../models/usuario_Model.php';
    $email=$_REQUEST['email'];
    $pwd=$_REQUEST['password'];

    $usuarioValido = validarCredenciales($email, $pwd);

    if ($usuarioValido) {
        // Verificar el tipo de usuario (administrador, usuario normal, etc.)
        $tipoUsuario = obtenerTipoUsuario($email);

        // Redireccionar a la vista correspondiente según el tipo de usuario
        if ($tipoUsuario === 'administrador') {
                $_SESSION['usuario'] = $email;  
                $_SESSION['nombre'] = $usuarioValido['nombre'];               
                $_SESSION['autentificado'] = "OK";
                $_SESSION['id'] = $usuarioValido['id'];   
            include("../views/adminDashboard.php");
        } else {
            $_SESSION['usuario'] = $email;  
            $_SESSION['nombre'] = $usuarioValido['nombre'];               
            $_SESSION['autentificado'] = "OK";
            $_SESSION['id'] = $usuarioValido['id']; 
            include("../views/usuarioDashboard.php");
        }
    } else {
        $_SESSION['error']= "Credenciales inválidas. Por favor, inténtalo de nuevo.";        
        include("../views/login.php");
    }
}

function validarCambioContraseña() {
    require '../models/usuario_Model.php';
    $email=$_REQUEST['email'];
    $pwd=$_REQUEST['old-password'];
    $newPwd = $_REQUEST['new-password'];

    $contraseñaCambiada = cambiaContraseña($email,$pwd,$newPwd);

    if($contraseñaCambiada){            
        $mensaje='CONTRASEÑA ACTUALIZADA';
        header("location:../public/login.php?mensaje=$mensaje");
            
    }else {
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
