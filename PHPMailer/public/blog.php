<?php
session_start();



$titulo_pagina = "Electricidad FCV - Blog";
$description = "Electricista en Castalla y toda la provincia de Alicante, instalaciones eléctricas, 
energias renovables, reformas de instalaciones, memoria técnica de diseño, presupuestos en general, tienda de iluminación led";
$keywords = "electricidad, electricista, iluminación, energías renovables, reformas electricas, Castalla";
$current_page = 'blog.php';

include_once("../config/funciones.php");

include("../plantillas/cabecera.php");

?>    
<main class="contenedor">
    <section class="banner__head banner__head--blog">
      <div class="banner__head-background contenedor__row">         
        <div class="banner__head-text col-6-12 col-8-12-sm">
            <h1 class="banner__head-heading heading heading-primary ">
               <p>Blog</p>
                <span></span>
            </h1>
        </div>
      </div>
    </section>

    <section class="blog contenedor__row">

   

        <?php
            require "../controllers/blog_Controller.php";
           if(isset($_GET['id'])){
            $id = $_GET['id'];
            mostrarPostContenido($id);
           }elseif(isset($_GET['etiqueta'])){
            $etiqueta = $_GET['etiqueta'];
            mostrarPostsFiltrados($etiqueta);         
           }else{
            mostrarPosts();
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
<script defer src="js/nav-responsive.js" ></script>
</body>

</html>