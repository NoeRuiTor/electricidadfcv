<?php

include_once("config/funciones.php");


?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="<?php parametro_plantilla("description"); ?>">
    <meta name="Keywords" content="<?php parametro_plantilla("keywords"); ?>"> 
    <link rel="shortcut icon" type="image/x-icon" href="imgs/favicon.png">
    <script defer src="js/app.js" ></script>  
    <script defer src="js/cookies.js" ></script>    
    <link rel="stylesheet" href="css/main.css">     
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
	<title><?php parametro_plantilla("titulo_pagina"); ?></title>
    
</head>
<body>
   <div class="site">      

            <header class="header contenedor__row">
                <div class="header__logo col-3-12 col-12-12-sm">
                    <img class="logo" src="imgs/logo.png" alt="electricidadFCV" width="150" height="150" >
                </div>
                    <nav class="header__nav nav col-6-12 col-9-12-sm">            
                        <ul class="menu">
                            <li class="menu__opcion"><a class="<?php active('index.php'); ?>" href="index.php">Inicio</a></li>
                            <li class="menu__opcion"><a class="<?php active('servicios.php'); ?>" href="views/paginaServicios.php">Servicios</a></li>                
                            <li class="menu__opcion"><a class="<?php active('trabajos.php'); ?>" href="views/paginaTrabajos.php">Trabajos</a></li> 
                            <li class="menu__opcion"><a class="<?php active('presupuesto.php'); ?>" href="views/paginaPresupuesto.php">Presupuesto</a></li>
                            <li class="menu__opcion"><a class="<?php active('blog.php'); ?>" href="views/paginaBlog.php">Blog</a></li>       
                            <li class="menu__opcion"><a class="<?php active('contacto.php'); ?>" href="views/paginaContacto.php">Contacto</a></li>
                    
                        </ul>          
                    </nav>
                <a href="#" class="header__btn btn btn--login col-3-12 col-3-12-sm">Acceso clientes</a>
            </header>
       

<?php
include("views/home.php");
include("views/info-contacto.php");
include("views/pie.php");
?>