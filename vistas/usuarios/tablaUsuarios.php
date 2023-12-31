<?php 
    include "../../clases/Conexion.php";
    $con = new Conexion();
    $conexion =$con->conectar();
    $sql="SELECT 
            usuarios.id_usuario AS idUsuario,
            usuarios.usuario AS nombreUsuario,
            roles.nombre AS rol,
            usuarios.id_rol AS idRol,
            usuarios.ubicacion AS ubicacion,
            usuarios.activo AS estatus,
            usuarios.id_persona AS idPersona,
            persona.nombre AS nombrePersona,
            persona.paterno AS paterno,
            persona.materno AS materno,
            persona.fecha_nacimiento AS fechaNacimiento,
            persona.genero AS genero,
            persona.correo AS correo,
            persona.telefono AS telefono
        FROM
            t_usuarios AS usuarios
                INNER JOIN
            t_cat_roles AS roles ON usuarios.id_rol = roles.id_rol
                INNER JOIN
            t_persona AS persona ON usuarios.id_persona = persona.id_persona;";
        $respuesta=mysqli_query($conexion, $sql);
        
?>

<table class="table table-sm dt-responsive nowrap" 
                    id="tablaUsuariosDataTable" style="width:100%">
<thead>
    <th>Apellido paterno</th>
    <th>Apellido materno</th>
    <th>Nombre</th>
    <th>Edad</th>
    <th>Telefono</th>
    <th>Correo</th>
    <th>Usuario</th>
    <th>Ubicacion</th>
    <th>Genero</th>
    <th>Reset Password</th>
    <th>Eliminar</th>
    <th>Editar</th>
    <th>Activar</th>
</thead>
<tbody>
    <?php 
        while($mostrar= mysqli_fetch_array($respuesta)){  
    ?>
    <tr>
        <td><?php echo $mostrar['paterno']; ?></td>
        <td><?php echo $mostrar['materno']; ?></td>
        <td><?php echo $mostrar['nombrePersona']; ?></td>
        <td><?php echo $mostrar['fechaNacimiento']; ?></td>
        <td><?php echo $mostrar['telefono']; ?></td>
        <td><?php echo $mostrar['correo']; ?></td>
        <td><?php echo $mostrar['nombreUsuario']; ?></td>
        <td><?php echo $mostrar['ubicacion']; ?></td>
         <td><?php echo $mostrar['genero']; ?></td>
        <td>
            <button class="btn btn-info btn-sm" 
            data-toggle="modal" data-target="#modalResetPassword"
            onclick="agregarIdUsuarioReset(<?php echo $mostrar['idUsuario']?>)">
                Cambiar password
            </button>
        </td> 
        <td> 
            <button class="btn btn-danger btn-sm" 
            onclick="eliminarUsuario(<?php echo $mostrar['idUsuario']; ?>, <?php echo $mostrar['idPersona']; ?> )">
                <span class="fas fa-user-times"></span>
            </button>
        </td>
        <td>
            <button class="btn btn-warning btn-sm" 
            data-toggle="modal"
             data-target="#modalActualizarUsuarios"
             onclick="obtenerDatosUsuario(<?php echo $mostrar['idUsuario']?>)">
                Editar
            </button>
        </td>
        <td>
            <?php  if($mostrar['estatus']==1){
                ?>
            <button class="btn btn-danger btn-sm" 
            onclick="cambioEstatusUsuario(<?php echo $mostrar['idUsuario']  ?>, <?php echo $mostrar['estatus']  ?>)">
                Desactivar Usuario
            </button>
            <?php }else if($mostrar['estatus']==0){
                ?>
                 <button class="btn btn-success btn-sm" 
            onclick="cambioEstatusUsuario(<?php echo $mostrar['idUsuario']  ?>, <?php echo $mostrar['estatus']  ?>)">
                Activar Usuario
            </button>
            
                <?php
            }
            ?>
        </td> 
        </tr>
        <?php } ?>
    </tbody>
</table>

<script>
$(document).ready(function(){
    $('#tablaUsuariosDataTable').DataTable({
            language : {
                url: "../publico/datatable/es-ES.json"
            }
            
        });
});
</script>