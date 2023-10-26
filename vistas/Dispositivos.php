
<?php 
  include "header.php";
  if(isset($_SESSION['usuario']) && $_SESSION['usuario']['rol'] == 4){
    include "../clases/AsignacionEquipo.php";
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
                    equipo.id_equipo as idEquipo,
                    equipo.nombre as nombreEquipo,
                    asignado.id_asignacion_Equipo as idAsignacion,
                    asignado.marca AS marca,
                    asignado.modelo as modelo,
                    asignado.color as color,
                    asignado.descripcion as descripcion,
                    asignado.memoria as memoria,
                    asignado.disco_duro as discoDuro,
                    asignado.procesador as procesador,
                    equipo.descripcion as imagen
        FROM
        t_equipo_asignado AS asignado
                INNER JOIN
            t_persona AS persona ON asignado.id_persona = persona.id_persona
                INNER JOIN
            t_cat_equipo AS equipo ON asignado.id_equipo = equipo.id_equipo
                      AND asignado.id_persona = '$idPersona';";
        
        $respuesta= mysqli_query($conexion, $sql);

 ?>

<!-- Page Content -->
<div class="container">
  <div class="card border-0 shadow my-5">
    <div class="card-body p-5">
      <h1 class="fw-light">Equipos</h1>
      <p class="lead">
        <div class="row">
          <?php while ($mostrar = mysqli_fetch_array($respuesta)) {?>
          <div class="col-sm-4">
            <div class="card">
              <div class="card-body">
                <h4> <span class="<?php echo $mostrar['imagen'];?>"> </span>
              <?php echo $mostrar['nombreEquipo'];?>
            </h4>
                <p>
                  <?php echo $mostrar['descripcion'];?>
                </p>
                <ul>
                  <li>Marca: <?php echo $mostrar['marca'];?></li>
                  <li>Modelo: <?php echo $mostrar['modelo'];?></li>
                  <li>Color: <?php echo $mostrar['color'];?></li>
                  <li>Memoria: <?php echo $mostrar['memoria'];?></li>
                  <li>Disco Duro: <?php echo $mostrar['discoDuro'];?></li>
                  <li>Procesador: <?php echo $mostrar['procesador'];?></li>
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

