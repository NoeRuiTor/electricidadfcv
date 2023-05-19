<section class="presupuesto contenedor__row">
        
      <div class="presupuesto__heading col-12-12 col-12-12-sm">
        <h2 class="heading heading-secondary">
            Solicite su presupuesto
            <span></span>
        </h2>
        <p class="heading-secondary--main">Rellene el formulario y haga un breve resumen de lo que necesita,  indicar puntos de luz si es el caso 
            (reforma o instalación de electricidad). Puede adjuntar fotos y documentación para una mejor descripción.</p>
      </div>
      <form class="presupuesto__formulario col-12-12 col-12-12-sm" action="#" method="post">
           <div class="presupuesto__formulario-input">
                <input type="text" name="nombre" value="nombre">
           </div>
           <div class="presupuesto__formulario-input">
                <input type="email" name="email" value="email">
           </div>
           <div class="presupuesto__formulario-input">
                <input type="tel" name="telefono" value="teléfono">
           </div>
           <div class="presupuesto__formulario-input">
                <input class="ciudad" type="text" name="ciudad" value="ciudad">
                <input class="ciudad" type="text" name="cpostal" value="código postal">
           </div>
           <div class="presupuesto__formulario-radio">
                <label for="tipo_trabajo">Seleccione tipo de trabajo:</label>
            </div>  
            <div class="presupuesto__formulario-radio"> 
                <input type="radio" name="trabajo" value="instalacion_electrica_nueva">Instalación eléctrica de obra nueva
            </div>
            <div class="presupuesto__formulario-radio">
                <input type="radio" name="trabajo" value="reforma_instalacion">Reforma de instalación eléctrica
            </div>
            <div class="presupuesto__formulario-radio">
                <input type="radio" name="trabajo" value="iluminacion_led">Instalar iluminación LED
            </div>
            <div class="presupuesto__formulario-radio">
                <input type="radio" name="trabajo" value="paneles_solares">Instalar paneles solares
            </div>
            <div class="presupuesto__formulario-radio">
                <input type="radio" name="trabajo" value="punto_recarga">Installar punto de recarga
            </div>
            <div class="presupuesto__formulario-radio">
                <input type="radio" name="trabajo" value="otros">Otros trabajos de electricidad
            
           </div>
           <div class="presupuesto__formulario-descripcion">
                 <textarea id="descripcion" name="descripcion" cols="40" rows="10">Descripción del trabajo</textarea>
           </div>
           <div class="presupuesto__formulario-input">
                <input id="file" type="file" name="adjunto">
           </div>
           <div class="presupuesto__formulario-privacidad">
                <input type="checkbox" name="privacidad" value="privacidad"> He leído y acepto la <a href="#">POLÍTICA DE PRIVACIDAD</a>
           </div>
           <div class="presupuesto__formulario-boton">
               <input type="submit" class="btn btn--enviar" name="enviar" value="Enviar">
           </div>
      </form>


</section>