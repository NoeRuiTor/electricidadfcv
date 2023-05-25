<?php

include_once("../config/funciones.php");


include("../plantillas/cabecera.php");
?>

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