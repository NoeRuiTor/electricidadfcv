<?php
session_start();
include_once("../config/funciones.php");
include("../plantillas/cabecera.php");
?>

<main class="contenedor">

<section class="success contenedor__row">
        <div class="success__box col-12-12 col-12-12-sm">
            <h3 class="success__box-heading heading heading-terciary">
                Hemos recibido sus datos correctamente, en breve recibirá respuesta. Gracias
            </h3>
            <p class="success__box-content">Si es la primera vez que solicita presupuesto, puede acceder a su zona de cliente en <span>Acceso usuarios</span>
             y crear una nueva contraseña.</p>
           
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