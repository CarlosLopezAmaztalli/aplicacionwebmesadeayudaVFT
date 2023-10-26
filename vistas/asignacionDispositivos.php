<?php 
  include "header.php";
  if(isset($_SESSION['usuario']) && $_SESSION['usuario']['rol'] == 2 || $_SESSION['usuario']['rol'] == 3 ){
    include "../clases/Conexion.php";
    $con = new Conexion();
    $conexion = $con->conectar();

 ?>

<!-- Page Content -->
<div class="container">
  <div class="card border-0 shadow my-5">
    <div class="card-body p-5">
      <h1 class="fw-light">Asignación de equipos</h1>
      <p class="lead">
        <button class="btn btn-primary" data-toggle="modal" data-target="#modalAsignarEquipo">
          Asignar Dispositivo
        </button>
        <hr>
        <div id="tablaDispositivoLoad"></div>
      </p>
    </div>
    </div>
</div>
<?php
include "asignacion/modalAsignarDispositivo.php";

 include "footer.php";
 ?>
  <script src="../publico/js/asignacion/asignacionDispositivo.js"></script>

    <?php
}else{
  header("location:../index.html");
}
 ?>