<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Modal</title>
</head>
<body>
<!-- Modal -->
<form id="frmAsignaSistema" method="POST" onsubmit="return asignarSistema()">
<div class="modal fade" id="modalAsignarSistema" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Asignar sistema</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row">
            <div class="col-sm-6">
                <label>Nombre de persona</label>
                  <?php 
                  $sql="SELECT 
                                      persona.id_persona,
                                      CONCAT(persona.paterno,
                                              ' ',
                                              persona.materno,
                                              ' ',
                                              persona.nombre) AS nombre
                                  FROM
                                      t_persona AS persona
                                          INNER JOIN
                                      t_usuarios AS usuario ON persona.id_persona = usuario.id_persona
                                          AND usuario.id_rol = 1
                                  ORDER BY persona.paterno;";
                              $respuesta= mysqli_query($conexion, $sql);
                  ?>
              
                <select name="idPersona" id="idPersona" class="form-control" required>
                    <option value="">Selecciona una opcion</option>
                    <?php while($mostrar= mysqli_fetch_array($respuesta)){ ?>
                      <option value="<?php echo $mostrar['id_persona']; ?>"> <?php echo $mostrar['nombre']; ?></option>
                    <?php   }    ?>
                </select>
            </div>
            <div class="col-sm-6">
                <label>Tipo de sistema</label>

                  <?php  
                   $sql = "SELECT  id_sistema, nombre FROM t_cat_sistema ORDER BY nombre";
                   $respuesta= mysqli_query($conexion, $sql);
                  ?>

                <select name="idSistema" id="idSistema" class="form-control" required>
                    <option value="">Selecciona una opcion</option>
                    <?php  while($mostrar =mysqli_fetch_array($respuesta)) {?>
                      <option value="<?php echo $mostrar['id_sistema']; ?>"><?php echo $mostrar['nombre']; ?></option>

                      <?php   }    ?>
                </select>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-4">
                <label for="aplicacion">Aplicacion</label>
                <input type="text" name="aplicacion" id="aplicacion" class="form-control" required pattern="[a-zA-ZàáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð ,.'-]{2,48}">
            </div>
            <div class="col-sm-4">
                <label for="funcion">Funcion del sistema</label>
                <input type="text" name="funcion" id="funcion" class="form-control" required pattern="[a-zA-ZàáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð ,.'-]{2,48}">
            </div>
            <div class="col-sm-4">
                <label for="direccion">Direccion alojamiento</label>
                <input type="text" name="direccion" id="direccion" class="form-control" required pattern="^([a-z]+[0-9]{0,2}){5,12}$">
            </div>
        </div>
        <div class="row">
             <div class="col-sm-12">
                    <label for="descripcion">Descripcion</label>
                    <textarea name="descripcion" id="descripcion" class="form-control" required pattern="^([a-z]+[0-9]{0,2}){5,12}$"></textarea>
             </div>
        </div>
        <div class="row">
            <div class="col-sm-4">
                <label for="nombre">Nombre</label>
                <input type="text" name="nombre" id="nombre" class="form-control" required pattern="[a-zA-ZàáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð ,.'-]{2,48}">
            </div>
            <div class="col-sm-4">
                <label for="protocolo">protocolo</label>
                <input type="text" name="protocolo" id="protocolo" class="form-control" required pattern="^([a-z]+[0-9]{0,2}){5,12}$">
            </div>
        </div>
      </div>
      <div class="modal-footer"> 
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button class="btn btn-primary">Asignar</button>
      </div>
    </div>
  </div>
</div>
</form>
</body>
</html>
