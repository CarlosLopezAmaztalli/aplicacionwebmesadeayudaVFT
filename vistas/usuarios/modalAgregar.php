<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Modal</title>
</head>
<body>
  
<!-- Modal -->
<form id="frmAgregarUsuario" method="POST" onsubmit="return agregarNuevoUsuario()" class="needs-validation" >
    <div class="modal fade" id="modalAgregarUsuarios" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Agregar a un nuevo usuario</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row">
            <div class="col-sm-4">
                <label for="paterno">Apellido paterno</label>
                <input type="text" class="form-control" id="paterno" name="paterno" required pattern="[a-zA-ZàáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð ,.'-]{2,64}">
                <div class="valid-feedback">!Ok valido!</div>
                <div class="invalid-feedback">Complete el campo.</div>
            </div>
            <div class="col-sm-4">
                <label for="materno">Apellido materno</label>
                <input type="text" class="form-control" id="materno" name="materno" required pattern="[a-zA-ZàáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð ,.'-]{2,64}">
                <div class="valid-feedback">!Ok valido!</div>
                <div class="invalid-feedback">Complete el campo.</div>
            </div>
            <div class="col-sm-4">
                <label for="nombre">Nombre</label>
                <input type="text" class="form-control" id="nombre" name="nombre" required pattern="[a-zA-ZàáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð ,.'-]{2,48}">
                <div class="valid-feedback">!Ok valido!</div>
                <div class="invalid-feedback">Complete el campo.</div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-4">
                <label for="fechaNacimiento">Fecha de nacimiento</label>
                <input type="date" class="form-control" id="fechaNacimiento" name="fechaNacimiento" required>
                <div class="valid-feedback">!Ok valido!</div>
                <div class="invalid-feedback">Complete el campo.</div>
            </div>
            <div class="col-sm-4">
                <label for="genero">Genero</label>
                <select class="form-control" id="genero" name="genero" required>
                    <option value=""></option>
                    <option value="F">Femenino</option>
                    <option value="M">Masculino</option>
                    <option value="M">prefiero no decirlo</option>
                    <div class="valid-feedback">!Ok valido!</div>
                <div class="invalid-feedback">Complete el campo.</div>
                </select>
            </div>
            <div class="col-sm-4">
                <label for="telefono">Telefono</label>
                <input maxlength="12" minlength="10" type="text" class="form-control" id="telefono" name="telefono" required pattern="[0-9]+">
                <div class="valid-feedback">!Ok valido!</div>
                <div class="invalid-feedback">Complete el campo.</div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-4">
                <label for="correo">Correo</label>
                <input type="mail" class="form-control" id="correo" name="correo" required pattern="^[a-zA-Z0-9.!#$%&’*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$">
                <div class="valid-feedback">!Ok valido!</div>
                <div class="invalid-feedback">Complete el campo.</div>
            </div>
            <div class="col-sm-4">
                <label for="usuario">Usuario</label>
                <input type="text" class="form-control" id="usuario" name="usuario" required pattern="^([a-z]+[0-9]{0,2}){5,12}$">
                <div class="valid-feedback">!Ok valido!</div>
                <div class="invalid-feedback">Complete el campo.</div>
            </div>
            <div class="col-sm-4">
                <label for="password">Password</label>
                <input type="text" class="form-control" id="password" name="password" required>
                <div class="valid-feedback">!Ok valido!</div>
                <div class="invalid-feedback">Complete el campo.</div>
            </div>
        </div>
        <div class="row">
          <div class="col-sm-12">
            <label for="idRol">Rol de usuario</label>
            <select name="idRol" id="idRol" class="form-control" required>
              <option value="1">Cliente</option>
              <option value="2">Administrador</option>
              <option value="3">Ingeniero</option>
              <option value="4">Director</option>
              <div class="valid-feedback">!Ok valido!</div>
                <div class="invalid-feedback">Complete el campo.</div>
            </select>
          </div>
        </div>
        <div class="row">
         <div class="col-sm-12">
           <label for="ubicacion">ubicación</label>
          <textarea name="ubicacion" id="ubicacion" class="form-control" required pattern="^([a-z]+[0-9]{0,2}){5,12}$"></textarea>
          <div class="valid-feedback">!Ok valido!</div>
                <div class="invalid-feedback">Complete el campo.</div>
         </div>
        </div>
      </div>
      <div class="modal-footer">
        <span class="btn btn-secondary" data-dismiss="modal">Cerrar</span>
        <button class="btn btn-primary">Agregar</button>
      </div>
    </div>
  </div>
</div>
</form>

<script src="../../publico/js/validaciones/validacion.js"></script>
</body>
</html>


