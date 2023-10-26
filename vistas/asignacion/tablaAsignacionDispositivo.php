<?php
include "../../clases/Conexion.php";
$turn = new Conexion();
$conex = $turn->conectar();

    $sql = "SELECT 
            personas.id_persona as idPersona,
            CONCAT(personas.paterno,
                    ' ',
                    personas.materno,
                    ' ',
                    personas.nombre) AS nombrePersona,
                    equipo.id_equipo as idEquipo,
                    equipo.nombre as nombreEquipo,
                    asignado.id_asignacion_Equipo as idAsignacionEquipo,
                    asignado.marca AS marca,
                    asignado.modelo as modelo,
                    asignado.color as color,
                    asignado.descripcion as descripcion,
                    asignado.memoria as memoria,
                    asignado.disco_duro as discoDuro,
                    asignado.procesador as procesador
        FROM
        t_equipo_asignado AS asignado
                INNER JOIN
            t_persona AS personas ON asignado.id_persona = personas.id_persona
                INNER JOIN
            t_cat_equipo AS equipo ON asignado.id_equipo = equipo.id_equipo;";
       $respuesta = mysqli_query($conex, $sql);

?>

<table class="table table-sm dt-responsive nowrap" 
                        style="width:100%" id = "tablaAsignacionDispositivoDataTable">

    <thead>
        <th>Persona</th>
        <th>Equipo</th>
        <th>Marca</th>
        <th>Modelo</th>
        <th>Color</th>
        <th>Descripcion</th>
        <th>Memoria</th>
        <th>Disco Duro</th>
        <th>Procesador</th>
        <th>Eliminar</th>
    </thead>
    <tbody>
        <?php  while($mostrar = mysqli_fetch_array($respuesta)) { ?>
        <tr>
            <td><?php  echo $mostrar['nombrePersona']?></td>
            <td><?php  echo $mostrar['nombreEquipo']?></td>
            <td><?php  echo $mostrar['marca']?></td>
            <td><?php  echo $mostrar['modelo']?></td>
            <td><?php  echo $mostrar['color']?></td>
            <td><?php  echo $mostrar['descripcion']?></td>
            <td><?php  echo $mostrar['memoria']?></td>
            <td><?php  echo $mostrar['discoDuro']?></td>
            <td><?php  echo $mostrar['procesador']?></td>
            <td>
                <button class="btn btn-danger btn-sm" 
                    onclick="eliminarAsignacion(<?php echo $mostrar['idAsignacionEquipo']?>)">
                    Eliminar
                </button>
            </td>
        </tr>
        <?php } ?>
    </tbody>
</table>

<script>
    $(document).ready(function(){
        table=
    
        $('#tablaAsignacionDispositivoDataTable').DataTable({
            language : {
                url: "../publico/datatable/es-ES.json"
            }
        });
    });
</script>



