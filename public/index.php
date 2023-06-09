<?php
session_start();
include_once("../config/funciones.php");
include("../plantillas/cabecera.php");

?>
<!------AVISO COOKIES----->

  
<div id="cookie-banner" class="cookie-banner">
     <p>Utilizamos cookies en nuestro sitio web para ofrecerte la mejor experiencia. Al continuar navegando, aceptas nuestro uso de cookies.
         <a href="#" id="cookie-accept">Aceptar</a> | <a href="#" id="cookie-reject">Rechazar</a></p>
 </div>

 <?php 
include("../plantillas/home.php");
include("../plantillas/info-contacto.php");
include("../plantillas/pie.php");
?>
<script defer src="js/nav-responsive.js" ></script>
<script defer src="js/carrousel.js" ></script> 
<script defer src="js/formpresupuesto.js" ></script> 
<script defer src="js/mensajes.js" ></script>   
<script src="js/cookies.js" ></script>   
<script>
document.getElementById("cookie-accept").addEventListener("click", function(e) {
e.preventDefault();
acceptCookies();
});

document.getElementById("cookie-reject").addEventListener("click", function(e) {
e.preventDefault();
rejectCookies();
});

window.addEventListener("load", checkCookieAccepted);
</script> 
</body>

</html>

 