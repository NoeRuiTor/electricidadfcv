<?php
session_start();
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
    <link rel="shortcut icon" type="image/x-icon" href="img/favicon.png">    
    <link rel="stylesheet" href="css/main.css">     
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
    

<!--------CONTENIDO------------->

 <main class="contenedor">
   <section class="banner__head banner__head--trabajos">
      <div class="banner__head-background contenedor__row">         
        <div class="banner__head-text col-6-12 col-8-12-sm">
            <h1 class="banner__head-heading heading heading-primary ">
               <p>Trabajos</p>
                <span></span>
            </h1>
        </div>
      </div>
    </section>
    <section class="trabajos">
      
          <nav class="trabajos__category categorias contenedor__row">
                   
            <ul id="category-list" class="col-12-12 col-12-12-sm">
              <li><a href="?categoria=todas">TODAS</a></li>
              <li><a href="?categoria=1">VIVIENDAS</a></li>
              <li><a href="?categoria=2">LOCALES</a></li>
              <li><a id="naves" href="?categoria=3">NAVES</a></li>
              <li><a href="?categoria=4">AUTOCONSUMO</a></li>
            </ul>       
          </nav>

          <?php
            require "../controllers/trabajos_Controller.php";
            
            // Obtener las fotos según la categoría seleccionada o todas las fotos
            if (isset($_GET['categoria']) && $_GET['categoria'] === 'todas' ) {                
                mostrarGaleria();
            
            }elseif(isset($_GET['categoria']) && $_GET['categoria'] !== 'todas' ){
                $categoria = $_GET['categoria'];
                mostrarGaleriaCategoria($categoria);
            }else{
                mostrarGaleria();
                
            }
          ?>



    </section>

<!------ICONOS FIJOS WHATSAPP Y TELEFONO----> 

  <div class="fixed-icons">
      <!-- Icono de WhatsApp -->
      <a href="https://wa.me/+34666194313" target="_blank" rel="noopener">
          <i class="fab fa-whatsapp"></i>
      </a>
      <!-- Icono de teléfono -->
      <a href="tel:+34666194313">
        <i class="fas fa-phone"></i>
      </a>
  </div>   

</main>
<?php
include("../plantillas/info-contacto.php");
include("../plantillas/pie.php");
?>