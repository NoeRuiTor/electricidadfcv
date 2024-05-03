<?php
session_start();



$titulo_pagina = "Electricidad FCV - Aviso Legal";
$description = "Electricista en Castalla y toda la provincia de Alicante, instalaciones eléctricas, 
energias renovables, reformas de instalaciones, memoria técnica de diseño, presupuestos en general, tienda de iluminación led";
$keywords = "electricidad, electricista, iluminación, energías renovables, reformas electricas, Castalla";
$current_page = 'avisoLegal.php';

include_once("../config/funciones.php");

include("../plantillas/cabecera.php");
?>

<main class="contenedor">
    
   
        <div class="legal contenedor__row">
            <h2 class="legal__text-heading heading heading-secondary col-12-12 col-12-12-sm" >Aviso Legal</h2>
            <div class="legal__text-body col-12-12 col-12-12-sm">
                <p class="bodytext">&nbsp;</p>
                <p class="bodytext">El acceso y uso de <a class="<?php active('index.php'); ?>" href="index.php">www.electricidadfcv.com</a> (en adelante, el "Sitio") están sujetos a los siguientes términos y condiciones. Al acceder y utilizar este Sitio, aceptas cumplir y estar legalmente vinculado por estos términos y condiciones. Si no estás de acuerdo con alguno de estos términos y condiciones, por favor, no accedas ni utilices este Sitio.</p>
                <p class="bodytext">&nbsp;</p>
                <p class="bodytext">PROPIEDAD INTELECTUAL</p>
                <p class="bodytext">&nbsp;</p>
                <p class="bodytext">El Sitio y todo su contenido, incluyendo, entre otros, textos, gráficos, logotipos, iconos, imágenes, clips de audio y video, compilaciones de datos y software, son propiedad de Electricidad FCV o de sus licenciantes y están protegidos por leyes de derechos de autor y otras leyes de propiedad intelectual.</p>
                <p class="bodytext">&nbsp;</p>
                <p class="bodytext">USO PERMITIDO</p>
                <p class="bodytext">&nbsp;</p>
                <p class="bodytext">Se te concede un permiso limitado y no exclusivo para acceder y utilizar el Sitio y su contenido con fines personales y no comerciales. Queda prohibido cualquier otro uso del Sitio o de su contenido sin el consentimiento previo por escrito de Electricidad FCV.</p>
                <p class="bodytext">&nbsp;</p>
                <p class="bodytext">LIMITACIÓN DE RESPONSABILIDAD</p>
                <p class="bodytext">&nbsp;</p>
                <p class="bodytext">El contenido del Sitio se proporciona "tal cual" y "según disponibilidad", sin garantías de ningún tipo, ya sean expresas o implícitas. Electricidad FCV renuncia a toda responsabilidad por cualquier daño directo, indirecto, incidental, especial, consecuente o punitivo que surja del acceso o uso del Sitio.</p>
                <p class="bodytext">&nbsp;</p>
                <p class="bodytext">ENLACE DE TERCEROS</p>
                <p class="bodytext">&nbsp;</p>
                <p class="bodytext">El Sitio puede contener enlaces a sitios web de terceros que no están bajo el control de Electricidad FCV. Electricidad FCV no asume responsabilidad alguna por el contenido, las políticas de privacidad o las prácticas de cualquier sitio web de terceros. La inclusión de cualquier enlace no implica necesariamente una recomendación o respaldo por parte de Electricidad FCV del sitio vinculado.</p>
                <p class="bodytext">&nbsp;</p>
                <p class="bodytext">MODIFICACIONES</p>
                <p class="bodytext">&nbsp;</p>
                <p class="bodytext">Electricidad FCV se reserva el derecho de modificar estos términos y condiciones en cualquier momento y sin previo aviso. Se te recomienda revisar periódicamente esta página para estar al tanto de cualquier cambio. El uso continuado del Sitio después de la publicación de los cambios constituye tu aceptación de los mismos.</p>
                <p class="bodytext">&nbsp;</p>
                <p class="bodytext">CONTACTO</p>
                <p class="bodytext">&nbsp;</p>
                <p class="bodytext">Si tienes alguna pregunta sobre este Aviso Legal, puedes contactarnos en <a href="mailto:<?php parametro_plantilla("email"); ?>">info@electricidadfcv.com</a>
                <p class="bodytext">&nbsp;</p>
            </div>
        </div>

    
</main>

<?php

include("../plantillas/info-contacto.php");
include("../plantillas/pie.php");
?>
<script defer src="js/nav-responsive.js" ></script>
</body>

</html>