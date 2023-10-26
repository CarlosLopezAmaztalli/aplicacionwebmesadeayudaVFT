<?php 
    $idAsignacion = $_POST['idAsignacion'];

    include "../../clases/AsignacionEquipo.php";
    $Asignacion = new Asignacion();

    echo $Asignacion->eliminarAsignacion($idAsignacion);

?>