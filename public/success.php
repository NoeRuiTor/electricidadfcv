<?php
session_start();
include_once("../config/funciones.php");
include("../plantillas/cabecera.php");
?>

<main class="contenedor">

<section class="success contenedor__row">
        <div class="success__box col-12-12 col-12-12-sm">
            <h2 class="success__box-heading heading heading-secondary">
                Hemos recibido sus datos correctamente, en breve recibirá respuesta. Gracias
            </h2>
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