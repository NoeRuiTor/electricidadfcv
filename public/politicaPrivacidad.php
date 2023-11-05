<?php
session_start();



$titulo_pagina = "Electricidad FCV - Politica Privacidad";
$description = "Electricista en Castalla y toda la provincia de Alicante, instalaciones eléctricas, 
energias renovables, reformas de instalaciones, memoria técnica de diseño, presupuestos en general, tienda de iluminación led";
$keywords = "electricidad, electricista, iluminación, energías renovables, reformas electricas, Castalla";
$current_page = 'politicaPrivacidad.php';

include_once("../config/funciones.php");

include("../plantillas/cabecera.php");
?>

<main class="contenedor">
    
   
        <div class="legal contenedor__row">
            <h2 class="legal__text-heading heading heading-secondary col-12-12 col-12-12-sm" >Política de privacidad</h2>
            <div class="legal__text-body col-12-12 col-12-12-sm">
                <p class="bodytext">&nbsp;</p>
                <p class="bodytext">USO Y TRATAMIENTO DE DATOS DE CARÁCTER PERSONAL</p>
                <p class="bodytext">&nbsp;</p>
                <p class="bodytext">Le informamos que los datos de carácter personal que pudieran proporcionarse, a través de este sitio web, así como los que pudiera facilitar en el futuro en el marco de su relación jurídica con esta entidad, serán incorporados a nuestra base de datos.</p>
                <p class="bodytext">&nbsp;</p>
                <p class="bodytext">Se informa sobre los siguientes extremos relativos a la protección de datos:</p>
                <ol class="bodytext">

                    <li class="bodytext">
                        <span>Responsable del tratamiento</span>:Somos responsables de los datos recogidos en el formulario correspondiente.
                    </li>

                    <li class="bodytext">
                        <span>Necesidad del tratamiento</span>: La comunicación de sus datos a través del formulario correspondiente es obligatoria para podamos contactar.
                    </li>

                    <li class="bodytext">
                        <span>Finalidades del tratamiento y legitimación del tratamiento</span>: 
                        <br>

                        <ul class="bodytext" >

                            <li class="bodytext">Gestionar, administrar, prestarle los servicios o facilitarle los productos que solicite y, en su caso, para el cumplimiento y ejecución de los contratos que pudiera celebrar, conocer mejor sus gustos, adecuar los servicios a sus preferencias.</li>
                            <li class="bodytext">Enviarle, por correo postal, correo electrónico y otros medios de comunicación electrónica equivalente, comunicaciones comerciales y publicitarias sobre nuestros productos y/o servicios.</li>

                        </ul>

                    </li>

                    <li class="bodytext">
                        <span>Destinatarios</span>: Contratamos con alguna entidad que prestan servicios como los de mantenimiento y hosting, a través de contratos de encargo del tratamiento para dar soporte a los fines de tratamiento indicados.
                    </li>

                    <li class="bodytext">
                        <span>Plazo de conservación de datos</span>: Conservaremos sus datos mientras se mantenga el tratamiento y no solicite la supresión de los mismos.
                    </li>

                    <li class="bodytext">
                        <span>Derechos</span>: Podrá ejercitar los derechos de acceso, rectificación, supresión, limitación al tratamiento, oposición, portabilidad y derecho a no ser objeto de una decisión basada únicamente en el tratamiento automatizado, mediante comunicación escrita al domicilio indicado en el aviso legal y a revocar su consentimiento sin efectos retroactivos u oponerse a la recepción de comunicaciones comerciales publicitarias por email y otros medios de comunicación electrónica equivalente, enviando y a presentar una reclamación ante la Autoridad de control, en España, la Agencia Española de Protección de Datos.
                    </li>

                    <li class="bodytext">
                        <span>Modificación de la política de privacidad</span>: Nos reservamos el derecho a modificar su Política de Privacidad, de acuerdo a nuestro propio criterio, o motivado por un cambio doctrinal de la Autoridad competente en Protección de Datos, legislativo o jurisprudencial. El uso de la Web después de dichos cambios implicará la aceptación de éstos.
                    </li>

                    <li class="bodytext">
                        <span>Legislación aplicable</span>: Cualquier controversia que se derive del uso de este Site, será regida, interpretada y sometida de acuerdo con las leyes de España.
                    </li>

                </ol>
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