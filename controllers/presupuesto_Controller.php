<?php

require_once '../models/presupuesto_Model.php';

function procesarFormulario()
{
    // Obtener los datos del formulario
    $nombre = $_REQUEST['nombre'];
    $email = $_REQUEST['email'];
    $ciudad = $_REQUEST['ciudad'];
    $telefono = $_REQUEST['telefono'];
    $cpostal = $_REQUEST['cpostal'];
    $tipoTrabajo = $_REQUEST['tipo_trabajo'];
    $fechaActual = date('d-m-Y');
    $privacidad = $_REQUEST['privacidad'];

    // Validar los datos
    if (validarDatos($nombre, $email,$ciudad,$cpostal,$telefono,$tipoTrabajo)) {
        // Insertar en la base de datos
        if (insertarSolicitudPresupuesto($nombre, $email,$ciudad,$cpostal,$telefono,$tipoTrabajo,$fechaActual)) {
            // Redirigir a una página de éxito
            header('Location: success.php');
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

function validarDatos($nombre, $email,$ciudad,$cpostal,$telefono,$tipoTrabajo)
{
    // Realizar las validaciones necesarias
    // ...

    // Devolver true si los datos son válidos, false en caso contrario
    return true;
}

// Llamar al controlador para procesar el formulario
procesarFormulario();
