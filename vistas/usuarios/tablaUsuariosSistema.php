<?php 
    include "../../clases/Conexion.php";
    $con = new Conexion();
    $conexion =$con->conectar();
    $sql="SELECT * FROM mesaayuda.t_usuarios;";
    $respuesta=mysqli_query($conexion, $sql);
?>

<table class="table table-sm dt-responsive nowrap" 
                    id="tablaUsuariosSistemaDataTable" style="width:100%">
<thead>
    <th>id_usuario</th>
    <th>id_rol</th>
    <th>id_persona</th>
    <th>usuario</th>
    <th>password</th>
    <th>ubicacion</th>
    <th>activo</th>
    <th>fecha_insert</th>
</thead>
<tbody>
    <?php 
        while($mostrar= mysqli_fetch_array($respuesta)){  
    ?>
    <tr>
        <td><?php echo $mostrar['id_usuario']; ?></td>
        <td><?php echo $mostrar['id_rol']; ?></td>
        <td><?php echo $mostrar['id_persona']; ?></td>
        <td><?php echo $mostrar['usuario']; ?></td>
        <td><?php echo $mostrar['password']; ?></td>
        <td><?php echo $mostrar['ubicacion']; ?></td>
        <td><?php echo $mostrar['activo']; ?></td>
        <td><?php echo $mostrar['fecha_insert']; ?></td>
        </tr>
        <?php } ?>
    </tbody>
</table>

<script>
$(document).ready(function(){
    $('#tablaUsuariosSistemaDataTable').DataTable({
            language : {
                url: "../publico/datatable/es-ES.json"
            }
        });
});
</script>