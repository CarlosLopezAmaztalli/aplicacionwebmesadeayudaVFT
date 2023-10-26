<?php 
    session_start();
    $idUsuario = $_SESSION['usuario']['id'];
    $datos = array(
        'idSistema' => $_POST['idSistema'],
        'problema' => $_POST['problema'],
        'idUsuario' => $idUsuario
    );
    

    include "../../clases/Reportes.php";

    $Reportes = new Reportes();

    echo $Reportes->agregarReporteCliente($datos);
?>