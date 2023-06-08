<?php

session_start();
include_once("../config/funciones.php");

if(isset($_SESSION['rol'])){
    if($_SESSION['rol'] == 'usuario'){
        header('location:../views/usuarioDashboard.php');
        exit();
    }else{
        header('location:../views/adminDashboard.php');
        exit();
    }
}

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="<?php parametro_plantilla("description"); ?>">
    <meta name="Keywords" content="<?php parametro_plantilla("keywords"); ?>"> 
    <link rel="shortcut icon" type="image/x-icon" href="img/favicon.png">    
    <link rel="stylesheet" href="css/main.css"> 
    <script defer src="js/alertInfo.js" ></script>    
    <script defer src="js/login.js" ></script>       
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
	<title><?php parametro_plantilla("titulo_pagina"); ?></title>
    
</head>
<body>
       <!-------CABECERA CON NAVEGADOR--------->

            <header class="header contenedor__row">
                <div class="header__logo col-3-12 col-12-12-sm">
                    <img class="logo" src="img/logo.png" alt="electricidadFCV" width="150" height="150" >
                </div>
                <div class="menu-icon">
                        <i class="fas fa-bars"></i>
                </div> 
                <div class="menu-login">
                 <a href="login.php"><i class="fas fa-sign-in-alt"></i></a>

                </div> 
                <nav class="col-6-12 header__nav nav" id="bars">
                               
                     <ul class="menu" id="menu-items">
                            <li class="menu__opcion"><a class="<?php active('index.php'); ?>" href="../index.php">Inicio</a></li>
                            <li class="menu__opcion"><a class="<?php active('servicios.php'); ?>" href="servicios.php">Servicios</a></li>                
                            <li class="menu__opcion"><a class="<?php active('trabajos.php'); ?>" href="trabajos.php">Trabajos</a></li> 
                            <li class="menu__opcion"><a class="<?php active('presupuesto.php'); ?>" href="presupuestos.php">Presupuesto</a></li>
                            <li class="menu__opcion"><a class="<?php active('blog.php'); ?>" href="blog.php">Blog</a></li>       
                            <li class="menu__opcion"><a class="<?php active('contacto.php'); ?>" href="contacto.php">Contacto</a></li>
                    
                      </ul>          
                </nav>
                <a href="login.php" class="header__btn btn btn--login col-3-12 col-3-12-sm">
                <?php if(isset($_SESSION['autentificado']) && $_SESSION['autentificado'] == 'OK'){echo 'Mi cuenta';}
                else{echo 'Acceso usuarios'; }?>
                </a>
            </header>

      <!--------SCRIPT MENU RESPONSIVE------->

<script>
        const limit_size_screen = window.matchMedia('screen and (max-width: 768px)');
        const menu = document.querySelector('#bars');
        const menuIcon = document.querySelector('.menu-icon');

        function validation(event) {
        if (event.matches) {
            menuIcon.addEventListener('click', hideShow);
        } else {
            menuIcon.removeEventListener('click', hideShow);
            menu.classList.remove('is-active'); // Asegurarse de ocultar el menú en pantallas grandes
        }
        }

        validation(limit_size_screen);

        function hideShow() {
        menu.classList.toggle('is-active'); // Agrega o quita la clase 'is-active' para mostrar u ocultar el menú
        }

</script>
    

       

        <!----------PANEL ADMINISTRACION INTRANET----->

            <section class="admin__nav contenedor__row">
                <div class="admin__nav-heading col-12-12 col-12-12-sm">
                    <h2 class="heading heading-secondary">
                        Acceso zona de clientes
                    </h2>
                </div>
            </section>
        <!------CONTENIDO------>

        <main class="contenedor">

        <!-----------FORMULARIO LOGIN---------->
     
            <section class="admin__login ">
             <div class="contenedor__row"> 
                <div class="admin__nav-heading col-12-12 col-12-12-sm">
                    <h3 class="heading heading-terciary">
                        INICIA SESIÓN
                    </h3>
                </div>
                <form class="admin__login-form col-12-12 col-12-12-sm" action="../controllers/login_Controller.php" method="post" onsubmit="return enviaForm()">
                    <div class="form-input">
                        <label class="label-login" for="email">Usuario*</label>
                        <input class="input-login" type="email" name="email" id="user" placeholder="email">
                    </div>
                    <div class="form-input">
                        <label class="label-login" for="email">Contraseña*</label>
                        <input class="input-login" type="password" name="password" id="password" placeholder="*********">
                    </div>
                    <div id="errores"> </div>
                    <?php if (isset($_REQUEST['error'])) : ?>
                        <div id="errores">
                            <?php echo $_REQUEST['error']; ?>
                        </div>
                    <?php endif;?>
                    <?php if (isset($_REQUEST['mensaje'])) : ?>
                        <div id="mensaje">
                            <?php echo $_REQUEST['mensaje']; ?>
                        </div>
                    <?php endif;?>


                    <div class="form-boton">
                         <input type="submit" class="btn btn--enviar" name="entrar" value="ENTRAR">
                     </div>
                     
                 </form>
                 <div class="admin__remember col-12-12 col-12-12-sm">   
                    <a id="cambiar-contrasena" class="admin__remember-psw" href="#"><p>Cambiar contraseña</p></a>              
                 </div>

                 <form id="seccion-cambiar-contrasena" class="col-12-12 col-12-12-sm" action="../controllers/login_Controller.php" method="post"style="display: none; ">
                    <div class="form-input">
                        <label class="label-login" for="email">Usuario*</label>
                        <input class="input-login" type="email" name="email" id="user" placeholder="email">
                    </div>
                    <div class="form-input">
                        <label class="label-login" for="old-password">Contraseña antigua*</label>
                        <input class="input-login" type="password" name="old-password" id="old-password" placeholder="Contraseña antigua">
                    </div>
                    <div class="form-input">
                        <label class="label-login" for="new-password">Nueva contraseña*</label>
                        <input class="input-login" type="password" name="new-password" id="new-password" placeholder="Nueva contraseña">
                    </div>
                    <div class="form-boton">
                         <input type="submit" class="btn btn--enviar" name="cambiar" value="Enviar">
                     </div>

                </form>
                <!---------------SCRIPT FORMULARIO CAMBIO DE CONTRASEÑA---------------->

                <script>
                    // Obtener el enlace "Cambiar contraseña" por su id
                    const enlaceCambiarContrasena = document.getElementById('cambiar-contrasena');

                    // Obtener la sección para cambiar la contraseña por su id
                    const seccionCambiarContrasena = document.getElementById('seccion-cambiar-contrasena');

                    // Agregar un manejador de eventos al enlace "Cambiar contraseña"
                    enlaceCambiarContrasena.addEventListener('click', function(e) {
                        e.preventDefault(); // Prevenir el comportamiento predeterminado del enlace
                        
                        // Mostrar u ocultar la sección para cambiar la contraseña según su estado actual
                        if (seccionCambiarContrasena.style.display === 'none') {
                            seccionCambiarContrasena.style.display = 'block';
                        } else {
                            seccionCambiarContrasena.style.display = 'none';
                        }
                    });

                </script>    
              </div>
            </section>
     


            </main>
<?php

include("../plantillas/info-contacto.php");
include("../plantillas/pie.php");
?>           