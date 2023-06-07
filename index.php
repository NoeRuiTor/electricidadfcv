<?php
session_start();
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
    <link rel="shortcut icon" type="image/x-icon" href="public/img/favicon.png">         
    <link rel="stylesheet" href="public/css/main.css">
    <script defer src="public/js/carrousel.js" ></script> 
    <script defer src="public/js/formpresupuesto.js" ></script> 
    <script defer src="public/js/mensajes.js" ></script>   
    <script src="public/js/cookies.js" ></script>      
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
	<title><?php parametro_plantilla("titulo_pagina"); ?></title>
    
</head>
<body>
       <!-------CABECERA CON NAVEGADOR--------->

            <header class="header contenedor__row">
                <div class="header__logo col-3-12 col-12-12-sm">
                    <img class="logo" src="public/img/logo.png" alt="electricidadFCV" width="150" height="150" >
                </div>
                <div class="menu-icon">
                        <i class="fas fa-bars"></i>
                </div> 
                <div class="menu-login">
                 <a href="public/login.php"><i class="fas fa-sign-in-alt"></i></a>

                </div> 
                <nav class="col-6-12 header__nav nav" id="bars">
                               
                     <ul class="menu" id="menu-items">
                            <li class="menu__opcion"><a class="<?php active('index.php'); ?>" href="index.php">Inicio</a></li>
                            <li class="menu__opcion"><a class="<?php active('servicios.php'); ?>" href="public/servicios.php">Servicios</a></li>                
                            <li class="menu__opcion"><a class="<?php active('trabajos.php'); ?>" href="public/trabajos.php">Trabajos</a></li> 
                            <li class="menu__opcion"><a class="<?php active('presupuesto.php'); ?>" href="public/presupuestos.php">Presupuesto</a></li>
                            <li class="menu__opcion"><a class="<?php active('blog.php'); ?>" href="public/blog.php">Blog</a></li>       
                            <li class="menu__opcion"><a class="<?php active('contacto.php'); ?>" href="public/contacto.php">Contacto</a></li>
                    
                      </ul>          
                </nav>
                <a href="public/login.php" class="header__btn btn btn--login col-3-12 col-3-12-sm">
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
    

<!------AVISO COOKIES----->

  
<div id="cookie-banner" class="cookie-banner">
     <p>Utilizamos cookies en nuestro sitio web para ofrecerte la mejor experiencia. Al continuar navegando, aceptas nuestro uso de cookies.
         <a href="#" id="cookie-accept">Aceptar</a> | <a href="#" id="cookie-reject">Rechazar</a></p>
 </div>
 <script>
  document.getElementById("cookie-accept").addEventListener("click", function(e) {
  e.preventDefault();
  acceptCookies();
  });

  document.getElementById("cookie-reject").addEventListener("click", function(e) {
  e.preventDefault();
  rejectCookies();
  });

  window.addEventListener("load", checkCookieAccepted);
 </script> 

<?php 
include("plantillas/home.php");
include("plantillas/info-contacto.php");

?>
<!---------FOOTER--------->


<footer class="footer contenedor__row">
            

            <div class="footer__logo col-4-12 col-12-12-sm">

                <img class="logo" src="public/img/logo.png" alt="logo Electricidad FCV" >
                <p class="footer-text">Profesional dedicado y especializado en el mundo de la electricidad con gran experiencia avalada por nuestros clientes.</p>
                <div class="redes_sociales">
                 <a class="footer-icon" href="https://www.facebook.com/electricidadFCV" target="_blank"><i class="fab fa-facebook"></i></a>
                 <a class="footer-icon" href="https://www.instagram.com/electricidadfcv/" target="_blank"><i class="fab fa-instagram"></i></a>
                 <a class="footer-icon" href="https://www.google.com/search?q=electricidad+fcv&oq=electricidad+fcv&aqs=chrome..69i57j69i64j69i60l3.15948j0j4&sourceid=chrome&ie=UTF-8" target="_blank">
                    <i class="fab fa-google"></i>
                </a>     
                </div>   

            </div>
            
            <div class="footer__main col-2-12 col-6-12-sm">

                 <h4 class="heading heading-quaternary">
                    <p>MENÚ</p>
                    <span></span>
                </h4>         
                 <ul class="footer-list">
                     <li><a href="index.php">Inicio</a></li>
                     <li><a href="public/servicios.php">Servicios</a></li>
                     <li><a href="public/trabajos.php">Trabajos</a></li>
                     <li><a href="public/presupuestos.php">Presupuesto</a></li>
                     <li><a href="public/blog.php">Blog</a></li>
                     <li><a href="public/contacto.php">Contacto</a></li>
                 </ul> 

            </div>   

            <div class="footer__main col-2-12 col-6-12-sm"> 

                 <h4 class="heading heading-quaternary">
                    <p>PÁGINAS LEGALES</p>
                    <span></span>
                </h4>           
                 <ul class="footer-list">
                     <li><a href="#">Aviso Legal</a></li>
                     <li><a href="#">Pólitica de Cookies</a></li>
                     <li><a href="#">Pólitica de privacidad</a></li>
                 </ul>
            </div>

            <div class="footer__main col-4-12 col-12-12-sm">  
                 <h4 class="heading heading-quaternary">
                    <p>DONDE ESTAMOS</p>
                    <span></span>
                </h4>                     
                 <iframe  src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d6419.76334463789!2d-0.6765269830433929!3d38.591299282444645!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xad73dc4a1b00ba1d%3A0xfc789b4b44a4bb48!2sElectricidad%20FCV!5e0!3m2!1ses!2ses!4v1675718077867!5m2!1ses!2ses" 
                 width="300" height="200" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                         
            </div>
        

            <div class="footer__footer col-12-12 col-12-12-sm"> 
                   
                <small class="footer-small">&copy; 2023. Electricidad FCV. Diseño por <span>Noelia Ruiz Torrijos</span></small>                    
                
            </div>

    </footer>   

 </body>

</html>