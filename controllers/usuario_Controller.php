<?php



if(isset($_REQUEST['modifica'])){
  // Llamar al controlador para modificar presupuesto
  modificarDatosUsuario();
}

function mostrarUsuarios() {
    require '../models/usuario_Model.php';
    $usuarios = obtenerUsuarios();
    include("../views/usuariosList.php");
  }


  function mostrarUsuariosOrdenados($orderBy, $orderDirection) {
    require '../models/usuario_Model.php';
    $usuarios = obtenerUsuariosOrdenados($orderBy, $orderDirection);
    include("../views/usuariosList.php");
  }

  function mostrarUsuariosEncontrados($nombre, $estado) {
    require '../models/usuario_Model.php';
    $usuarios = buscarUsuarios($nombre, $estado);
    include("../views/usuariosList.php");
  }

  function mostrarUsuarioDetalle($idUser){
    require '../models/usuario_Model.php';
    $usuario = obtenerUsuarioDetalle($idUser);
    include("../views/gestionUsuarios.php");
  }
  function mostrarUsuarioDetalleCliente($idUser){
    require '../models/usuario_Model.php';
    $usuario = obtenerUsuarioDetalle($idUser);
    include("../views/gestionUsuarioCliente.php");
  }

  function modificarDatosUsuario(){
    require_once "../models/usuario_Model.php";
    if(isset($_REQUEST['estado']) && $_REQUEST['estado']== 'activo'){
      $estado = '1';
    }
    if(isset($_REQUEST['estado']) && $_REQUEST['estado'] == 'inactivo'){
      $estado = '2';
    }
    if(!isset($_REQUEST['estado'])){
      $estado = '1';
    }
    $nombre = $_REQUEST['nombre'];
    $ciudad = $_REQUEST['ciudad'];
    $email = $_REQUEST['email'];
    $telefono = $_REQUEST['telefono'];   
    $cpostal = $_REQUEST['cpostal'];
    $idUser = $_REQUEST['id'];


    // Procesar los datos y actualizar la base de datos
    $modificado = modificaCliente($idUser, $nombre, $ciudad, $email, $telefono, $cpostal, $estado);
    if($modificado){
        if($_REQUEST['rol'] == 'usuario'){
            $mensaje='El usuario se ha editado correctamente';
            header("location:../public/usuarioDashboard.php?mensaje=$mensaje");
            exit();
          }else{
            $mensaje='El usuario se ha editado correctamente';
            header("location:../public/adminDashboardUsuarios.php?mensaje=$mensaje");
            exit();
        }
    }else{
        if($_REQUEST['rol'] == 'usuario'){
          $error = 'Ha habido algún error en la inserción de los datos';
          header("location:../public/usuarioDashboard.php?error=$error");
          exit();
        }else{
          $error = 'Ha habido algún error en la inserción de los datos';
          header("location:../public/adminDashboardUsuarios.php?error=$error");
          exit();
        }
    }
  

  }
  
?>