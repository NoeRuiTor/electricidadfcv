<?php
require('../config/seguridad.php'); 
if (isset($_SESSION['rol'])){
    if($_SESSION['rol'] == 'usuario'){
    header("location:../public/usuarioDashboard.php");
    exit();
    }
}
 
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
    <link rel="shortcut icon" type="image/x-icon" href="img/favicon.png">     
    <link rel="stylesheet" href="css/main.css">       
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
	<title><?php parametro_plantilla("titulo_pagina"); ?></title>
    
</head>
<body>
       <!-------CABECERA CON NAVEGADOR--------->

            <header class="header contenedor__row">
                <div class="header__logo col-3-12 col-12-12-sm">
                    <img class="logo" src="img/logo.png" alt="electricidadFCV" width="150" height="150" >
                </div>
                <div class="menu-icon">
                        <i class="fas fa-bars"></i>
                </div> 
                <div class="menu-login">
                 <a href="adminDashboard.php"><i class="fas fa-sign-in-alt"></i></a>

                </div> 
                <nav class="col-6-12 header__nav nav" id="bars">
                               
                     <ul class="menu" id="menu-items">
                            <li class="menu__opcion"><a class="<?php active('index.php'); ?>" href="index.php">Inicio</a></li>
                            <li class="menu__opcion"><a class="<?php active('servicios.php'); ?>" href="servicios.php">Servicios</a></li>                
                            <li class="menu__opcion"><a class="<?php active('trabajos.php'); ?>" href="trabajos.php">Trabajos</a></li> 
                            <li class="menu__opcion"><a class="<?php active('presupuesto.php'); ?>" href="presupuestos.php">Presupuesto</a></li>
                            <li class="menu__opcion"><a class="<?php active('blog.php'); ?>" href="blog.php">Blog</a></li>       
                            <li class="menu__opcion"><a class="<?php active('contacto.php'); ?>" href="contacto.php">Contacto</a></li>
                    
                      </ul>          
                </nav>
                <a href="adminDashboard.php" class="header__btn btn btn--login col-3-12 col-3-12-sm">Mi cuenta</a>
            </header>

    

<!----------PANEL ADMINISTRACION INTRANET----->
   
    <section class="user__nav">
        <div class="contenedor__row">
            <div class="user__nav-section user__nav-section--heading col-3-12 col-3-12-sm">
                <h4 class="heading heading-secondary">
                    <?php echo $_SESSION['nombre']; ?>
                </h4>
            </div>
            <div class="user__nav-section user__nav-section--doc col-2-12 col-2-12-sm">
                <a href="adminDashboard.php?navMenu=presupuestos"><i class="fas fa-file"></i>
                <p>Presupuestos</p></a>
            </div>
            <div class="user__nav-section user__nav-section--doc col-2-12 col-2-12-sm">
                <a href="adminDashboardUsuarios.php?navMenu=clientes"> <i class="fas fa-user"></i>
                <p>Clientes</p></a>
            </div>
            <div class="user__nav-section user__nav-section--doc col-1-12 col-2-12-sm">
                <a href="#"> <i class="fas fa-blog"></i>
                <p>Blog</p></a>
            </div>
            <div class="user__nav-section user__nav-section--doc col-2-12 col-2-12-sm">
                <a href="#"> <i class="fas fa-camera"></i>
                <p>Trabajos</p></a>
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
  
        <div id="errores"> </div>
        <div id="mensaje"></div>
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

           }elseif(isset($_REQUEST['idPresu'])){
               $idPresu = $_REQUEST['idPresu'];
               
                  mostrarDetallePresupuesto($idPresu);           
              

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
<script defer src="js/nav-responsive.js" ></script>
<script src="js/accesocliente.js"></script>
<script src="js/mensajes.js"></script>
</body>

</html>