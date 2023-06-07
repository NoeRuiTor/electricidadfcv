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
    


 <main class="contenedor">

  <!----------BANNER HEAD---------->

   <section class="banner__head banner__head--servicios">
      <div class="banner__head-background contenedor__row">         
        <div class="banner__head-text col-6-12 col-8-12-sm">
            <h1 class="banner__head-heading heading heading-primary ">
               <p>Servicios</p>
                <span></span>
            </h1>
        </div>
      </div>

 
    </section>

     <!----------SECCIÓN DESCRIPCIÓN SERVICIOS----->

    <section class="features">

      <div class="feature contenedor__row">

          <figure class="col-5-12 col-12-12-sm"> 

              <img class="feature__img" src="img/obra nueva.jpg" alt="foto cuadro1">             

          </figure>
          <div class="feature__text col-7-12 col-12-12-sm">

              <h2 class="feature__text-heading heading heading-secondary">
                Instalaciones <span>eléctricas</span>
              </h2>
              <p class="feature__text-desc">Vestibulum non magna efficitur, bibendum leo eget, 
                ullamcorper arcu. Suspendisse in malesuada sapien. Curabitur id massa id 
                tortor vehicula commodo id nec metus. Ut vel nulla consequat, sollicitudin nibh ac, 
                convallis sem. Duis vel imperdiet sem. Etiam venenatis, mi eget vehicula rutrum, ante 
                nisi auctor metus, ut cursus massa lacus ut mauris. Sed justo nunc, consequat ut auctor at, 
                fermentum quis ipsum. Integer id quam vestibulum, tincidunt est vel, ornare neque. In hac 
                habitasse platea dictumst. Maecenas vitae urna est. Aenean nec convallis dui, in vulputate nibh. 
                Cras ullamcorper fermentum metus.</p>
              <a href="presupuestos.php" class="feature__text-btn btn btn--presupuesto">Pida su presupuesto</a>  

          </div>

      </div>

      <div class="feature feature--reverse contenedor__row">

          <figure class="col-5-12 col-12-12-sm"> 

              <img class="feature__img" src="img/FOTOVOLTAICA.jpg" alt="foto placa-solar1">            

          </figure>
          <div class="feature__text col-7-12 col-12-12-sm">

              <h2 class="feature__text-heading heading heading-secondary">
                Instalaciones <span>fotovoltáicas</span>
              </h2>
              <p class="feature__text-desc">Vestibulum non magna efficitur, bibendum leo eget, 
                ullamcorper arcu. Suspendisse in malesuada sapien. Curabitur id massa id 
                tortor vehicula commodo id nec metus. Ut vel nulla consequat, sollicitudin nibh ac, 
                convallis sem. Duis vel imperdiet sem. Etiam venenatis, mi eget vehicula rutrum, ante 
                nisi auctor metus, ut cursus massa lacus ut mauris. Sed justo nunc, consequat ut auctor at, 
                fermentum quis ipsum. Integer id quam vestibulum, tincidunt est vel, ornare neque. In hac 
                habitasse platea dictumst. Maecenas vitae urna est. Aenean nec convallis dui, in vulputate nibh. 
                Cras ullamcorper fermentum metus.</p>
              <a href="presupuestos.php" class="featue_text-btn btn btn--presupuesto">Pida su presupuesto</a>  

          </div>

      </div>
    
      
      <div class="feature contenedor__row">

          <figure class="col-5-12 col-12-12-sm"> 

              <img class="feature__img" src="img/LAMPARA LED.jpg" alt="foto lamparaLed">          

          </figure>
          <div class="feature__text col-7-12 col-12-12-sm">

              <h2 class="feature__text-heading heading heading-secondary">
                Iluminación <span>Led</span>
              </h2>
              <p class="feature__text-desc">Vestibulum non magna efficitur, bibendum leo eget, 
                ullamcorper arcu. Suspendisse in malesuada sapien. Curabitur id massa id 
                tortor vehicula commodo id nec metus. Ut vel nulla consequat, sollicitudin nibh ac, 
                convallis sem. Duis vel imperdiet sem. Etiam venenatis, mi eget vehicula rutrum, ante 
                nisi auctor metus, ut cursus massa lacus ut mauris. Sed justo nunc, consequat ut auctor at, 
                fermentum quis ipsum. Integer id quam vestibulum, tincidunt est vel, ornare neque. In hac 
                habitasse platea dictumst. Maecenas vitae urna est. Aenean nec convallis dui, in vulputate nibh. 
                Cras ullamcorper fermentum metus.</p>
              <a href="presupuestos.php" class="feature__text-btn btn btn--presupuesto">Pida su presupuesto</a>  

          </div>

      </div>
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