<?php
session_start();
include_once("../config/funciones.php");

if(isset($_SESSION['rol'])){
    if($_SESSION['rol'] == 'usuario'){
        header('location:usuarioDashboard.php');
        exit();
    }else{
        header('location:adminDashboard.php');
        exit();
    }
}
include("../plantillas/cabecera.php");
?>

      

        <!----------PANEL ADMINISTRACION INTRANET----->

            <section class="admin__nav contenedor__row">
                <div class="admin__nav-heading col-12-12 col-12-12-sm">
                    <h2 class="heading heading-secondary">
                        Acceso zona de usuarios
                    </h2>
                </div>
            </section>
        <!------CONTENIDO------>

        <main class="contenedor">

        <!-----------FORMULARIO LOGIN---------->
     
            <section class="admin__login ">
             <div class="contenedor__row"> 
                <div class="admin__nav-heading col-12-12 col-12-12-sm">
                    <h3 class="heading heading-terciary">
                        INICIA SESIÓN
                    </h3>
                </div>
                <form class="admin__login-form col-12-12 col-12-12-sm" action="../controllers/login_Controller.php" method="post" onsubmit="return enviaForm()">
                    <div class="form-input">
                        <label class="label-login" for="email">Usuario*</label>
                        <input class="input-login" type="email" name="email" id="user" placeholder="email" autocomplete="off">
                    </div>
                    <div class="form-input">
                        <label class="label-login" for="email">Contraseña*</label>
                        <input class="input-login" type="password" name="password" id="password" placeholder="*********" autocomplete="off">
                    </div>
                    <div id="errores"> </div>
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


                    <div class="form-boton">
                         <input type="submit" class="btn btn--enviar" name="entrar" value="ENTRAR">
                     </div>
                     
                 </form>
                 <div class="admin__remember col-12-12 col-12-12-sm">   
                    <a id="cambiar-contrasena" class="admin__remember-psw" href="#"><p>Cambiar contraseña</p></a>              
                 </div>

                 <form id="seccion-cambiar-contrasena" class="col-12-12 col-12-12-sm" action="../controllers/login_Controller.php" method="post"style="display: none; ">
                    <div class="form-input">
                        <label class="label-login" for="email">Usuario*</label>
                        <input class="input-login" type="email" name="email" id="user" placeholder="email">
                    </div>
                    <div class="form-input">
                        <label class="label-login" for="old-password">Contraseña antigua*</label>
                        <input class="input-login" type="password" name="old-password" id="old-password" placeholder="Contraseña antigua">
                    </div>
                    <div class="form-input">
                        <label class="label-login" for="new-password">Nueva contraseña*</label>
                        <input class="input-login" type="password" name="new-password" id="new-password" placeholder="Nueva contraseña">
                    </div>
                    <div class="form-boton">
                         <input type="submit" class="btn btn--enviar" name="cambiar" value="Enviar">
                     </div>

                </form>
                <!---------------SCRIPT FORMULARIO CAMBIO DE CONTRASEÑA---------------->

                <script>
                    // Obtener el enlace "Cambiar contraseña" por su id
                    const enlaceCambiarContrasena = document.getElementById('cambiar-contrasena');

                    // Obtener la sección para cambiar la contraseña por su id
                    const seccionCambiarContrasena = document.getElementById('seccion-cambiar-contrasena');

                    // Agregar un manejador de eventos al enlace "Cambiar contraseña"
                    enlaceCambiarContrasena.addEventListener('click', function(e) {
                        e.preventDefault(); // Prevenir el comportamiento predeterminado del enlace
                        
                        // Mostrar u ocultar la sección para cambiar la contraseña según su estado actual
                        if (seccionCambiarContrasena.style.display === 'none') {
                            seccionCambiarContrasena.style.display = 'block';
                        } else {
                            seccionCambiarContrasena.style.display = 'none';
                        }
                    });

                </script>    
              </div>
            </section>
     


            </main>
<?php

include("../plantillas/info-contacto.php");
include("../plantillas/pie.php");
?> 
<script defer src="js/nav-responsive.js" ></script>   
<script defer src="js/login.js" ></script>           
</body>

</html>