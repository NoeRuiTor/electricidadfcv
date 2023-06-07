<main class="contenedor">

       <!------SECCION BANNER---->

            <section class="banner1 contenedor__row">
                <div class="banner1__text-background col-6-12 col-12-12-sm">
                    <div class="banner1__text">

                        <h1 class="heading heading-primary ">Tu electricista de 
                            <span class="heading-primary--color">confianza</span>
                        </h1>                                        
                        
                    </div>      
                </div>
       
           <!------SECCION INICIO---->

            </section>
            <section class="inicio contenedor__row">
                <div class="inicio__text col-4-12 col-12-12-sm">
                    <h2 class="heading heading-secondary">Instalaciones
                      <span class="heading-secondary--color">eléctricas</span>
                    </h2>
                    <p class="heading-main">Hacemos todo tipo de instalaciones y 
                        mantenimientos eléctricos. <a href="#">LLame ahora.</a></p>

                </div>
                <div class="inicio__text col-4-12 col-12-12-sm">
                    <h2 class="heading heading-secondary">Presupuesto
                      <span class="heading-secondary--color">sin compromiso</span>
                    </h2>
                    <p class="heading-main">Rellena el formulario adjunto y te 
                        enviaremos un presupuesto sin compromiso a la mayor brevedad posible.</p>
                    
                </div>
                <div class="inicio__contacto col-4-12">
                    <div class="inicio__contacto contacto">
                        <!-- Icono de correo -->
                        <a class="contacto-icon" href="mailto:<?php parametro_plantilla("email"); ?>">
                            <i class="fas fa-envelope"></i>
                        </a>                            
                       
                        <p class="contacto-text"><?php parametro_plantilla("email"); ?></p>                       
                    </div>
                    <div class="inicio__contacto contacto">
                         <!-- Icono de teléfono -->
                        <a class="contacto-icon" href="tel:<?php parametro_plantilla("movil"); ?>">
                        <i class="fas fa-phone"></i>
                        </a>                        
                        
                        <p class="contacto-text"><?php parametro_plantilla("movil"); ?></p> 
                    </div>
        
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

            </section>

               <!------SECCION FORMULARIO PRESUPUESTO---->

        <?php    include("presupuesto.php"); ?>

            <!------SECCION CARROUSEL SERVICIOS---->

          <section class="servicios contenedor__row">
                <div class="servicios__text col-12-12 col-12-12-sm">
                    <h2 class="heading heading-secondary ">
                                <p>Servicios</p>
                                <span></span>
                    </h2>
                    <p class="heading-main">Los servicios que ofrecemos son:</p>
                </div>
                <div class="servicios__carrousel  carrousel col-12-12 col-12-12-sm">
                    <div class="carrousel__grande">
                        <div class="articulo">
                            <img class="articulo-img" src="public/img/iluminacion_led.jpg" alt="Imagen 1" >
                            <h3 class="articulo-heading heading heading-terciary">Iluminación led</h3>                            
                            <p class="articulo-text">Le asesoramos en la elección de los elementos de iluminación que mejor se 
                                ajusten a su vivienda o local.</p>
                        </div>
                        <div class="articulo">
                            <img class="articulo-img" src="public/img/renovables.png" alt="Imagen 2" >
                            <h3 class="articulo-heading heading heading-terciary">Energías renovables</h3>                            
                            <p class="articulo-text">Soluciones de auto-consumo tanto para empresas como para viviendas particulares.</p>
                        </div>
                        <div class="articulo">
                            <img class="articulo-img" src="public/img/instalaciones_electricas.png" alt="Imagen 3" >
                            <h3 class="articulo-heading heading heading-terciary">Instalaciones eléctricas</h3>                            
                            <p class="articulo-text">Realizamos y mantenemos cualquier tipo de instalación eléctrica en viviendas, 
                                locales, naves industriales, etc.</p>
                        </div>
                        <div class="articulo">
                            <img class="articulo-img" src="public/img/cargador-carga-electro-car-cerca.jpg" alt="Imagen 4" >
                            <h3 class="articulo-heading heading heading-terciary">Puntos de recarga</h3>                            
                            <p class="articulo-text">Instalamos puntos de recarga tango en viviendas particulares cómo en garaje colectivos.</p>
                        </div> 
                        <div class="articulo">
                            <img class="articulo-img" src="public/img/iluminacion_led.jpg" alt="Imagen 5" >
                            <h3 class="articulo-heading heading heading-terciary">Iluminación led</h3>                            
                            <p class="articulo-text">Le asesoramos en la elección de los elementos de iluminación que mejor se 
                                ajusten a su vivienda o local.</p>
                        </div>
                        <div class="articulo">
                            <img class="articulo-img" src="public/img/renovables.png" alt="Imagen 6" >
                            <h3 class="articulo-heading heading heading-terciary">Energías renovables</h3>                            
                            <p class="articulo-text">Soluciones de auto-consumo tanto para empresas como para viviendas particulares.</p>
                        </div> 
                        

                    </div>

                    <ul class="carrousel__puntos">
                        <li class="punto activo"></li>
                        <li class="punto"></li>
                        <li class="punto"></li>
                        <li class="punto"></li>
                    </ul>
                 </div>

          </section>

           <!------SECCION INFORMACION COMO TRABAJAMOS Y RESEÑAS DE CLIENTES---->

          <section class="info">  
            <div class="info__background">         
                <div class="info__trabajo contenedor__row">
                   
                    <h2 class="info__trabajo-heading heading heading-secondary col-12-12 col-12-12-sm">
                                <p>Como trabajamos</p>
                                <span></span>
                    </h2>
                    <p class="info__trabajo-main col-12-12 col-12-12-sm">Lorem ipsum dolor sit amet, consectetur adipiscing elit. 
                        Vivamus justo dolor, luctus et ipsum sit amet, convallis tristique dolor. Curabitur id finibus turpis. 
                        Morbi faucibus mattis nibh a mattis. Morbi lacus purus, blandit ac justo nec, finibus faucibus felis. 
                        In vel est faucibus, consequat justo vitae, mattis elit. Quisque viverra est pretium arcu finibus, 
                        et rutrum ligula viverra. Nulla ultrices fermentum urna. Mauris vehicula sem eu est finibus maximus. 
                        Sed ut egestas orci, in dapibus urna. Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
   
                </div>

   <?php include("plantillas/reseñasGoogle.php");?>

                <div class="info__extra contenedor__row">
                     <div class="info__extra-slogan col-6-12 col-12-12-sm">
                        <h3 class="slogan heading-terciary">
                           <p class="content heading">Electricidad FCV</p>
                            <p class="content">Nos gusta diferenciarnos de los demás precisamente, 
                            porque cuesta muy poco hacer las cosas bien.</p>
                            <p class="content heading">666194313</h3>
                     </div>

                    <div class="info__extra-asocia col-6-12 col-12-12-sm">
                        <h3 class="heading heading-terciary">Asociado:</h3>
                        <img class="imagen" alt="apeme" src="img/logo-apeme.png">
                    </div>

                </div>
            </div>  
          </section>


</main>

  