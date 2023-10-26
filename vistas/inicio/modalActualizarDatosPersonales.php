<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Modal</title>
</head>
<body>
<form id="frmActualizarDatosPersonales" method="POST" onsubmit="return actualizarDatosPersonales()">
    <!-- Modal -->
<div class="modal fade" id="modalActualizarDatosPersonales" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Actualizar datos personales</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <label for="paternoInicio">Apellido paterno</label>
        <input type="text" class="form-control" id="paternoInicio" name="paternoInicio" required pattern="[a-zA-ZàáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð ,.'-]{2,64}">
        <label for="maternoInicio">Apellido materno</label>
        <input type="text" class="form-control" id="maternoInicio" name="maternoInicio" required pattern="[a-zA-ZàáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð ,.'-]{2,64}">
        <label for="nombreInicio">Nombre</label>
        <input type="text" class="form-control" id="nombreInicio" name="nombreInicio" required pattern="[a-zA-ZàáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð ,.'-]{2,48}">
        <label for="telefonoInicio">Telefono</label>
        <input maxlength="12" minlength="10" type="text" class="form-control" id="telefonoInicio" name="telefonoInicio" required pattern="[0-9]+">
        <label for="correoInicio">Correo</label>
        <input type="mail" class="form-control" id="correoInicio" name="correoInicio" required pattern="^[a-zA-Z0-9.!#$%&’*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$">
        <label for="fechaNacInicio">Fecha de nacimiento</label>
        <input type="date" class="form-control" id="fechaNacInicio" name="fechaNacInicio" required>
        <label for="imagenInicio">Imagen: </label>
        <input type="date" class="form-control" id="imagenInicio" name="imagenInicio" required>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button class="btn btn-warning">Actualizar</button>
      </div>
    </div>
  </div>
</div>
</form>
</body>
</html>
