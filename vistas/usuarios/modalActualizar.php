<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Modal</title>
</head>
<body>
  
<!-- Modal -->
<form id="frmActualizarUsuario" method="POST" onsubmit="return actualizarUsuario()">
    <div class="modal fade" id="modalActualizarUsuarios" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Actualizar usuario</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <input type="text" id="idUsuario" name="idUsuario" hidden>
        <div class="row">
            <div class="col-sm-4">
                <label for="paternou">Apellido paterno</label>
                <input type="text" class="form-control" id="paternou" name="paternou" required pattern="[a-zA-ZàáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð ,.'-]{2,64}">
            </div>
            <div class="col-sm-4">
                <label for="maternou">Apellido materno</label>
                <input type="text" class="form-control" id="maternou" name="maternou" required pattern="[a-zA-ZàáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð ,.'-]{2,64}">
            </div>
            <div class="col-sm-4">
                <label for="nombreu">Nombre</label>
                <input type="text" class="form-control" id="nombreu" name="nombreu" required pattern="[a-zA-ZàáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð ,.'-]{2,48}">
            </div>
        </div>
        <div class="row">
            <div class="col-sm-4">
                <label for="fechaNacimientou">Fecha de nacimiento</label>
                <input type="date" class="form-control" id="fechaNacimientou" name="fechaNacimientou" required>
            </div>
            <div class="col-sm-4">
                <label for="generou">Genero</label>
                <select class="form-control" id="generou" name="generou" required>
                    <option value=""></option>
                    <option value="F">Femenino</option>
                    <option value="M">Masculino</option>
                    <option value="M">prefiero no decirlo</option>
                </select>
            </div>
            <div class="col-sm-4">
                <label for="telefonou">Telefono</label>
                <input maxlength="12" minlength="10" type="text" class="form-control" id="telefonou" name="telefonou" required pattern="[0-9]+">
            </div>
        </div>
        <div class="row">
            <div class="col-sm-4">
                <label for="correou">Correo</label>
                <input type="mail" class="form-control" id="correou" name="correou" required pattern="^[a-zA-Z0-9.!#$%&’*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$">
            </div>
            <div class="col-sm-4">
                <label for="usuariou">Usuario</label>
                <input type="text" class="form-control" id="usuariou" name="usuariou" required pattern="^([a-z]+[0-9]{0,2}){5,12}$">
            </div>
        </div>
        <div class="row">
          <div class="col-sm-12">
            <label for="idRolu">Rol de usuario</label>
            <select name="idRolu" id="idRolu" class="form-control" required>
              <option value="1">Cliente</option>
              <option value="2">Administrador</option>
              <option value="3">Ingeniero</option>
              <option value="4">Director</option>
            </select>
          </div>
        </div>
        <div class="row">
         <div class="col-sm-12">
           <label for="ubicacionu">ubicaciónes</label>
          <textarea name="ubicacionu" id="ubicacionu" class="form-control" required pattern="^([a-z]+[0-9]{0,2}){5,12}$"></textarea>
         </div>
        </div>
        <div class="row">
         <div class="col-sm-12">
           <label for="imagenu">Insertar imagen</label>
           <input type="file" type="file" id="selImg" name="selImg" class="form-control" 
                              onclick="actualizarImg()">
         </div>
        </div>
      </div>
      <div class="modal-footer">
        <button class="btn btn-warning">Actualizar</button>
      </div>
    </div>
  </div>
</div>
</form>
</body>
</html>



