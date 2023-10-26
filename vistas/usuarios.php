<?php 
  include "header.php";
  if(isset($_SESSION['usuario']) && $_SESSION['usuario']['rol'] == 2 || $_SESSION['usuario']['rol'] == 3 ){
 ?>

<!-- Page Content -->
<div class="container">
  <div class="card border-0 shadow my-5">
    <div class="card-body p-5">
      <h1 class="fw-light">Administracion de usuarios</h1>
      <p class="lead">
       <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarUsuarios"> 
        Agregar Usuario
       </button>
       <hr>
       <div id="tablaUsuariosLoad"></div>
      </p>
  </div>
</div>

<?php

include "usuarios/modalAgregar.php";
include "usuarios/modalActualizar.php";
include "usuarios/modalResetPassword.php";
 include "footer.php";

 ?>
<script src="../publico/js/usuarios/usuarios.js"></script>

  <?php 
}else{
  header("location:../index.html");
}
 ?>