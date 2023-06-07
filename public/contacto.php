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
    <script defer src="js/formcontacto.js" ></script> 
    <script defer src="js/alertInfo.js" ></script>        
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
    

<main class="contenedor">

       <!------SECCION BANNER---->

    <section class="banner__head banner__head--contacto">
            <div class="banner__head-background contenedor__row">         
                <div class="banner__head-text col-6-12 col-8-12-sm">
                    <h1 class="banner__head-heading heading heading-primary ">
                    <p>Contacto</p>
                        <span></span>
                    </h1>
                </div>
            </div>
    </section>

           <!------MAPA LOCALIZACIÓN---->

    <section class="contactar contenedor__row">
            <div class="contactar__mapa col-7-12 col-12-12-sm">
                    <iframe class="mapa" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d6419.76334463789!2d-0.6765269830433929!3d38.591299282444645!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xad73dc4a1b00ba1d%3A0xfc789b4b44a4bb48!2sElectricidad%20FCV!5e0!3m2!1ses!2ses!4v1675718077867!5m2!1ses!2ses" 
                         style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div> 
          
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

              <!------FORMULARIO DE CONTACTO ---->
              <div class="contactar__form col-5-12 col-12-12-sm">
                    <h3 class="contactar__form-heading heading heading-terciary">
                        <p>Formulario de <span id="color">contacto</span> </p>
                        <span></span>
                    </h3>
                    <form class="contactar__form-form form-contacto" action="../controllers/contacto_Controller.php" method="post" onsubmit="return validaDatosContacto()">
                        <div class="form-input">
                                <input type="text" name="nombre" id="nom" placeholder="nombre" >
                        </div>
                        <div class="form-input">
                                <input type="email" name="email" id="emeal" placeholder="email">
                        </div>
                        <div class="form-input">
                                <input type="tel" name="telefono" id="tel" placeholder="teléfono">
                        </div>
                        <div class="form-descripcion">
                            <textarea id="descripcion" name="descripcion" cols="40" rows="10"placeholder="Consulta..."></textarea>
                        </div>
                        <div class="form-privacidad">
                        <input type="checkbox" name="privacidad"  value="privacidad" id="ppriva"> He leído y acepto la <a href="#">POLÍTICA DE PRIVACIDAD</a>
                        </div>
                        <?php if (isset($_REQUEST['error'])) : ?>
                        <div id="errores">
                            <?php echo $_REQUEST['error']; ?>
                        </div>
                         <?php endif;?>
                        
                        <div class="form-boton">
                            <input type="submit" class="btn btn--contactar" name="enviar" value="Enviar">
                        </div>
                    </form>
                

                </div>
    </section>      

</main>

<?php
include("../plantillas/alertInfo.php");
include("../plantillas/info-contacto.php");
include("../plantillas/pie.php");
?>