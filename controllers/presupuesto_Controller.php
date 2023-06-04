<?php
/*print_r($_REQUEST);
print_r($_FILES);*/

if(isset($_REQUEST['enviar'])){
// Llamar al controlador para procesar el formulario
    procesarFormulario();
}
if(isset($_REQUEST['modifica'])){
    // Llamar al controlador para modificar presupuesto
    modificarDatosPresupuesto();
}

if(isset($_REQUEST['aceptar'])){
    // Llamar al controlador para modificar presupuesto
    $estado = '4';
    $idPresu = $_REQUEST['id'];

    cambiarEstadoPresu($idPresu,$estado);
}

if(isset($_REQUEST['rechazar'])){
    $estado = '5';
    $idPresu = $_REQUEST['id'];
    cambiarEstadoPresu($idPresu,$estado);
}
function generar_contrasena($longitud) {
    $caracteres = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!@#$%^&*()-_=+';
    $contrasena = '';
    
    // Generar una contraseña aleatoria
    for ($i = 0; $i < $longitud; $i++) {
        $indice = random_int(0, strlen($caracteres) - 1);
        $contrasena .= $caracteres[$indice];
    }
    
    return $contrasena;
}



function procesarFormulario(){
require_once '../models/presupuesto_Model.php';

    // Obtener los datos del formulario
    $nombre = $_REQUEST['nombre'];
    $email = $_REQUEST['email'];
    $ciudad = $_REQUEST['ciudad'];
    $telefono = $_REQUEST['telefono'];
    $cpostal = $_REQUEST['cpostal'];
    $tipoTrabajo = $_REQUEST['trabajo'];
    $fechaActual = date('Y-m-d');
    $privacidad = $_REQUEST['privacidad'];
    $descripcion = $_REQUEST['descripcion'];
    $pwd = generar_contrasena(6);

    // Validar los datos
    if (validarDatos($nombre, $email,$ciudad,$cpostal,$telefono,$tipoTrabajo,$privacidad)) {
        // Insertar en la base de datos
        $insertaDatos = insertarSolicitudPresupuesto($nombre, $email,$ciudad,$cpostal,$telefono,$tipoTrabajo,$fechaActual,$pwd);
        if ($insertaDatos) {
            //Si existe archivo adjunto
            if( !empty($_FILES['adjunto']) && $_FILES['adjunto']['size']>0) { 
                $archivo = $_FILES['adjunto']['tmp_name'];
                $tamanio = $_FILES['adjunto']['size'];
                $maxTamanio = 5 * 1024 * 1024; // 5 MB en bytes
                if ($tamanio > $maxTamanio) {
                    $error = 'El archivo adjunto es demasiado grande.';
                    header("Location: ../public/presupuestos.php?error=$error");
                     exit();
                }else{
                 enviarCorreoconAdjunto($nombre, $email, $ciudad, $cpostal, $telefono, $tipoTrabajo,$descripcion,$archivo);
                }

            }else{
                enviarCorreo($nombre, $email, $ciudad, $cpostal, $telefono, $tipoTrabajo,$descripcion);
              }    
            // Redirigir a una página de éxito
            header('Location: ../public/success.php');
            exit();
            } else {
            // Mostrar un mensaje de error
            $error = 'Error al insertar en la base de datos';
            header("Location: ../public/presupuestos.php?error=$error");
            exit();
            }
    } else {
            // Mostrar un mensaje de error
          $error = 'Datos inválidos';
          header("Location: ../public/presupuestos.php?error=$error");
          exit();
     }
   
}



function validarDatos($nombre, $email,$ciudad,$cpostal,$telefono,$tipoTrabajo){
  
    if (!isset($nombre) || empty($nombre)){
        return false;
    }
    if (!isset($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)){
        return false;
    }
    if (!isset($ciudad) || empty($ciudad)){
        return false;
    }
    if (!isset($cpostal) || empty($cpostal)){
        return false;
    }
    if (!isset($telefono) || empty($telefono)){
        return false;
    }
   
    if ($tipoTrabajo !== "instalacion_electrica_nueva" && $tipoTrabajo !== "reforma_instalacion" && $tipoTrabajo !== "iluminacion_led"
       &&  $tipoTrabajo !== "paneles_solares" && $tipoTrabajo !== "punto_recarga" && $tipoTrabajo !== "otros"){
        return false;
       }
    return true;
}

function enviarCorreoConAdjunto($nombre, $email, $ciudad, $cpostal, $telefono, $tipoTrabajo,$descripcion,$archivo){
   
    $to = 'info@electricidadfcv.com'; // Dirección de correo electrónico a la que se enviará el mensaje
    $subject = 'Nueva solicitud de presupuesto'; // Asunto del correo electrónico
    $boundary = md5(time()); // Generar un valor único para el límite del mensaje

    // Construir el cuerpo del mensaje
    $message = "--$boundary\r\n";
    $message .= "Content-Type: text/plain; charset=UTF-8\r\n";
    $message .= "\r\n";
    $message .= "Se ha recibido una nueva solicitud de presupuesto con los siguientes datos:\r\n";
    $message .= "\r\n";
    $message .= "Nombre: " . $nombre . "\r\n";
    $message .= "Email: " . $email . "\r\n";
    $message .= "Ciudad: " . $ciudad . "\r\n";
    $message .= "Código Postal: " . $cpostal . "\r\n";
    $message .= "Teléfono: " . $telefono . "\r\n";
    $message .= "Trabajo solicitado: " . $tipoTrabajo . "\r\n";
    $message .= "Descripción: " . $descripcion . "\r\n";
    $message .= "\r\n";
    $message .= "--$boundary\r\n";
    $message .= "Content-Type: application/octet-stream\r\n";
    $message .= "Content-Transfer-Encoding: base64\r\n";
    $message .= "Content-Disposition: attachment; filename=\"" . basename($archivo) . "\"\r\n";
    $message .= "\r\n";
    $message .= chunk_split(base64_encode(file_get_contents($archivo)));
    $message .= "\r\n";
    $message .= "--$boundary--";

    // Encabezados adicionales para el correo electrónico
    $headers = "From: info@electricidadfcv.com\r\n";
    $headers .= "MIME-Version: 1.0\r\n";
    $headers .= "Content-Type: multipart/mixed; boundary=\"$boundary\"\r\n";

// Enviar el correo electrónico
    $mailSent = mail($to, $subject, $message, $headers);

    if (!$mailSent) {
        $lastError = error_get_last();
        $errorMessage = $lastError['message']; // Obtener el mensaje de error
        $error = "Hubo un error al enviar el correo electrónico: " . $errorMessage;
        header("Location: ../public/presupuestos.php?error=$error");
        exit();
    }
}

function enviarCorreo($nombre, $email, $ciudad, $cpostal, $telefono, $tipoTrabajo,$descripcion){

    $to = 'info@electricidadfcv.com'; // Dirección de correo electrónico a la que se enviará el mensaje
    $subject = 'Nueva solicitud de presupuesto'; // Asunto del correo electrónico

    // Construir el cuerpo del mensaje
    $message = "Se ha recibido una nueva solicitud de presupuesto con los siguientes datos:\n\n";
    $message .= "Nombre: " . $nombre . "\n";
    $message .= "Email: " . $email . "\n";
    $message .= "Ciudad: " . $ciudad . "\n";
    $message .= "Código Postal: " . $cpostal . "\n";
    $message .= "Teléfono: " . $telefono . "\n";
    $message .= "Tipo de Trabajo: " . $tipoTrabajo . "\n";
    $message .= "Descripción: " . $descripcion . "\n";
    

    // Enviar el correo electrónico
    $mailSent = mail($to, $subject, $message);
    if (!$mailSent) {        
       $error = "Hubo un error al enviar el correo electrónico: ";
       header("Location: ../public/presupuestos.php?error=$error");
        exit();
    }
}


function mostrarPresupuestos() {
    require '../models/presupuesto_Model.php';
    $presupuestos = listarPresupuestos();
    include("../views/presupuestosList.php");
  }

function mostrarPresupuestosUsuario($idUser) {
    require '../models/presupuesto_Model.php';
    $presupuestos = obtenerPresupuestosUsuario($idUser);
    include("../views/presupuestosListUser.php");
  }

function mostrarPresupuestosOrdenados($orderBy, $orderDirection) {
    require '../models/presupuesto_Model.php';
    $presupuestos = obtenerPresupuestosOrdenados($orderBy, $orderDirection);
    include("../views/presupuestosList.php");
  }
 
  function mostrarPresupuestosEncontrados($nombreCliente, $tipoTrabajo, $fechaEmision, $estado) {
    require '../models/presupuesto_Model.php';
    $presupuestos = buscarPresupuestos($nombreCliente, $tipoTrabajo, $fechaEmision, $estado);
    include("../views/presupuestosList.php");
  }
 
  function mostrarPresupuestosOrdenadosCliente($orderBy, $orderDirection, $idUser) {
    require '../models/presupuesto_Model.php';
    $presupuestos = obtenerPresupuestosOrdenadosCliente($orderBy, $orderDirection, $idUser);
    include("../views/presupuestosListUser.php");
  }

  function mostrarPresupuestosEncontradosCliente($nombreCliente, $tipoTrabajo, $fechaEmision, $estado, $idUser) {
    require '../models/presupuesto_Model.php';
    $presupuestos = buscarPresupuestos($nombreCliente, $tipoTrabajo, $fechaEmision, $estado,$idUser);
    include("../views/presupuestosListUser.php");
  }

  function mostrarDetallePresupuesto($idPresu){
    require '../models/presupuesto_Model.php';
    $presupuesto = consultaPresupuesto($idPresu);
    include("../views/editarPresupuesto.php");
    
  }

  function mostrarDetallePresupuestoCliente($idPresu){
    require '../models/presupuesto_Model.php';
    $presupuesto = consultaPresupuesto($idPresu);
    include("../views/gestionPresuCliente.php");
    
  }

 function modificarDatosPresupuesto(){
    require_once "../models/presupuesto_Model.php";
    $estado = '3';
    $fechaEmision = $_REQUEST['fechaEmision'];
    $importe = $_REQUEST['importe'];
    $fechaVencimiento = $_REQUEST['fechaVencimiento'];
    $numPresu = $_REQUEST['num_presupuesto'];
    $documento = $_FILES['adjunto']['name'];
    $idPresu = $_REQUEST['id'];

    // Validar los campos obligatorios
    if (empty($fechaEmision) || empty($importe) || empty($documento)) {
        // Mostrar un mensaje de error o redirigir al formulario con un mensaje de error
        $error = "Por favor, complete todos los campos obligatorios.";
        header("location:../views/adminDashboard.php?error=$error");
        exit();
    }
        $rutaArchivo = $_FILES['adjunto']['tmp_name'];
        // Generar el nuevo nombre del archivo con el ID del presupuesto
        $nuevoNombreArchivo = $idPresu . '_' . $documento;
        // Ruta de destino para guardar el archivo
         $rutaDestino = '../public/presupuestos/' . $nuevoNombreArchivo;
    
        // Mover el archivo a la carpeta de destino
        move_uploaded_file($rutaArchivo, $rutaDestino);

    // Procesar los datos y actualizar la base de datos
    $modificado = modificaPresupuesto($idPresu, $fechaEmision, $importe, $fechaVencimiento, $numPresu, $documento, $estado);
    if($modificado){
        $mensaje='El presupuesto se ha editado correctamente';
        header("location:../views/adminDashboard.php?mensaje=$mensaje");
        exit();
    }else{
      $error = 'Ha habido algún error en la inserción de los datos';
      header("location:../views/adminDashboard.php?error=$error");
      exit();
    }
  
}

  function cambiarEstadoPresu($idPresu,$estado){
    require_once "../models/presupuesto_Model.php";   

    $aceptado = modificaEstadoPresu($idPresu,$estado);
   
    if($aceptado){
        $mensaje='El presupuesto se ha editado correctamente';
        header("location:../views/adminDashboard.php?mensaje=$mensaje");
        exit();
    }else{
      $error = 'Ha habido algún error en la inserción de los datos';
      header("location:../views/adminDashboard.php?error=$error");
      exit();
    }
  }
?>