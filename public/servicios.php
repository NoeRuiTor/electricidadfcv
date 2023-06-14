<?php
session_start();


 $titulo_pagina = "Electricidad FCV - Servicios";
  $description = "Electricista en Castalla y toda la provincia de Alicante, instalaciones eléctricas, 
  energias renovables, reformas de instalaciones, memoria técnica de diseño, presupuestos en general, tienda de iluminación led";
  $keywords = "electricidad, electricista, iluminación, energías renovables, reformas electricas, Castalla";
  $current_page = 'servicios.php';

include_once("../config/funciones.php");
include("../plantillas/cabecera.php");
?>
 


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
              <p class="feature__text-desc">Realizamos cualquier tipo de instalación eléctrica, en viviendas, 
                locales comerciales, empresas, naves, oficinas, obras, espacios públicos, reformas integrales de viviendas.
                Ofrecemos servicios personalizados para emprender proyectos, ampliaciones o modificaciones, así como realizar
                 un eficaz mantenimiento de tus instalaciones eléctricas. Realizamos proyectos para instalaciones eléctricas tanto
                  en locales como en viviendas: Cambios de tensiones, Boletines eléctricos, Tramitamos gestiones en Industria e 
                  Iberdrola, Certificados de instalación (boletines).
              </p>
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
              <p class="feature__text-desc">¡No pagues de más por tu factura de la luz! En un momento en el 
                que su precio está más caro que nunca, la energía solar supone una alternativa medioambiental y rentable.
                Produce tu propia energía y evita experimentar los cambios de precio de las energías tradicionales. 
                Aprovecha ahora las subvenciones y ayudas para particulares interesados en instalar placas solares. 
                Ahorra en la instalación, ahorra en tu factura de la luz. 
                 Una vez realizada la visita, y teniendo en cuenta el estudio inicial, se lleva a cabo la elaboración
                  del proyecto técnico definitivo, así como la preparación de toda la documentación necesaria para iniciar 
                  los trámites administrativos, de cara a obtener los permisos imprescindibles para la ejecución de la instalación. 
                  Estos trámites variarán según la administración pública correspondiente. Adicionalmente, en función de la tipología 
                 de instalación fotovoltaica, puede ser necesario gestionar permisos con la compañía distribuidora correspondiente.</p>
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
              <p class="feature__text-desc">Instalación de luminarias. Trabajo con primeras marcas. 
                Amplia variedad y diseños. Gracias a la iluminación artificial somos capaces de generar ambiente, 
                diferenciar espacios dentro de una misma habitación, potenciar los puntos fuertes de un espacio e 
                incluso pueden provocar distintas sensaciones adaptadas a cada momento de uso de la habitación. Es 
                por ello, que para eso, hay que saber elegir una buena opción, generalmente la opción que consuma 
                poco y que dure mucho. Las luces tipo led cumplen a la perfeccion estos dos requisitos, ya que la 
                duración es aproximadamente unas 30 mil horas y el gasto de toda su vida útil no suele llegar a superar
                 los 16 euros.
               </p>
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
<script defer src="js/nav-responsive.js" ></script>
</body>

</html>