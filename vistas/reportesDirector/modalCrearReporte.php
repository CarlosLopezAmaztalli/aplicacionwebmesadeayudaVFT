<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modal</title>
</head>
<body>
    
<!-- Modal -->
<form id="frmNuevoReporte" method="POST" onsubmit="return agregarNuevoReporte()">
<div class="modal fade" id="modalCrearReporte" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Nuevo reporte</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <label for="idSistema">Mis Equipos</label>

                <?php 
                    $idUsuario = $_SESSION['usuario']['id'];
                    $sql="SELECT 
                                asignacion.id_asignacion as idAsignacion,
                                sistema.id_sistema as idSistema,
                                sistema.nombre as nombreSistema
                            FROM
                                t_asignacion AS asignacion
                                    INNER JOIN
                                t_cat_sistema as sistema on asignacion.id_sistema= sistema.id_sistema
                            WHERE
                                asignacion.id_persona = (SELECT
                                                            id_persona
                                                        FROM
                                                            t_usuarios
                                                        WHERE
                                                            id_usuario ='$idUsuario');";
                    $respuesta = mysqli_query($conexion, $sql);
                ?>

                <select name="idSistema" id="idSistema" class="form-control" required>
                    <option value="">Selecciona un sistema</option>
                    <?php  while ($mostrar = mysqli_fetch_array($respuesta)) { ?>
                        <option value="<?php echo $mostrar['idSistema'] ?>"><?php echo $mostrar['nombreSistema'];?></option>
                    <?php  } ?>
                </select>
                <label for="problema">Describe tu problema</label>
                <textarea name="problema" id="problema" class="form-control" required pattern="^([a-z]+[0-9]{0,2}){5,12}$"></textarea>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                <button class="btn btn-primary">Crear</button>
            </div>
            </div>
  </div>
</div>
</form>
</body>
</html>