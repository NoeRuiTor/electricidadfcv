<?php

include_once("../config/funciones.php");

$titulo_pagina = "Electricidad FCV - Principal";
$description = "Electricista en Castalla y toda la provincia de Alicante, instalaciones eléctricas, 
energias renovables, reformas de instalaciones, memoria técnica de diseño, presupuestos en general, tienda de iluminación led";
$keywords = "electricidad, electricista, iluminación, energías renovables, reformas electricas, Castalla";
$current_page = 'index.php';
$email = 'fundeanuconstantin@gmail.com';
$movil = '+34666194313';
$direccion = "Electricidad FCV, Carrer Senieta de l'Auelet, 53, 03420 Castalla, Alicante";

include("cabecera.php");
?>

<main class="main contenedor">
        <section class="banner-head banner-head--contacto">
            <div class="banner-head__background contenedor__row">         
                <div class="text col-6-12 col-8-12-sm">
                    <h1 class="heading heading-primary ">
                    <p>Contacto</p>
                        <span></span>
                    </h1>
                </div>
            </div>
            </section>
            <section class="localiza contenedor__row">
                <div class="localiza__mapa col-6-12 col-12-12-sm">
                    <iframe class="mapa" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d6419.76334463789!2d-0.6765269830433929!3d38.591299282444645!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xad73dc4a1b00ba1d%3A0xfc789b4b44a4bb48!2sElectricidad%20FCV!5e0!3m2!1ses!2ses!4v1675718077867!5m2!1ses!2ses" 
                         style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div> 
                <div class="localiza__form col-6-12 col-12-12-sm">


                </div>
            </section>
</main>

<?php

include("info-contacto.php");
include("pie.php");
?>