<?php

if(isset($_POST['enviar'])){
// Llamar al controlador para procesar el formulario
  $nombre = $_POST['nombre'];
  $email = $_POST['email'];
  $telefono = $_POST['telefono'];
  $ciudad = $_POST['ciudad'];
  $cpostal =  $_POST['cpostal'];
  $tipoTrabajo = $_POST['trabajo']; 
  $fechaActual = date('Y-m-d');
  $pwd = generar_contrasena(6);

    procesaFormulario($nombre,$email,$telefono,$ciudad,$cpostal,$tipoTrabajo,$fechaActual,$pwd);
    
      
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

function procesaFormulario($nombre, $email, $telefono, $ciudad, $cpostal, $tipoTrabajo, $fechaActual, $pwd) {
  if (validarDatos($nombre, $email, $telefono, $ciudad, $cpostal, $tipoTrabajo) == true) {
	  if(isset($_POST['descripcion'])){
    	$descripcion = $_POST['descripcion'];
  	  } 
     if(!empty($_FILES['adjunto']) && $_FILES['adjunto']['size']>0){
      $documento = $_FILES['adjunto']['tmp_name'];
       enviarCorreoConAdjunto($nombre, $email, $ciudad, $cpostal, $telefono, $tipoTrabajo,$descripcion,$documento);
	   
      }else{
        enviarCorreo($nombre, $email, $ciudad, $cpostal, $telefono, $tipoTrabajo,$descripcion);
		    
     }
    
    require("../config/conectar_db.php");
    $conn = conectar_db($bd);
    
    //COMPROBAR SI EL USUARIO EXISTE Y SI EXISTE SOLO INSERTAR EN LA TABLA PRESUPUESTO

    $sentencia = $conn->prepare("SELECT * FROM usuario WHERE email like :email");
    $resultado = $sentencia->execute([':email'=>$email]); 
    $fila = $sentencia->rowCount();

    if($fila == 1){
     
      $sentencia = $conn->prepare("SELECT id FROM usuario WHERE email LIKE :email");
      $sentencia->execute([':email' => $email]); 
      $resultado = $sentencia->fetch(); // Obtener el resultado de la consulta
  
      $idUser = $resultado['id']; // Obtener el ID del usuario

      $sql = "INSERT INTO presupuesto (id_usuario,tipo_trabajo,fecha_solicitud) VALUES (?, ?, ?)";
      $stmt = $conn->prepare($sql);
      if($stmt->execute([$idUser, $tipoTrabajo, $fechaActual])){
       
		  $mensaje = 'Hemos recibido su solicitud de presupuesto';
          header("Location:presupuestos.php?error==$mensaje");
          exit();

      }else{
        $error = 'Error al insertar en la base de datos';
        header("Location:presupuestos.php?error=$error");
        exit();  
      }

     //SI EL USUARIO NO EXISTE EN LA BASE DE DATOS
        
    }else{
           enviarCorreoUsuarioRegistrado($nombre, $email, $pwd);
          // Iniciar una transacción
          $conn->beginTransaction();

          try {
            // Inserción en la primera tabla
            $sql1 = "INSERT INTO usuario (nombre, ciudad, email, psw, telefono, cpostal) VALUES (?, ?, ?, ?, ?,?)";
            $stmt1 = $conn->prepare($sql1);
            $stmt1->execute([$nombre, $ciudad, $email, $pwd, $telefono, $cpostal]);

            // Obtener el ID de la última inserción en la primera tabla
            $idTabla1 = $conn->lastInsertId();

            // Inserción en la segunda tabla relacionada
            $sql2 = "INSERT INTO presupuesto (id_usuario,tipo_trabajo,fecha_solicitud) VALUES (?, ?, ?)";
            $stmt2 = $conn->prepare($sql2);
            $stmt2->execute([$idTabla1, $tipoTrabajo, $fechaActual]);

            // Confirmar la transacción
            $conn->commit();
            
            header("Location:success.php?contrasena=$pwd");
            exit();
            
          } catch (Exception $e) {
            // En caso de error, deshacer la transacción
            $conn->rollback();
            $error = 'Error al insertar en la base de datos'. $e->getMessage();
            header("Location: presupuestos.php?error=$error");
            exit();     
            
          }

          // Cerrar la conexión
          $conn = null;
        }
    }
 
    // Mostrar un mensaje de error
    $error = 'Datos inválidos';
    header("Location: presupuestos.php?error=$error");
    exit();



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
   
    if ($tipoTrabajo !== "instalacion electrica nueva" && $tipoTrabajo !== "reforma instalacion" && $tipoTrabajo !== "iluminacion led"
       &&  $tipoTrabajo !== "paneles solares" && $tipoTrabajo !== "punto recarga" && $tipoTrabajo !== "otros"){
        return false;
       }
    return true;
}

function enviarCorreoConAdjunto($nombre, $email, $ciudad, $cpostal, $telefono, $tipoTrabajo, $descripcion, $documento) {
    $to = 'fundeanuconstantin@gmail.com'; // Dirección de correo electrónico a la que se enviará el mensaje
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
    $message .= "Content-Disposition: attachment; filename=\"" . basename($documento) . "\"\r\n";
    $message .= "\r\n";
    $message .= chunk_split(base64_encode(file_get_contents($documento)));
    $message .= "\r\n";
    $message .= "--$boundary--";

    // Encabezados adicionales para el correo electrónico
    $headers = "From: info@electricidadfcv.com\r\n";
    $headers .= "MIME-Version: 1.0\r\n";
    $headers .= "Content-Type: multipart/mixed; boundary=\"$boundary\"\r\n";

    // Enviar el correo electrónico
    $mailSent = mail($to, $subject, $message, $headers);

    if (!$mailSent) {
        $error = "Hubo un error al enviar el correo electrónico.";
        header("Location: presupuestos.php?error=$error");
        exit();
    }
}


function enviarCorreo($nombre, $email, $ciudad, $cpostal, $telefono, $tipoTrabajo,$descripcion){

    $to = 'fundeanuconstantin@gmail.com'; // Dirección de correo electrónico a la que se enviará el mensaje
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
       header("Location: presupuestos.php?error=$error");
        exit();
    }
}

function enviarCorreoUsuarioRegistrado($nombre, $email, $pwd) {
    $to = $email; // Dirección de correo electrónico del usuario registrado
    $subject = 'Su registro se ha realizado correctamente'; // Asunto del correo electrónico

    // Construir el cuerpo del mensaje
    $message = "Hola " . $nombre . ",\r\n\r\n";
    $message .= "Su presupuesto se ha registrado correctamente.\r\n";
    $message .= "Tus datos de acceso son:\r\n";
    $message .= "Usuario: " . $email . "\r\n";
    $message .= "Contraseña: " . $pwd. "\r\n\r\n";
	$message .= "Recuerde por su seguridad, cambiar la contraseña.\r\n\r\n";
    $message .= "Gracias por confiar en nosotros. ¡Bienvenido!\r\n";

    // Encabezados adicionales para el correo electrónico
    $headers = "From: info@electricidadfcv.com\r\n";
    $headers .= "Reply-To: info@electricidadfcv.com\r\n";
    $headers .= "MIME-Version: 1.0\r\n";
    $headers .= "Content-Type: text/plain; charset=UTF-8\r\n";

    // Enviar el correo electrónico
    $mailSent = mail($to, $subject, $message, $headers);

    if (!$mailSent) {        
       $error = "Hubo un error al enviar el correo electrónico: ";
       header("Location: presupuestos.php?error=$error");
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
 
 function mostrarPresupuestosEncontrados($nombreCliente, $tipoTrabajo,$fechaEmisionIni,$fechaEmisionFin,$estado) {
    require '../models/presupuesto_Model.php';
    $presupuestos = buscarPresupuestos($nombreCliente, $tipoTrabajo, $fechaEmisionIni,$fechaEmisionFin, $estado);
    include("../views/presupuestosList.php");
  }
 
  function mostrarPresupuestosOrdenadosCliente($orderBy, $orderDirection, $idUser) {
    require '../models/presupuesto_Model.php';
    $presupuestos = obtenerPresupuestosOrdenadosCliente($orderBy, $orderDirection, $idUser);
    include("../views/presupuestosListUser.php");
  }

  function mostrarPresupuestosEncontradosCliente($nombreCliente, $tipoTrabajo,$fechaEmisionIni,$fechaEmisionFin, $estado, $idUser) {
    require '../models/presupuesto_Model.php';
    $presupuestos = buscarPresupuestos($nombreCliente, $tipoTrabajo, $fechaEmisionIni,$fechaEmisionFin, $estado,$idUser);
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
        header("location:adminDashboard.php?error=$error");
        exit();
    }
        $rutaArchivo = $_FILES['adjunto']['tmp_name'];
        // Generar el nuevo nombre del archivo con el ID del presupuesto
        $nuevoNombreArchivo = $idPresu . '_' . $documento;
        // Ruta de destino para guardar el archivo
         $rutaDestino = 'presupuestos/' . $nuevoNombreArchivo;
    
        // Mover el archivo a la carpeta de destino
        move_uploaded_file($rutaArchivo, $rutaDestino);

    // Procesar los datos y actualizar la base de datos
    $modificado = modificaPresupuesto($idPresu, $fechaEmision, $importe, $fechaVencimiento, $numPresu, $documento, $estado);
    if($modificado){
        $mensaje='El presupuesto se ha editado correctamente';
        header("location:adminDashboard.php?mensaje=$mensaje");
        exit();
    }else{
      $error = 'Ha habido algún error en la inserción de los datos';
      header("location:adminDashboard.php?error=$error");
      exit();
    }
  
}

  function cambiarEstadoPresu($idPresu,$estado){
    require_once "../models/presupuesto_Model.php";   

    $aceptado = modificaEstadoPresu($idPresu,$estado);
   
    if($aceptado){
        $mensaje='El presupuesto se ha editado correctamente';
        header("location:adminDashboard.php?mensaje=$mensaje");
        exit();
    }else{
      $error = 'Ha habido algún error en la inserción de los datos';
      header("location:adminDashboard.php?error=$error");
      exit();
    }
  }
  
?>