<?php

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

              <img class="feature__img" src="../public/img/obra nueva.jpg" alt="foto cuadro1">             

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
              <a href="paginaPresupuesto.php" class="feature__text-btn btn btn--presupuesto">Pida su presupuesto</a>  

          </div>

      </div>

      <div class="feature feature--reverse contenedor__row">

          <figure class="col-5-12 col-12-12-sm"> 

              <img class="feature__img" src="../public/img/FOTOVOLTAICA.jpg" alt="foto placa-solar1">            

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
              <a href="paginaPresupuesto.php" class="featue_text-btn btn btn--presupuesto">Pida su presupuesto</a>  

          </div>

      </div>
    
      
      <div class="feature contenedor__row">

          <figure class="col-5-12 col-12-12-sm"> 

              <img class="feature__img" src="../public/img/LAMPARA LED.jpg" alt="foto lamparaLed">          

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
              <a href="paginaPresupuesto.php" class="feature__text-btn btn btn--presupuesto">Pida su presupuesto</a>  

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