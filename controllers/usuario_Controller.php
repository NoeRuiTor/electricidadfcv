<?php

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
?>