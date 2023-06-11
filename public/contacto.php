<?php
session_start();



$titulo_pagina = "Electricidad FCV - Contacto";
$description = "Electricista en Castalla y toda la provincia de Alicante, instalaciones eléctricas, 
energias renovables, reformas de instalaciones, memoria técnica de diseño, presupuestos en general, tienda de iluminación led";
$keywords = "electricidad, electricista, iluminación, energías renovables, reformas electricas, Castalla";
$current_page = 'contacto.php';

include_once("../config/funciones.php");

include("../plantillas/cabecera.php");
?>

  

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
<script defer src="js/nav-responsive.js" ></script>
<script defer src="js/formcontacto.js" ></script> 
<script defer src="js/alertInfo.js" ></script>
</body>

</html>