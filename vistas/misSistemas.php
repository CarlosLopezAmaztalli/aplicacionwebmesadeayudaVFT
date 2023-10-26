
<?php 
  include "header.php";
  if(isset($_SESSION['usuario']) && $_SESSION['usuario']['rol'] == 1){
    include "../clases/Asignacion.php";
    $con = new Conexion();
    $conexion= $con->conectar();
    $idUsuario = $_SESSION['usuario']['id'];
    $sql = "SELECT 
                  persona.id_persona as idPersona
              FROM
                  t_usuarios AS usuario
                      INNER JOIN
                  t_persona AS persona ON usuario.id_persona = persona.id_persona
                      AND usuario.id_usuario ='$idUsuario';";
    $respuesta= mysqli_query($conexion, $sql);
    $idPersona = mysqli_fetch_array($respuesta)[0];
     $sql= "SELECT 
                  persona.id_persona AS idPersona,
                  CONCAT(persona.paterno,
                          ' ',
                          persona.materno,
                          ' ',
                          persona.nombre) AS nombrePersona,
                  sistema.id_sistema AS idSistema,
                  sistema.nombre AS nombreSistema,
                  asignacion.id_asignacion AS idAsignacion,
                  asignacion.aplicacion AS aplicacion,
                  asignacion.funcion AS funcion,
                  asignacion.direccion AS direccion,
                  asignacion.descripcion AS descripcion,
                  asignacion.nombre AS nombre,
                  asignacion.protocolo AS protocolo,
                  sistema.descripcion as imagen
              FROM
                  t_asignacion AS asignacion
                      INNER JOIN
                  t_persona AS persona ON asignacion.id_persona = persona.id_persona
                      INNER JOIN
                  t_cat_sistema AS sistema ON asignacion.id_sistema = sistema.id_sistema
                      AND asignacion.id_persona = '$idPersona';";
        
        $respuesta= mysqli_query($conexion, $sql);

 ?>

<!-- Page Content -->
<div class="container">
  <div class="card border-0 shadow my-5">
    <div class="card-body p-5">
      <h1 class="fw-light">Mis sistemas</h1>
      <p class="lead">
        <div class="row">
          <?php while ($mostrar = mysqli_fetch_array($respuesta)) {?>
          <div class="col-sm-4">
            <div class="card">
              <div class="card-body">
                <h4> <span class="<?php echo $mostrar['imagen'];?>"></span><?php echo $mostrar['nombreSistema'];?></h4>
                <p>
                  <?php echo $mostrar['descripcion'];?>
                </p>
                <ul>
                  <li>Aplicacion: <?php echo $mostrar['aplicacion'];?></li>
                  <li>Funcion: <?php echo $mostrar['funcion'];?></li>
                  <li>Direccion: <?php echo $mostrar['direccion'];?></li>
                  <li>Nombre: <?php echo $mostrar['nombre'];?></li>
                  <li>Protocolo: <?php echo $mostrar['protocolo'];?></li>
                </ul>
              </div>
            </div>
          </div>
          <?php } ?>
        </div>
      </p>
    </div>
  </div>
</div>
<?php
 include "footer.php";
    
}else{
  header("location:../index.html");
}
 ?>

