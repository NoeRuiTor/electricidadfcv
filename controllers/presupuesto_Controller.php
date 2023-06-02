<?php

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

    // Validar los datos
    if (validarDatos($nombre, $email,$ciudad,$cpostal,$telefono,$tipoTrabajo,$privacidad)) {
        // Insertar en la base de datos
        $insertaDatos = insertarSolicitudPresupuesto($nombre, $email,$ciudad,$cpostal,$telefono,$tipoTrabajo,$fechaActual);
        if ($insertaDatos) {
            //Si existe archivo adjunto
            if( !empty($_FILES['adjunto']) && $_FILES['adjunto']['size']>0) { 
                $archivo = $_FILES['adjunto']['tmp_name'];
                $tamanio = $_FILES['adjunto']['size'];
                $maxTamanio = 5 * 1024 * 1024; // 5 MB en bytes
                if ($tamanio > $maxTamanio) {
                    $mensajeError = 'El archivo adjunto es demasiado grande.';
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
            echo 'Error al insertar en la base de datos';
            }
    } else {
            // Mostrar un mensaje de error
          echo 'Datos inválidos';
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
    if (!isset($nombre) || empty($nombre) ){
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
        echo "Hubo un error al enviar el correo electrónico: " . $errorMessage;
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
       echo "Hubo un error al enviar el correo electrónico: ";
    }
}

// Llamar al controlador para procesar el formulario
procesarFormulario();

?>