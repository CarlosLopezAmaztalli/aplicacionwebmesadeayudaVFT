<?php 
    
    $datos= array(
        'idPersona' => $_POST['idPersona'],
    'idSistema' => $_POST['idSistema'],
    'aplicacion' => $_POST['aplicacion'],
    'funcion' => $_POST['funcion'],
    'direccion'=> $_POST['direccion'],
    'descripcion' => $_POST['descripcion'],
    'nombre' =>  $_POST['nombre'],
    'protocolo'=> $_POST['protocolo']
    );

    include "../../clases/Asignacion.php";
    $Asignacion = new Asignacion();
    echo $Asignacion->agregarAsignacion($datos);
    
?>