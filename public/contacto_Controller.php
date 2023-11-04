<?php
function procesarFormContacto(){
    $nombre = filter_var($_POST['nombre'],FILTER_SANITIZE_STRING);
    $telefono = filter_var($_POST['telefono'], FILTER_SANITIZE_NUMBER_INT);
    $email = filter_var ($_POST['email'],FILTER_SANITIZE_EMAIL);
    $consulta = $_POST['consulta'];
	
    

        $to ='fundeanuconstantin@gmail.com'; // Dirección de correo electrónico a la que se enviará el mensaje
        $subject = 'Contacto desde la web'; // Asunto del correo electrónico
    
        // Construir el cuerpo del mensaje
        $message = "Se ha recibido una nueva solicitud de contacto desde la web:\n\n";
        $message .= "Nombre: " . $nombre . "\n";
        $message .= "Email: " . $email . "\n";       
        $message .= "Teléfono: " . $telefono . "\n";       
        $message .= "Descripción: " . $consulta . "\n";
        
    
        // Enviar el correo electrónico
        $mailSent = mail($to, $subject, $message);
       
        if ($mailSent) {       
            $mensaje="Hemos recibido su mensaje, en breve contactaremos con usted, gracias!";
            header("Location:contacto.php?mensaje=$mensaje");
            exit();
        }else{
            $error="Fallo al enviar el email. Vuelva a intentarlo o contacte con nosotros";
            header("location:contacto.php?error=$error");
            exit();
        }
    
    
    
}

// Llamar al controlador para procesar el formulario
procesarFormContacto();

?>