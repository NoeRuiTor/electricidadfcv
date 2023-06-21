

<div class="presupuesto__modifica formEdit contenedor__row">
   <div class="presupuesto__modifica-heading col-12-12 col-12-12-sm">
        <h3 class="heading heading-terciary ">
            Editar usuario
        </h3>
   </div>
   <div class="presupuesto__modifica-form  col-12-12 col-12-12-sm">
    <form  action="usuario_Controller.php" method="post">
       
            <div class="presupuesto__modifica-input">
                <div>
                    <input type="hidden" name="id" value="<?php echo $usuario['id'];?>">
                    <label for="id usuario">Id Usuario</label>
                    <input type="text" name="id" id="id" readonly value="<?php echo $usuario['id'];?>">
                </div>
            </div>
            <div class="presupuesto__modifica-input"> 
                <div>
                    <label for="nombre">Nombre</label>
                    <input type="text" name="nombre" id="nombre" value= "<?php echo $usuario['nombre'];?>">                
                </div>
                <div> 
                    <label for="ciudad">Ciudad</label>                    
                    <input type="text" name="ciudad" id="ciudad" value= "<?php echo $usuario['ciudad'];?>">
                </div>
            </div>
            <div class="presupuesto__modifica-input">
                 <div>
                    <label for="email">Email</label>
                    <input type="email" name="email" id="email"  readonly value="<?php echo $usuario['email'];?>">
                    
                </div>
                <div> 
                    <label for="telefono">Teléfono</label>
                    <input type="tel" name="telefono" id="telefono" value="<?php echo $usuario['telefono'];?>">
                </div>
            </div>
            <div class="presupuesto__modifica-input">    
                <div>    
                    <label for="cpostal">Código Postal</label>
                    <input type="text" name="cpostal" id="cpostal"  value="<?php echo $usuario['cpostal'];?>">
                </div>
                <div>    
                    <label for="estado">Estado( activo, inactivo )</label>
                    <input type="text" name="estado" id="estado"  value="<?php echo $usuario['estado_cliente'];?>">
                </div>                

            </div>           
            <div class="presupuesto__formulario-boton">
                <input type="submit" class="btn btn--enviar" id="btmodificar" name="modifica" value="Enviar">            
           <div>     
     </form>
   </div>
</div>