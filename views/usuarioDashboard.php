<?php

 require('../config/seguridad.php');
 
 include_once("../config/funciones.php");

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="<?php parametro_plantilla("description"); ?>">
    <meta name="Keywords" content="<?php parametro_plantilla("keywords"); ?>"> 
    <link rel="shortcut icon" type="image/x-icon" href="../public/img/favicon.png">    
    <link rel="stylesheet" href="../public/css/main.css">     
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
	<title><?php parametro_plantilla("titulo_pagina"); ?></title>
    
</head>
<body>
       <!-------CABECERA CON NAVEGADOR--------->

            <header class="header contenedor__row">
                <div class="header__logo col-3-12 col-12-12-sm">
                    <img class="logo" src="../public/img/logo.png" alt="electricidadFCV" width="150" height="150" >
                </div>
                <div class="menu-icon">
                        <i class="fas fa-bars"></i>
                </div> 
                <div class="menu-login">
                 <a href="login.php"><i class="fas fa-sign-in-alt"></i></a>

                </div> 
                <nav class="col-6-12 header__nav nav" id="bars">
                               
                     <ul class="menu" id="menu-items">
                            <li class="menu__opcion"><a class="<?php active('index.php'); ?>" href="../public/index.php">Inicio</a></li>
                            <li class="menu__opcion"><a class="<?php active('servicios.php'); ?>" href="../public/servicios.php">Servicios</a></li>                
                            <li class="menu__opcion"><a class="<?php active('trabajos.php'); ?>" href="../public/trabajos.php">Trabajos</a></li> 
                            <li class="menu__opcion"><a class="<?php active('presupuesto.php'); ?>" href="../public/presupuestos.php">Presupuesto</a></li>
                            <li class="menu__opcion"><a class="<?php active('blog.php'); ?>" href="../public/blog.php">Blog</a></li>       
                            <li class="menu__opcion"><a class="<?php active('contacto.php'); ?>" href="../public/contacto.php">Contacto</a></li>
                    
                      </ul>          
                </nav>
                <a href="../views/adminDashboard.php" class="header__btn btn btn--login col-3-12 col-3-12-sm">Mi cuenta</a>
            </header>

      <!--------SCRIPT MENU RESPONSIVE------->

<script>
        const limit_size_screen = window.matchMedia('screen and (max-width: 768px)');
        const menu = document.querySelector('#bars');
        const menuIcon = document.querySelector('.menu-icon');

        function validation(event) {
        if (event.matches) {
            menuIcon.addEventListener('click', hideShow);
        } else {
            menuIcon.removeEventListener('click', hideShow);
            menu.classList.remove('is-active'); // Asegurarse de ocultar el menú en pantallas grandes
        }
        }

        validation(limit_size_screen);

        function hideShow() {
        menu.classList.toggle('is-active'); // Agrega o quita la clase 'is-active' para mostrar u ocultar el menú
        }

</script> 


<!----------PANEL ADMINISTRACION INTRANET----->


<section class="user__nav">
        <div class="contenedor__row">
            <div class="user__nav-section user__nav-section--heading col-4-12 col-3-12-sm">
                <h4 class="heading heading-secondary">
                    <?php $_SESSION['nombre'];?>
                </h4>
            </div>
            <div class="user__nav-section user__nav-section--doc col-3-12 col-2-12-sm">
                <a href="usuarioDashboard.php?navMenu=presupuestos"><i class="fas fa-file"></i>
                <p>Documentos</p></a>
            </div>
            <div class="user__nav-section user__nav-section--doc col-2-12 col-2-12-sm">
                <a href="usuarioDashboard.php?navMenu=datos"> <i class="fas fa-user"></i>
                <p>Mis datos</p></a>
            </div>           
            <div class="user__nav-section user__nav-section--doc col-2-12 col-1-12-sm">
                <a href="../controllers/login_Controller.php?logout=logout"><i class="fas fa-sign-out-alt"></i>
                <p>Logout</p></a>
            </div>
        </div>
    </section>
<!------CONTENIDO------>

<main class="contenedor">

  <!---------BUSCADOR------->
   
    <section class="userContent">
       
            <form class="presupuestos__nav contenedor__row" method="get" action="adminDashboard.php">
                
                <div class="col-3-12 col-6-12-sm">                
                    <label for="tipo_trabajo">Tipo de trabajo</label>
                    <input type="text" name="tipo_trabajo" id="tipo_trabajo"/>
                </div>
                <div class="col-3-12 col-4-12-sm">                
                    <label for="estado">Estado</label>
                    <input type="text" name="estado" id="estado"/>
                </div>
                <div class="col-2-12 col-4-12-sm">                
                    <label for="fechaEmision">Fecha Emisión</label>
                    <input type="text" name="fechaEmision" id="fechaEmision"/>
                </div>
                <div class="col-1-12 col-1-12-sm"> 
                    <button type="submit" name="btnBuscar" id="search-button">
                        <i class="fas fa-search"></i>
                    </button>
                </div>
                
            </form>
         <!-------------VISTA SEGÚN LOS DATOS ENVIADOS-------------->  
           
       <?php
        require "../controllers/presupuesto_Controller.php";

           if(isset($_REQUEST['navMenu']) && $_REQUEST['navMenu'] == 'presupuestos'){

                if(isset($_REQUEST['orderBy']) && ($_REQUEST['orderDirection'])){
                    $orderBy = $_REQUEST['orderBy'];
                    $orderDirection = $_REQUEST['orderDirection'];
    
                    mostrarPresupuestosOrdenados($orderBy, $orderDirection);
                } else{     
                   mostrarPresupuestos();
                }
            }elseif(isset($_REQUEST['btnBuscar'])) {
                if(isset($_REQUEST['nombre_cliente'])){
                   $nombreCliente = $_REQUEST['nombre_cliente'];
                }
                if(isset($_REQUEST['tipo_trabajo'])){
                    $tipoTrabajo = $_REQUEST['tipo_trabajo'];
                }
                if(isset($_REQUEST['fechaEmision'])){
                     $fechaEmision = $_REQUEST['fechaEmision'];
                }
                if(isset($_REQUEST['estado'])){
                    $estado = $_REQUEST['estado'];
                }
                    mostrarPresupuestosEncontrados($nombreCliente, $tipoTrabajo, $fechaEmision, $estado);                   

           }else{
            if(isset($_REQUEST['orderBy']) && ($_REQUEST['orderDirection'])){
                $orderBy = $_REQUEST['orderBy'];
                $orderDirection = $_REQUEST['orderDirection'];
   
                mostrarPresupuestosOrdenados($orderBy, $orderDirection);
              } else{     
               mostrarPresupuestos();
             }
        
           }

      ?>




        
    </section>

</main>
<?php

include("../plantillas/info-contacto.php");
include("../plantillas/pie.php");
?>           