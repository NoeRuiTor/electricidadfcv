<section class="info-contacto">
    <div class="contenedor__row">                
        <div class="contacto col-4-12 col-12-12-sm">
             <a class="contacto-icon" href="mailto:<?php parametro_plantilla("email"); ?>">
                    <i class="fas fa-envelope"></i>
             </a>                            
                       
            <p class="contacto-text"><?php parametro_plantilla("email"); ?></p> 
        </div>
        <div class="contacto col-4-12 col-12-12-sm">
             <a class="contacto-icon" href="tel:<?php parametro_plantilla("movil"); ?>">
                   <i class="fas fa-phone"></i>
             </a>                        
                        
             <p class="contacto-text"><?php parametro_plantilla("movil"); ?></p> 
        </div>
        <div class="contacto col-4-12 col-12-12-sm">
                <a class="contacto-icon" href="https://www.google.com/maps/search/?api=1&query=<?php parametro_plantilla('direccion'); ?>" target="_blank">
                    <i class="fas fa-map-marker-alt"></i>
                </a>
              <p class="contacto-text"><?php parametro_plantilla("direccion"); ?></p>
        </div>            
    </div>
</section>