<?php
session_start();



$titulo_pagina = "Electricidad FCV - Política Cookies";
$description = "Electricista en Castalla y toda la provincia de Alicante, instalaciones eléctricas, 
energias renovables, reformas de instalaciones, memoria técnica de diseño, presupuestos en general, tienda de iluminación led";
$keywords = "electricidad, electricista, iluminación, energías renovables, reformas electricas, Castalla";
$current_page = 'politicaCookies.php';

include_once("../config/funciones.php");

include("../plantillas/cabecera.php");
?>

<main class="contenedor">
    
   
        <div class="legal contenedor__row">
            <h2 class="legal__text-heading heading heading-secondary col-12-12 col-12-12-sm" >Política de Cookies</h2>
            <div class="legal__text-body col-12-12 col-12-12-sm">
                <p class="bodytext">&nbsp;</p>
                <p class="bodytext">Esta Política de Cookies explica cómo Electricidad FCV utiliza cookies y tecnologías similares para reconocerte cuando visitas nuestro sitio web <a class="<?php active('index.php'); ?>" href="index.php">www.electricidadfcv.com</a> (en adelante, el "Sitio"). Esta política explica qué son las cookies, cómo las utilizamos, tus opciones con respecto a su uso y más información sobre las cookies.</p>
                <p class="bodytext">&nbsp;</p>
                <p class="bodytext">¿QUÉ SON LAS COOKIES?</p>
                <p class="bodytext">&nbsp;</p>
                <p class="bodytext">Las cookies son pequeños archivos de texto que se colocan en tu dispositivo cuando visitas nuestro Sitio. Se utilizan ampliamente para hacer que los sitios web funcionen de manera más eficiente, así como para proporcionar información a los propietarios del sitio. Las cookies son una parte estándar de la mayoría de los sitios web modernos.</p>
                <p class="bodytext">&nbsp;</p>
                <p class="bodytext">¿CÓMO UTILIZAMOS LAS COOKIES?</p>
                <p class="bodytext">&nbsp;</p>
                <p class="bodytext">Utilizamos cookies por diversas razones, que incluyen:</p>
                <ol class="bodytext">

                    <li class="bodytext">
                        <span>Cookies esenciales</span>: Estas cookies son necesarias para proporcionarte servicios disponibles a través de nuestro Sitio y para permitirte utilizar algunas de sus funciones. Por ejemplo, te permiten iniciar sesión en áreas seguras de nuestro Sitio.
                    </li>

                    <li class="bodytext">
                        <span>Cookies de rendimiento y funcionalidad</span>: Estas cookies se utilizan para mejorar el rendimiento y la funcionalidad de nuestro Sitio, pero no son esenciales para su uso. Por ejemplo, nos permiten reconocerte cuando regresas a nuestro Sitio y recordar tus preferencias.
                    </li>

                    <li class="bodytext">
                        <span>Cookies de análisis y personalización</span>: Estas cookies recopilan información sobre cómo interactúas con nuestro Sitio y nos ayudan a mejorar tu experiencia de usuario. Por ejemplo, nos permiten saber qué páginas son las más y las menos populares y ver cómo los visitantes navegan por el Sitio.                        
                    </li>                    
                </ol>
                <p class="bodytext">&nbsp;</p>
                <p class="bodytext">¿QUÉ OPCIONES TENGO CON RESPECTO A LAS COOKIES?</p>
                <p class="bodytext">&nbsp;</p>
                <p class="bodytext">Si deseas eliminar las cookies o instruir a tu navegador web para que las elimine o rechace, consulta la sección de ayuda de tu navegador web. Ten en cuenta que deshabilitar las cookies puede afectar la funcionalidad de nuestro Sitio y de muchos otros sitios web que visitas. Para obtener más información sobre cómo controlar las cookies, visita www.allaboutcookies.org.</p>
                <p class="bodytext">&nbsp;</p>
                <p class="bodytext">CONTACTO</p>
                <p class="bodytext">&nbsp;</p>
                <p class="bodytext">Si tienes alguna pregunta sobre nuestra Política de Cookies, puedes contactarnos en <a href="mailto:<?php parametro_plantilla("email"); ?>">info@electricidadfcv.com</a></p>
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