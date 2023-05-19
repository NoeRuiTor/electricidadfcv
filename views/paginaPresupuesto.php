<?php

include_once("../config/funciones.php");


include("cabecera.php");
?>


 <main class="main contenedor">
   <section class="banner-head banner-head--presupuesto">
      <div class="banner-head__background contenedor__row">         
        <div class="text col-6-12 col-8-12-sm">
            <h1 class="heading heading-primary ">
               <p>Presupuesto</p>
                <span></span>
            </h1>
        </div>
      </div>
    </section>

<?php
include("presupuesto.php");
?>
 </main>
<?php
include("info-contacto.php");
include("pie.php");
?>