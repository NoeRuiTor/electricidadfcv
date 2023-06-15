
<div class="presupuesto__modifica formEdit contenedor__row">
    <div class="presupuesto__modifica-heading col-12-12 col-12-12-sm">
        <h3 class="heading heading-terciary">
            Gestionar presupuesto
        </h3>
    </div>

    <div class="presupuesto__modifica-form  col-12-12 col-12-12-sm">
       <form  action="../controllers/presupuesto_Controller.php" method="post" enctype="multipart/form-data">
            <div class="presupuesto__modifica-input">
                <div>
                    <input type="hidden" name="id" value="<?php echo $presupuesto['id'];?>">
                    <label for="id presupuesto">Id Presupuesto</label>
                    <input type="text" name="id" id="id" disabled value="<?php echo $presupuesto['id'];?>">
                </div> 
            </div>
            <div class="presupuesto__modifica-input">
                <div>
                    <label for="nombre cliente">Nombre Cliente</label>
                    <input type="text" name="nombre_cliente" id="nombre_cliente" disabled value= "<?php echo $presupuesto['nombre_cliente'];?>">                
                </div>
                <div> 
                    <label for="numero presupuesto">Número Presupuesto</label>
                    
                    <input type="text" name="num_presupuesto" id="num_presupuesto" disabled value="<?php echo $presupuesto['num_presupuesto'];?>">
                </div>
            </div>
            <div class="presupuesto__modifica-input">
                 <div>
                    <label for="fecha solicitud">Fecha Solicitud</label>
                    <input type="text" name="fecha_solicitud" id="fecha_solicitud" disabled value="<?php echo $presupuesto['fecha_solicitud'];?>">
                </div>
                <div> 
                    <label for="fecha emisión">Fecha Emisión</label>
                    <input type="text" name="fechaEmision" id="fechaEmision" value="<?php echo $presupuesto['fechaEmision'];?>" disabled>
                </div>
            </div>
            <div class="presupuesto__modifica-input">
                <div>    
                    <label for="fecha vencimiento">Fecha Vencimiento</label>
                    <input type="date" name="fechaVencimiento" id="fechaVencimiento" disabled value="<?php echo $presupuesto['fechaVencimiento'];?>">
                </div>           
            
                 <div>
                    <label for="importe">Importe presupuesto</label>
                    <input type="text" name="importe" id="importe" value="<?php echo $presupuesto['importe'];?>" disabled>
                </div> 
            </div>
            <div class="presupuesto__modifica-input">
                <div> 
                   <p class="condiciones">La aceptación del presupuesto significa la conformidad con el contenido, 
                    así como la aceptación de las condiciones e importe del mismo.</p>     
                </div>
            </div>
            <div class="presupuesto__formulario-boton">
                <input type="submit" class="btn btn--enviar" id="btaceptar" name="aceptar" value="Aceptar Presuspuesto">
                <input type="submit" class="btn btn--enviar" id="btrechazar" name="rechazar" value="Rechazar Presupuesto">
            </div>
      </form>
    </div>
</div>