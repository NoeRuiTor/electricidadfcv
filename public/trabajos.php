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