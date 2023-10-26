<?php 
  include "header.php";
  if(isset($_SESSION['usuario']) && $_SESSION['usuario']['rol'] == 4 ){      
    include "../clases/Conexion.php";
    $con = new Conexion();
    $conexion = $con->conectar();
 ?>

<!-- Page Content -->
<div class="container">
  <div class="card border-0 shadow my-5">
    <div class="card-body p-5">
      <h1 class="fw-light">Consulta de datos del sistema de mesa de ayuda</h1>
      <p class="lead">
       <hr>
       <h1>Datos de Asignaciones</h1>
       <table border="2">
        <tr>
            <td>id_asignacion</td>
            <td>id_persona</td>
            <td>id_sistema</td>
            <td>aplicacion</td>
            <td>funcion</td>
            <td>direccion</td>
            <td>descripcion</td>
            <td>nombre</td>
            <td>protocolo</td>
        </tr>
        <?php
            $sql="SELECT * FROM mesaayuda.t_asignacion;";
            $result=mysqli_query($conexion,$sql);
            while($mostrar=mysqli_fetch_array($result)){
        ?>
        <tr>
            <td><?php echo $mostrar['id_asignacion']  ?></td>
            <td><?php echo $mostrar['id_persona']  ?></td>
            <td><?php echo $mostrar['id_sistema']  ?></td>
            <td><?php echo $mostrar['aplicacion']  ?></td>
            <td><?php echo $mostrar['funcion']  ?></td>
            <td><?php echo $mostrar['direccion']  ?></td>
            <td><?php echo $mostrar['descripcion']  ?></td>
            <td><?php echo $mostrar['nombre']  ?></td>
            <td><?php echo $mostrar['protocolo']  ?></td>
        </tr>
    <?php
    }
    ?>
       </table>
      </p>
      <p class="lead">
       <hr>
       <h1>Datos de roles de usuarios</h1>
       <table border="2">
        <tr>
            <td>id_rol</td>
            <td>nombre</td>
            <td>descripcion</td>
        </tr>
        <?php
            $sql="SELECT * FROM mesaayuda.t_cat_roles;";
            $result=mysqli_query($conexion,$sql);
            while($mostrar=mysqli_fetch_array($result)){
        ?>
        <tr>
            <td><?php echo $mostrar['id_rol']  ?></td>
            <td><?php echo $mostrar['nombre']  ?></td>
            <td><?php echo $mostrar['descripcion']  ?></td>
        </tr>
    <?php
    }
    ?>
       </table>
      </p>
      <p class="lead">
       <hr>
       <h1>Datos de los sistemas del negocio</h1>
       <table border="2">
        <tr>
            <td>id_sistema</td>
            <td>nombre</td>
            <td>descripcion</td>
        </tr>
        <?php
            $sql="SELECT * FROM mesaayuda.t_cat_sistema;";
            $result=mysqli_query($conexion,$sql);
            while($mostrar=mysqli_fetch_array($result)){
        ?>
        <tr>
            <td><?php echo $mostrar['id_sistema']  ?></td>
            <td><?php echo $mostrar['nombre']  ?></td>
            <td><?php echo $mostrar['descripcion']  ?></td>
        </tr>
    <?php
    }
    ?>
       </table>
      </p>
      <p class="lead">
       <hr>
       <h1>Datos de los reportes</h1>
       <table border="2">
        <tr>
            <td>id_reporte</td>
            <td>id_usuario</td>
            <td>id_sistema</td>
            <td>id_usuario_tecnico</td>
            <td>descripcion_problema</td>
            <td>solucion_problema</td>
            <td>estatus</td>
            <td>fecha</td>
        </tr>
        <?php
            $sql="SELECT * FROM mesaayuda.t_reportes;";
            $result=mysqli_query($conexion,$sql);
            while($mostrar=mysqli_fetch_array($result)){
        ?>
        <tr>
            <td><?php echo $mostrar['id_reporte']  ?></td>
            <td><?php echo $mostrar['id_usuario']  ?></td>
            <td><?php echo $mostrar['id_sistema']  ?></td>
            <td><?php echo $mostrar['id_usuario_tecnico']  ?></td>
            <td><?php echo $mostrar['descripcion_problema']  ?></td>
            <td><?php echo $mostrar['solucion_problema']  ?></td>
            <td><?php echo $mostrar['estatus']  ?></td>
            <td><?php echo $mostrar['fecha']  ?></td>
        </tr>
    <?php
    }
    ?>
       </table>
      </p>
      <p class="lead">
       <hr>
       <h1>Datos de las personas</h1>
       <table border="2">
        <tr>
            <td>id_persona</td>
            <td>paterno</td>
            <td>materno</td>
            <td>nombre</td>
            <td>fecha_nacimiento</td>
            <td>genero</td>
            <td>telefono</td>
            <td>correo</td>
            <td>fechaInsert</td>
        </tr>
        <?php
            $sql="SELECT * FROM mesaayuda.t_persona;";
            $result=mysqli_query($conexion,$sql);
            while($mostrar=mysqli_fetch_array($result)){
        ?>
        <tr>
            <td><?php echo $mostrar['id_persona']  ?></td>
            <td><?php echo $mostrar['paterno']  ?></td>
            <td><?php echo $mostrar['materno']  ?></td>
            <td><?php echo $mostrar['nombre']  ?></td>
            <td><?php echo $mostrar['fecha_nacimiento']  ?></td>
            <td><?php echo $mostrar['genero']  ?></td>
            <td><?php echo $mostrar['telefono']  ?></td>
            <td><?php echo $mostrar['correo']  ?></td>
            <td><?php echo $mostrar['fechaInsert']  ?></td>
        </tr>
    <?php
    }
    ?>
       </table>
      </p>
      <p class="lead">
       <hr>
       <h1>Datos de los usuarios gestionados</h1>
       <table border="2">
        <tr>
            <td>id_usuario</td>
            <td>id_rol</td>
            <td>id_persona</td>
            <td>usuario</td>
            <td>password</td>
            <td>ubicacion</td>
            <td>activo</td>
            <td>correo</td>
            <td>fecha_insert</td>
        </tr>
        <?php
            $sql="SELECT * FROM mesaayuda.t_usuarios;";
            $result=mysqli_query($conexion,$sql);
            while($mostrar=mysqli_fetch_array($result)){
        ?>
        <tr>
            <td><?php echo $mostrar['id_usuario']  ?></td>
            <td><?php echo $mostrar['id_rol']  ?></td>
            <td><?php echo $mostrar['id_persona']  ?></td>
            <td><?php echo $mostrar['usuario']  ?></td>
            <td><?php echo $mostrar['password']  ?></td>
            <td><?php echo $mostrar['ubicacion']  ?></td>
            <td><?php echo $mostrar['activo']  ?></td>
            <td><?php echo $mostrar['fecha_insert']  ?></td>
        </tr>
    <?php
    }
    ?>
       </table>
      </p>
      <p class="lead">
       <hr>
       <h1>Datos de los eventos gestionados</h1>
       <table border="2">
        <tr>
            <td>id_evento</td>
            <td>id_usuario</td>
            <td>evento</td>
            <td>hora_inicio</td>
            <td>hora_fin</td>
            <td>fecha</td>
        </tr>
        <?php
            $sql="SELECT * FROM mesaayuda.t_eventos;";
            $result=mysqli_query($conexion,$sql);
            while($mostrar=mysqli_fetch_array($result)){
        ?>
        <tr>
            <td><?php echo $mostrar['id_evento']  ?></td>
            <td><?php echo $mostrar['id_usuario']  ?></td>
            <td><?php echo $mostrar['evento']  ?></td>
            <td><?php echo $mostrar['hora_inicio']  ?></td>
            <td><?php echo $mostrar['hora_fin']  ?></td>
            <td><?php echo $mostrar['fecha']  ?></td>
        </tr>
    <?php
    }
    ?>
       </table>
      </p>
  </div>
</div>

<?php

 include "footer.php";

 ?>

  <?php 
}else{
  header("location:../index.html");
}
 ?>