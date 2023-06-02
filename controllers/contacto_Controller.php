<?php
function procesarFormContacto(){
    $nombre = $_REQUEST['nombre'];
    $telefono = $_REQUEST['telefono'];
    $email = $_REQUEST['email'];
    $consulta = $_REQUEST['consulta'];
    

        $to = 'info@electricidadfcv.com'; // Dirección de correo electrónico a la que se enviará el mensaje
        $subject = 'Nueva solicitud de presupuesto'; // Asunto del correo electrónico
    
        // Construir el cuerpo del mensaje
        $message = "Se ha recibido una nueva solicitud de presupuesto con los siguientes datos:\n\n";
        $message .= "Nombre: " . $nombre . "\n";
        $message .= "Email: " . $email . "\n";       
        $message .= "Teléfono: " . $telefono . "\n";       
        $message .= "Descripción: " . $consulta . "\n";
        
    
        // Enviar el correo electrónico
        $mailSent = mail($to, $subject, $message);
        if ($mailSent) {        
            header('Location: ../public/success.php');
            exit();
        }else{
            $error="Fallo al enviar el email. Vuelva a intentarlo o contacte con nosotros";
            header("location:../public/contacto.php?error=$error");
            exit();
        }
    
    
    
}

// Llamar al controlador para procesar el formulario
procesarFormContacto();

?>