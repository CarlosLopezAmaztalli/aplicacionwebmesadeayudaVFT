describe("Pruebas para funciones relacionadas con usuarios", function() {
    beforeEach(function() {
      // Configuración común antes de cada prueba, como cargar Jasmine, el DOM, etc.
    });
  
    afterEach(function() {
      // Limpieza común después de cada prueba
    });
  
    it("debería cargar la tabla de usuarios al cargar el documento", function() {
      spyOn($.fn, "load"); // Espía el llamado a la función load de jQuery
  
      // Llamar a la función que se ejecuta en $(document).ready
      $(document).ready();
  
      // Verificar que se haya llamado a $.fn.load con las URLs correctas
      expect($.fn.load).toHaveBeenCalledWith("usuarios/tablaUsuarios.php");
      expect($.fn.load).toHaveBeenCalledWith("usuarios/tablaUsuariosSistema.php");
    });
  
    it("debería agregar un nuevo usuario con éxito", function() {
      spyOn($, "ajax").and.callFake(function(options) {
        options.success("1");
      });
  
      spyOn($.fn, "load"); // Espía el llamado a la función load de jQuery
      spyOn($.fn, "reset"); // Espía el llamado a la función reset del formulario
      spyOn(Swal, "fire"); // Espía el llamado a Swal.fire
  
      // Llamar a la función agregarNuevoUsuario
      var result = agregarNuevoUsuario();
  
      // Verificar que se haya llamado a $.fn.load con las URLs correctas
      expect($.fn.load).toHaveBeenCalledWith("usuarios/tablaUsuarios.php");
      // Verificar que se haya llamado a $.fn.reset
      expect($.fn.reset).toHaveBeenCalled();
      // Verificar que se haya llamado a Swal.fire con los argumentos correctos
      expect(Swal.fire).toHaveBeenCalledWith(":)", "El usuario fue agregado con exito", "success");
      // Verificar que la función retorne false
      expect(result).toBe(false);
    });
  
    it("debería manejar un error al agregar un nuevo usuario", function() {
      spyOn($, "ajax").and.callFake(function(options) {
        options.success("0");
      });
  
      spyOn(Swal, "fire"); // Espía el llamado a Swal.fire
  
      // Llamar a la función agregarNuevoUsuario
      agregarNuevoUsuario();
  
      // Verificar que se haya llamado a Swal.fire con los argumentos correctos
      expect(Swal.fire).toHaveBeenCalledWith(":/", "Ha sucedido un error, el usuario no se pudo agregar0", "error");
    });
  
    it("debería obtener los datos de un usuario", function() {
      spyOn($, "ajax").and.callFake(function(options) {
        // Simular una respuesta JSON con datos de usuario
        options.success('{"idUsuario": 1, "paterno": "Apellido", "materno": "Apellido2", "nombrePersona": "Usuario1", "fechaNacimiento": "2000-01-01", "genero": "M", "telefono": "1234567890", "correo": "usuario1@example.com", "nombreUsuario": "usuario1", "idRol": 2, "ubicacion": "Lugar"}');
      });
  
      // Llamar a la función obtenerDatosUsuario con un ID de usuario ficticio
      obtenerDatosUsuario(1);
  
      // Verificar que los campos del formulario se hayan llenado con los datos correctos
      expect($('#idUsuario').val()).toBe("1");
      expect($('#paternou').val()).toBe("Apellido");
      expect($('#maternou').val()).toBe("Apellido2");
      expect($('#nombreu').val()).toBe("Usuario1");
      expect($('#fechaNacimientou').val()).toBe("2000-01-01");
      expect($('#generou').val()).toBe("M");
      expect($('#telefonou').val()).toBe("1234567890");
      expect($('#correou').val()).toBe("usuario1@example.com");
      expect($('#usuariou').val()).toBe("usuario1");
      expect($('#idRolu').val()).toBe("2");
      expect($('#ubicacionu').val()).toBe("Lugar");
    });
  
    it("debería actualizar un usuario con éxito", function() {
      spyOn($, "ajax").and.callFake(function(options) {
        options.success("1");
      });
  
      spyOn($.fn, "load"); // Espía el llamado a la función load de jQuery
      spyOn($('#modalActualizarUsuarios'), "modal"); // Espía el llamado a modal del modal de actualización
      spyOn(Swal, "fire"); // Espía el llamado a Swal.fire
  
      // Llamar a la función actualizarUsuario
      var result = actualizarUsuario();
  
      // Verificar que se haya llamado a $.fn.load con la URL correcta
      expect($.fn.load).toHaveBeenCalledWith("usuarios/tablaUsuarios.php");
      // Verificar que se haya llamado a modal del modal de actualización
      expect($('#modalActualizarUsuarios').modal).toHaveBeenCalledWith('hide');
      // Verificar que se haya llamado a Swal.fire con los argumentos correctos
      expect(Swal.fire).toHaveBeenCalledWith(":)", "El usuario fue actualizado con exito", "success");
      // Verificar que la función retorne false
      expect(result).toBe(false);
    });
  
    it("debería manejar un error al actualizar un usuario", function() {
      spyOn($, "ajax").and.callFake(function(options) {
        options.success("0");
      });
  
      spyOn(Swal, "fire"); // Espía el llamado a Swal.fire
  
      // Llamar a la función actualizarUsuario
      actualizarUsuario();
  
      // Verificar que se haya llamado a Swal.fire con los argumentos correctos
      expect(Swal.fire).toHaveBeenCalledWith(":/", "Ha sucedido un error, el usuario no se pudo actualizar0", "error");
    });
  
    it("debería agregar un ID de usuario para restablecer la contraseña", function() {
      // Llamar a la función agregarIdUsuarioReset con un ID de usuario ficticio
      agregarIdUsuarioReset(42);
  
      // Verificar que el campo de ID de usuario se haya llenado con el valor correcto
      expect($('#idUsuarioReset').val()).toBe("42");
    });
  
    it("debería restablecer la contraseña con éxito", function() {
      spyOn($, "ajax").and.callFake(function(options) {
        options.success("1");
      });
  
      spyOn($('#modalResetPassword'), "modal"); // Espía el llamado a modal del modal de restablecimiento
      spyOn(Swal, "fire"); // Espía el llamado a Swal.fire
  
      // Llamar a la función resetPassword
      var result = resetPassword();
  
      // Verificar que se haya llamado a modal del modal de restablecimiento
      expect($('#modalResetPassword').modal).toHaveBeenCalledWith('hide');
      // Verificar que se haya llamado a Swal.fire con los argumentos correctos
      expect(Swal.fire).toHaveBeenCalledWith(":)", "La contraseña fue actualizada con exito", "success");
      // Verificar que la función retorne false
      expect(result).toBe(false);
    });
  
    it("debería manejar un error al restablecer la contraseña", function() {
      spyOn($, "ajax").and.callFake(function(options) {
        options.success("0");
      });
  
      spyOn(Swal, "fire"); // Espía el llamado a Swal.fire
  
      // Llamar a la función resetPassword
      resetPassword();
  
      // Verificar que se haya llamado a Swal.fire con los argumentos correctos
      expect(Swal.fire).toHaveBeenCalledWith(":/", "Ha sucedido un error, la contraseña no se pudo actualizar0", "error");
    });
  
    it("debería cambiar el estatus de un usuario con éxito", function() {
      spyOn($, "ajax").and.callFake(function(options) {
        options.success("1");
      });
  
      spyOn($.fn, "load"); // Espía el llamado a la función load de jQuery
      spyOn(Swal, "fire"); // Espía el llamado a Swal.fire
  
      // Llamar a la función cambioEstatusUsuario con un ID de usuario ficticio y un estatus ficticio
      cambioEstatusUsuario(42, "activo");
  
      // Verificar que se haya llamado a $.fn.load con la URL correcta
      expect($.fn.load).toHaveBeenCalledWith("usuarios/tablaUsuarios.php");
      // Verificar que se haya llamado a Swal.fire con los argumentos correctos
      expect(Swal.fire).toHaveBeenCalledWith(":)", "El estatus del usuario fue actualizado con exito", "success");
    });
  
    it("debería manejar un error al cambiar el estatus de un usuario", function() {
      spyOn($, "ajax").and.callFake(function(options) {
        options.success("0");
      });
  
      spyOn(Swal, "fire"); // Espía el llamado a Swal.fire
  
      // Llamar a la función cambioEstatusUsuario con un ID de usuario ficticio y un estatus ficticio
      cambioEstatusUsuario(42, "activo");
  
      // Verificar que se haya llamado a Swal.fire con los argumentos correctos
      expect(Swal.fire).toHaveBeenCalledWith(":/", "Ha sucedido un error, el estatus del usuario no se pudo actualizar0", "error");
    });
  
    it("debería eliminar un usuario con éxito", function() {
      spyOn(Swal, "fire"); // Espía el llamado a Swal.fire
  
      spyOn(Swal, "fire").and.callFake(function(options) {
        options.then(function(result) {
          if (result.isConfirmed) {
            spyOn($, "ajax").and.callFake(function(options) {
              options.success("1");
            });
  
            spyOn($.fn, "load"); // Espía el llamado a la función load de jQuery
  
            // Llamar a la función eliminarUsuario con IDs ficticios
            var result = eliminarUsuario(42, 1);
  
            // Verificar que se haya llamado a $.fn.load con la URL correcta
            expect($.fn.load).toHaveBeenCalledWith("usuarios/tablaUsuarios.php");
            // Verificar que se haya llamado a Swal.fire con los argumentos correctos
            expect(Swal.fire).toHaveBeenCalledWith(":)", "El usuario fue eliminado con exito", "warning");
          }
        });
      });
  
      // Llamar a la función eliminarUsuario con IDs ficticios
      eliminarUsuario(42, 1);
  
      // Verificar que se haya llamado a Swal.fire con los argumentos correctos
      expect(Swal.fire).toHaveBeenCalledWith({
        title: 'Estas seguro de eliminar este registro?',
        text: "Una vez eliminado no podra ser recuperado!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Si, seguro!'
      });
    });
  
    it("debería manejar un error al eliminar un usuario", function() {
      spyOn(Swal, "fire"); // Espía el llamado a Swal.fire
  
      spyOn(Swal, "fire").and.callFake(function(options) {
        options.then(function(result) {
          if (result.isConfirmed) {
            spyOn($, "ajax").and.callFake(function(options) {
              options.success("0");
            });
  
            // Llamar a la función eliminarUsuario con IDs ficticios
            eliminarUsuario(42, 1);
          }
        });
      });
  
      // Llamar a la función eliminarUsuario con IDs ficticios
      eliminarUsuario(42, 1);
  
      // Verificar que se haya llamado a Swal.fire con los argumentos correctos
      expect(Swal.fire).toHaveBeenCalledWith({
        title: 'Estas seguro de eliminar este registro?',
        text: "Una vez eliminado no podra ser recuperado!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Si, seguro!'
      });
    });
  });
  