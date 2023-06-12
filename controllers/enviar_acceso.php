<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;


require '../vendor/autoload.php';

// Crea una nueva instancia de PHPMailer
$mail = new PHPMailer(true);

$mail->isSMTP();
$mail->Host = 'smtp.gmail.com';
$mail->SMTPAuth = true;
$mail->Username = 'info@electricidadfcv.com';
$mail->Password = 'Fundeanu190984';
$mail->SMTPSecure = 'tls';
$mail->Port = 587;


// Obtener los datos del usuario desde la base de datos
if(isset($_REQUEST['clienteId'])){
    $idUser = $_REQUEST['clienteId'];
}
$datos_usuario = mostrarUsuarioDetalle($idUser);

if ($datos_usuario) {
    $nombre_usuario = $datos_usuario['nombre'];
    $contrasena = $datos_usuario['psw'];

    $mail->setFrom('info@electricidadfcv.com', 'Cristian');
    $mail->addAddress('noeelectra@hotmail.com', 'Noelia');
    $mail->Subject = "Detalles de acceso a la intranet";
    $mail->Body = "Estimado cliente, sus datos de acceso a la intranet son:\n\nUsuario: $nombre_usuario\nContraseña: $contrasena. Por seguridad al acceder la primera vez cambie la contraseña.";
    
    
/*

    // Enviar correo electrónico al cliente con los datos de acceso
    $destinatario = "noeelectra@hotmail.com";//$datos_usuario['email'];
    $asunto = "Detalles de acceso a la intranet";
    $mensaje = "Estimado cliente, sus datos de acceso a la intranet son:\n\nUsuario: $nombre_usuario\nContraseña: $contrasena. Por seguridad al acceder la primera vez cambie la contraseña.";
    $headers = "From: fundeanuconstantin@gmail.com";
*/
    // Envío del correo electrónico
    if ($mail->send()) {
        http_response_code(200); // Éxito: OK
    } else {
        http_response_code(500); // Error del servidor
    }
} else {
    http_response_code(404); // No se encontraron datos de acceso para el usuario
}
?>