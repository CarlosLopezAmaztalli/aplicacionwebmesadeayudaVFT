<?php
    include "../../clases/Conexion.php";
    $con = new Conexion();
    $conexion = $con->conectar();
    $sql = "SELECT 
            persona.id_persona as idPersona,
            CONCAT(persona.paterno,
                    ' ',
                    persona.materno,
                    ' ',
                    persona.nombre) AS nombrePersona,
                    sistema.id_sistema as idSistema,
                    sistema.nombre as nombreSistema,
                    asignacion.id_asignacion as idAsignacion,
                    asignacion.aplicacion AS aplicacion,
                    asignacion.funcion as funcion,
                    asignacion.direccion as direccion,
                    asignacion.descripcion as descripcion,
                    asignacion.nombre as nombre,
                    asignacion.protocolo as protocolo
        FROM
            t_asignacion AS asignacion
                INNER JOIN
            t_persona AS persona ON asignacion.id_persona = persona.id_persona
                INNER JOIN
            t_cat_sistema AS sistema ON asignacion.id_sistema = sistema.id_sistema;";
        $respuesta = mysqli_query($conexion, $sql);

?>

<table class="table table-sm dt-responsive nowrap" 
                        style="width:100%" id = "tablaAsignacionDataTable">

    <thead>
        <th>Persona</th>
        <th>Sistema</th>
        <th>Aplicacion</th>
        <th>Funcion</th>
        <th>Direccion</th>
        <th>Descripcion</th>
        <th>Nombre</th>
        <th>Protocolo</th>
        <th>Eliminar</th>
    </thead>
    <tbody>
        <?php  while($mostrar = mysqli_fetch_array($respuesta)) { ?>
        <tr>
            <td><?php  echo $mostrar['nombrePersona']?></td>
            <td><?php  echo $mostrar['nombreSistema']?></td>
            <td><?php  echo $mostrar['aplicacion']?></td>
            <td><?php  echo $mostrar['funcion']?></td>
            <td><?php  echo $mostrar['direccion']?></td>
            <td><?php  echo $mostrar['descripcion']?></td>
            <td><?php  echo $mostrar['nombre']?></td>
            <td><?php  echo $mostrar['protocolo']?></td>
            <td>
                <button class="btn btn-danger btn-sm" 
                    onclick="eliminarAsignacion(<?php echo $mostrar['idAsignacion']?>)">
                    Eliminar
                </button>
            </td>
        </tr>
        <?php } ?>
    </tbody>
</table>

<script>
    $(document).ready(function(){
        $('#tablaAsignacionDataTable').DataTable({
            language : {
                url: "../publico/datatable/es-ES.json"
            }
        });
    });
</script>