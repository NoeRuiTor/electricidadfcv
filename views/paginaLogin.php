<?php

include_once("../config/funciones.php");


?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="<?php parametro_plantilla("description"); ?>">
    <meta name="Keywords" content="<?php parametro_plantilla("keywords"); ?>"> 
    <link rel="shortcut icon" type="image/x-icon" href="../public/img/favicon.png">
    <script defer src="../public/js/app.js" ></script>  
    <script defer src="../public/js/cookies.js" ></script>    
    <link rel="stylesheet" href="../public/css/main.css">     
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
	<title><?php parametro_plantilla("titulo_pagina"); ?></title>
    
</head>
<body>
       <!--------CABECERA CON NAVEGADOR---->

            <header class="header contenedor__row">
                <div class="header__logo col-3-12 col-12-12-sm">
                    <img class="logo" src="../public/img/logo.png" alt="electricidadFCV" width="150" height="150" >
                </div>
                    <nav class="header__nav nav col-6-12 col-9-12-sm">            
                        <ul class="menu">
                            <li class="menu__opcion"><a class="<?php active('index.php'); ?>" href="../public/index.php">Inicio</a></li>
                            <li class="menu__opcion"><a class="<?php active('servicios.php'); ?>" href="paginaServicios.php">Servicios</a></li>                
                            <li class="menu__opcion"><a class="<?php active('trabajos.php'); ?>" href="paginaTrabajos.php">Trabajos</a></li> 
                            <li class="menu__opcion"><a class="<?php active('presupuesto.php'); ?>" href="paginaPresupuesto.php">Presupuesto</a></li>
                            <li class="menu__opcion"><a class="<?php active('blog.php'); ?>" href="paginaBlog.php">Blog</a></li>       
                            <li class="menu__opcion"><a class="<?php active('contacto.php'); ?>" href="paginaContacto.php">Contacto</a></li>
                    
                        </ul>          
                    </nav>
                <a href="#" class="header__btn btn btn--login col-3-12 col-3-12-sm">Acceso clientes</a>
                
            </header>

       <!------CONTENIDO------>

            <main class="contenedor">

        <!----------PANEL ADMINISTRACION INTRANET----->

            <section class="admin__nav contenedor__row">
                <div class="admin__nav-heading col-12-12 col-12-12-sm">
                    <h2 class="heading heading-secondary">
                        Acceso zona de clientes
                    </h2>
                </div>
            </section>

        <!-----------FORMULARIO LOGIN---------->

            <section class="admin__login contenedor__row">
                <div class="admin__nav-heading col-12-12 col-12-12-sm">
                    <h3 class="heading heading-terciary">
                        INICIA SESIÓN
                    </h3>
                </div>
                <form class="admin__login-form col-12-12 col-12-12-sm" action="#" method="post">
                    <div class="form-input">
                        <label class="label-login" for="email">Usuario*</label>
                        <input class="input-login" type="email" name="email" value="email">
                    </div>
                    <div class="form-input">
                        <label class="label-login" for="email">Contraseña*</label>
                        <input class="input-login" type="password" name="password" value="contraseña">
                    </div>
                    <div class="form-boton">
                         <input type="submit" class="btn btn--entrar" name="entrar" value="ENTRAR">
                     </div>
                     
                 </form>
                 <div class="admin__remember col-12-12 col-12-12-sm">   
                    <a class="admin__remember-psw" href="#"><p>¿Has olvidado tú contraseña?</p></a>              
                 </div>
            </section>


            </main>
<?php
include("info-contacto.php");
include("pie.php");
?>           