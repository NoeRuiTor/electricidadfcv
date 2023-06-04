

<div class="presupuesto__modifica formEdit contenedor__row">

    <h3 class="presupuesto__modifica-heading heading heading-terciary col-12-12 col-12-12-sm">
        Editar presupuesto
    </h3>


    <form class="presupuesto__modifica-form  col-12-12 col-12-12-sm" action="../controllers/presupuesto_Controller.php" method="post" enctype="multipart/form-data">
            <div class="presupuesto__modifica-input">
                <div>
                    <input type="hidden" name="id" value="<?php echo $presupuesto['id'];?>">
                    <label for="id presupuesto">Id Presupuesto</label>
                    <input type="text" name="id" id="id" disabled value="<?php echo $presupuesto['id'];?>">
                </div> 
                <div>
                    <label for="nombre cliente">Nombre Cliente</label>
                    <input type="text" name="nombre_cliente" id="nombre_cliente" disabled value= "<?php echo $presupuesto['nombre_cliente'];?>">                
                </div>
                <div> 
                    <label for="numero presupuesto">Número Presupuesto</label>
                    
                    <input type="text" name="num_presupuesto" id="num_presupuesto" placeholder="num_presupuesto">
                </div>
            </div>
            <div class="presupuesto__modifica-input">
                 <div>
                    <label for="fecha solicitud">Fecha Solicitud</label>
                    <input type="text" name="fecha_solicitud" id="fecha_solicitud" disabled value="<?php echo $presupuesto['fecha_solicitud'];?>">
                </div>
                <div> 
                    <label for="fecha emisión">Fecha Emisión</label>
                    <input type="text" name="fechaEmision" id="fechaEmision" placeholder="fecha emision" value=<?php echo date('Y-m-d');?>>
                </div>
                <div>    
                    <label for="fecha vencimiento">Fecha Vencimiento</label>
                    <input type="date" name="fechaVencimiento" id="fechaVencimiento" placeholder="fecha vencimiento">
                </div>
            </div>
            <div class="presupuesto__modifica-input">
                 <div>
                    <label for="importe">Importe presupuesto</label>
                    <input type="text" name="importe" id="importe" placeholder="importe">
                </div> 
                <div> 
                    <label for="documento">Presupuesto PDF</label>
                    <input id="file" type="file" id="file" accept=".pdf" name="adjunto">         
                </div>
            </div>
            <div class="presupuesto__formulario-boton">
                <input type="submit" class="btn btn--enviar" id="btmodificar" name="modifica" value="Enviar">
            </div>
    </form>
</div>