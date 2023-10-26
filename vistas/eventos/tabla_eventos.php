<?php 
    include "../../clases/Conexion.php";
    $con = new Conexion();
    $conexion = $con->conectar();
    $sql = "SELECT * FROM mesaayuda.t_eventos;";
        $respuesta = mysqli_query($conexion, $sql);
?>

<table class="table table-sm dt-responsive nowrap" 
                        style="width:100%" id="tabla_eventos_load">
    <thead>
        <tr>
            <th>Nombre</th>
            <th>Hora inicio</th>
            <th>Hora fin</th>
            <th>Fecha</th>
            <th>Imprimir</th>
            <th>Editar</th>
            <th>Eliminar</th>
        </tr>
    </thead>
    <tbody>
    <?php  while($key = mysqli_fetch_array($respuesta)) { ?>
        <tr>
            <td><?php echo $key['evento'] ?></td>
            <td><?php echo $key['hora_inicio'] ?></td>
            <td><?php echo $key['hora_fin'] ?></td>
            <td><?php echo $key['fecha'] ?></td>

            
            <td>
            <a class="btn btn-primary" href="../imprimir_evento.php"><i class="fa fa-download"></i> Descargar PDF</a>
            </td>
            
            <td>
                <span class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#modal_editar_evento" 
                    onclick="editarEvento('<?php echo $key['id_evento'] ?>')">
                    <i class="fa-solid fa-pen-to-square"></i>
                </span>
            </td>
            <td>
                <span class="btn btn-danger" onclick="eliminarEvento('<?php echo $key['id_evento'] ?>')">
                    <i class="fa-solid fa-calendar-xmark"></i>
                </span>
            </td>
        </tr>
        <?php } ?>
    </tbody>
</table>

<script>
    $(document).ready(function(){
        $('#tabla_eventos_load').DataTable({
            language : {
                url: "../../publico/datatable/es-ES.json"
            }
        });
    });
</script>