<?php
session_start();
include_once("../config/funciones.php");
include("../plantillas/cabecera.php");

if(isset($_REQUEST['contrasena'])){
    $pwd = $_REQUEST['contrasena'];
}
?>

<main class="contenedor">

<section class="success contenedor__row">
        <div class="success__box col-12-12 col-12-12-sm">
            <h3 class="success__box-heading heading heading-terciary">
                Hemos recibido sus datos correctamente, en breve recibirá respuesta. Gracias
            </h3>
            <p class="success__box-content">Hemos recibido su solicitud, puede acceder a su zona de cliente en <span>Acceso usuarios</span>
             con su email y la contraseña <?php echo $pwd; ?> y cambiarla por seguridad.</p>
        </div>
</section>
<div id="volver" class="col-12-12 col-12-12-sm">
 <a  href="index.php">Volver</a> 
</div>




</main>

<?php
include("../plantillas/info-contacto.php");
include("../plantillas/pie.php");
?>
<script defer src="js/nav-responsive.js" ></script>
</body>

</html>