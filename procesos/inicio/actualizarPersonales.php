<?php

    session_start();

    $idUsuario= $_SESSION['usuario']['id'];

    include "../../clases/Inicio.php";
    
    $datos = array(
        'paterno' => $_POST['paternoInicio'],
        'materno' => $_POST['maternoInicio'],
        'nombre' => $_POST['nombreInicio'],
        'telefono' => $_POST['telefonoInicio'],
        'correo' => $_POST['correoInicio'],
        'fecha' => $_POST['fechaNacInicio'],
        'imagen' => $_POST['imagenInicio'],
        'idUsuario' => $idUsuario
    );

    $Inicio = new Inicio();
    echo $Inicio->actualizarPersonales($datos);
?>
