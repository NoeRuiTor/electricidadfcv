<!--------FORMULARIO PARA PEDIR PRESUPUESTOS-------------->


<section class="presupuesto contenedor__row">
        
      <div class="presupuesto__heading col-12-12 col-12-12-sm">
        <h2 class="heading heading-secondary">
            Solicite su presupuesto
            <span></span>
        </h2>
        <p class="heading-secondary--main">Rellene el formulario y haga un breve resumen de lo que necesita,  indicar puntos de luz si es el caso 
            (reforma o instalación de electricidad). Puede adjuntar fotos y documentación para una mejor descripción.</p>
      </div>     

      <form class="presupuesto__formulario col-12-12 col-12-12-sm" action="presupuesto_Controller.php" method="post" enctype="multipart/form-data" onsubmit="return enviaForm()">
           <!-- Campo honeypot oculto -->
          <div style="display:none;">
            <label for="pais">Teléfono:</label>
            <input type="text" name="pais" id="pais">
          </div>           
           <div class="presupuesto__formulario-input">
                <input type="text" name="nombre" id="nombre" placeholder="nombre">
           </div>
           <div class="presupuesto__formulario-input">
                <input type="email" name="email" id="correo" placeholder="email">
           </div>
           <div class="presupuesto__formulario-input">
                <input type="tel" name="telefono" id="telefono" placeholder="teléfono" maxlength="9">
           </div>
           <div class="presupuesto__formulario-input">
                <input class="ciudad" type="text" name="ciudad" id="ciudad" placeholder="ciudad">
                <input class="ciudad" type="text" name="cpostal" id="cp" placeholder="código postal" maxlength="5">
           </div>
           <div class="presupuesto__formulario-radio">
                <label for="tipo_trabajo">Seleccione tipo de trabajo:</label>
            </div>  
            <div class="presupuesto__formulario-radio"> 
                <input type="radio" name="trabajo" value="instalacion electrica nueva">  Instalación eléctrica de obra nueva
            </div>
            <div class="presupuesto__formulario-radio">
                <input type="radio" name="trabajo" value="reforma instalacion">  Reforma de instalación eléctrica
            </div>
            <div class="presupuesto__formulario-radio">
                <input type="radio" name="trabajo" value="iluminacion led">  Instalar iluminación LED
            </div>
            <div class="presupuesto__formulario-radio">
                <input type="radio" name="trabajo" value="paneles solares">  Instalar paneles solares
            </div>
            <div class="presupuesto__formulario-radio">
                <input type="radio" name="trabajo" value="punto recarga">  Instalar punto de recarga
            </div>
            <div class="presupuesto__formulario-radio">
                <input type="radio" name="trabajo" value="otros">  Otros trabajos de electricidad
            
           </div>
           <div class="presupuesto__formulario-descripcion">
                 <textarea id="descripcion" name="descripcion" cols="40" rows="10" placeholder="Descripción del trabajo"></textarea>
           </div>
           <div class="presupuesto__formulario-input">
                <input id="file" type="file" accept=".jpg, .jpeg, .png, .gif .pdf" name="adjunto">
           </div>
           <div class="presupuesto__formulario-privacidad">
                <input type="checkbox" name="privacidad" id="ppriva" value="privacidad"> He leído y acepto la <a href="#">POLÍTICA DE PRIVACIDAD</a>
           </div>

           <div id="errores"></div>
            <div id="mensaje"></div>	
		  
		   <?php if (isset($_REQUEST['error'])) : ?>
                 <div id="errores">
                    <?php echo $_REQUEST['error']; ?>
                </div>
          <?php endif;?>
          <?php if (isset($_REQUEST['mensaje'])) : ?>
              <div id="mensaje">
              <?php echo $_REQUEST['mensaje']; ?>
              </div>
          <?php endif;?>
           
           <div class="presupuesto__formulario-boton">
               <input type="submit" class="btn btn--enviar" id="btenviar" name="enviar" value="Enviar">
           </div>
      </form>
     
</section>
