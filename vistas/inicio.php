
<?php 
  include "header.php";
  if(isset($_SESSION['usuario']) && $_SESSION['usuario']['rol'] == 1 || $_SESSION['usuario']['rol'] == 4){
    
    $idUsuario = $_SESSION['usuario']['id'];

 ?>


<!-- Page Content -->
<div class="container">
  <div class="card border-0 shadow my-5">
    <div class="card-body p-5">
      <h1 class="fw-light">Bienvenido <?php echo $_SESSION['usuario']['nombre']; ?></h1>
      <p class="lead">
        <div class="row">
          <div id="content" class="col-lg-12">
    <a class="btn btn-primary" href="../ventas.php"><i class="fa fa-download"></i> Descargar PDF</a>
          </div>
        </div>
        <hr>
        <div class="row">
          <div class="col-sm-4">Apellido paterno: <span id="paterno"></span></div>
          <div class="col-sm-4">Apellido materno: <span id="materno"></span></div>
          <div class="col-sm-4">Nombre: <span id="nombre"></span></div>
        </div>
        <div class="row">
          <div class="col-sm-4">Telefono: <span id="telefono"></span></div>
          <div class="col-sm-4">Correo: <span id="correo"></span></div>
          <div class="col-sm-4">Edad: <span id="edad"></span></div>
        </div>
        <hr>
        <div class="row">
        <div class="col-sm-4">Imagen del cliente: <span id="imagen"></span></div>
        </div>
      </p>
    </div>
  </div>
</div>


<?php
 include "footer.php";
?>
<script src="../publico/js/inicio/personales.js"></script>

<script>
  let idUsuario = '<?php echo $idUsuario; ?>';
  datosPersonalesInicio(idUsuario);
</script> 

<?php
}else{
  header("location:../index.html");
}
 ?>
 