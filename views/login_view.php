<?php

include_once("../config/funciones.php");
include("../plantillas/cabecera.php")

?>

       <!------CONTENIDO------>

            <main class="contenedor">

        <!----------PANEL ADMINISTRACION INTRANET----->

            <section class="admin__nav contenedor__row">
                <div class="admin__nav-heading col-12-12 col-12-12-sm">
                    <h2 class="heading heading-secondary">
                        Acceso zona de clientes
                    </h2>
                </div>
            </section>

        <!-----------FORMULARIO LOGIN---------->

            <section class="admin__login contenedor__row">
                <div class="admin__nav-heading col-12-12 col-12-12-sm">
                    <h3 class="heading heading-terciary">
                        INICIA SESIÓN
                    </h3>
                </div>
                <form class="admin__login-form col-12-12 col-12-12-sm" action="#" method="post">
                    <div class="form-input">
                        <label class="label-login" for="email">Usuario*</label>
                        <input class="input-login" type="email" name="email" value="email">
                    </div>
                    <div class="form-input">
                        <label class="label-login" for="email">Contraseña*</label>
                        <input class="input-login" type="password" name="password" value="contraseña">
                    </div>
                    <div class="form-boton">
                         <input type="submit" class="btn btn--enviar" name="entrar" value="ENTRAR">
                     </div>
                     
                 </form>
                 <div class="admin__remember col-12-12 col-12-12-sm">   
                    <a class="admin__remember-psw" href="#"><p>¿Has olvidado tú contraseña?</p></a>              
                 </div>
            </section>


            </main>
<?php
include("../plantillas/info-contacto.php");
include("../plantillas/pie.php");
?>           