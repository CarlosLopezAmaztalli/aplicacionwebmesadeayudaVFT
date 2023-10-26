
<?php
    session_start();
    include "../../clases/Conexion.php";
    $con = new Conexion();
    $conexion= $con->conectar();
    $idUsuario = $_SESSION['usuario']['id'];
    $contador = 1;
    $sql = "SELECT 
                reporte.id_reporte AS idReporte,
                reporte.id_usuario AS idUsuario,
                CONCAT(persona.paterno,
                        ' ',
                        persona.materno,
                        ' ',
                        persona.nombre) AS nombrePersona,
                sistema.id_sistema AS idSistema,
                sistema.nombre AS nombreSistema,
                reporte.descripcion_problema as problema,
                reporte.estatus as estatus,
                reporte.solucion_problema as solucion,
                reporte.fecha as fecha
            FROM
                t_reportes AS reporte
                    INNER JOIN
                t_usuarios AS usuario ON reporte.id_usuario = usuario.id_usuario
                    INNER JOIN
                t_persona AS persona ON usuario.id_persona = persona.id_persona
                    INNER JOIN
                t_cat_sistema AS sistema ON reporte.id_sistema = sistema.id_sistema
                ORDER BY reporte.fecha DESC;";
    $respuesta= mysqli_query($conexion, $sql);

?>

<table class="table table-sm table-bordered dt-responsive nowrap" 
                        style="width:100%" id="tablaReportesAdminDataTable">
    <thead>
        <th>#</th>
        <th>Persona</th>
        <th>Sistema</th>
        <th>Fecha</th>
        <th>Descripcion</th>
        <th>Estatus</th>
        <th>Solucion</th>
        <th>Eliminar</th>
    </thead>
    <tbody>
    <?php while ($mostrar = mysqli_fetch_array($respuesta)) {?>
        <tr>
            <td><?php echo $contador++; ?></td>
            <td><?php echo $mostrar['nombrePersona']; ?></td>
            <td><?php echo $mostrar['nombreSistema']; ?></td>
            <td><?php echo $mostrar['fecha']; ?></td>
            <td><?php echo $mostrar['problema']; ?></td>
            <td>
                <?php 
                    $estatus = $mostrar['estatus'];
                    $cadenaEstatus= '<span class="badge badge-danger">Abierto</span>';
                    if($estatus ==0){
                        $cadenaEstatus= '<span class="badge badge-success">Cerrado</span>';
                    }       
                    echo $cadenaEstatus;
                ?>
            </td>
            <td>
                <button class="btn btn-info btn-sm" 
                        onclick="obtenerDatosSolucion('<?php echo $mostrar['idReporte']; ?>')"
                        data-toggle="modal" data-target="#modalAgregarSolucionReporte">
                    Solucionar
                </button>
                <?php echo $mostrar['solucion']; ?>
            </td>
            <td>
                <?php 
                    if($mostrar['solucion'] == ""){
                ?>  
                <button class="btn btn-danger btn-sm" 
                        onclick="eliminarReporteAdmin(<?php echo $mostrar['idReporte'] ?>)">
                            Eliminar
                </button>
                <?php          
                    }                
                ?>
            </td>
        </tr>
    <?php  }  ?>
    </tbody>
</table>

<script>
    $(document).ready(function(){
        $('#tablaReportesAdminDataTable').DataTable({
            language : {
                url: "../publico/datatable/es-ES.json"
            },
            dom: 'Bfrtip',
            buttons : {
                buttons : [
                    {
                         extend : 'copy', 
                        className : 'btn btn-outline-info', 
                        text : '<i class="far fa-copy"></i> Copiar'
                    },
                    {
                         extend : 'csv', 
                        className : 'btn btn-outline-primary', 
                        text : '<li class="fas fa-file-csv"></li> CSV'
                    },
                    {
                         extend : 'excel', 
                        className : 'btn btn-outline-success', 
                        text : '<li class="fas fa-file-excel"></li> XLS'
                    },
                    {
                         extend : 'pdf', 
                        className : 'btn btn-outline-danger', 
                        text : '<li class="fas fa-file-pdf"></li> PDF'
                    },
                ],
                dom : {
                    button : {
                        classNme : 'btn'
                    }
                }
            }
        });
    });
</script>
