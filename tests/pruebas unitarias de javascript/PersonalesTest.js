describe("Pruebas para actualizarDatosPersonales y obtenerDatosPersonalesInicio", function() {
    beforeEach(function() {
      // Configuración común antes de cada prueba, como cargar Jasmine, el DOM, etc.
    });
  
    afterEach(function() {
      // Limpieza común después de cada prueba
    });
  
    it("debería actualizar datos personales con éxito", function() {
      spyOn($, "ajax").and.callFake(function(options) {
        options.success("1");
      });
  
      spyOn(Swal, "fire"); // Espía el llamado a Swal.fire
      spyOn(window, "location").and.callFake(function() {});
  
      // Llamar a la función actualizarDatosPersonales
      actualizarDatosPersonales();
  
      // Verificar que se haya llamado a Swal.fire con los argumentos correctos
      expect(Swal.fire).toHaveBeenCalledWith(":)", "Actualizado con exito", "success");
      // Verificar que se haya llamado a location.reload
      expect(window.location).toHaveBeenCalled();
    });
  
    it("debería manejar un error al actualizar datos personales", function() {
      spyOn($, "ajax").and.callFake(function(options) {
        options.success("0");
      });
  
      spyOn(Swal, "fire"); // Espía el llamado a Swal.fire
  
      // Llamar a la función actualizarDatosPersonales
      actualizarDatosPersonales();
  
      // Verificar que se haya llamado a Swal.fire con los argumentos correctos
      expect(Swal.fire).toHaveBeenCalledWith(":/", "Error, no se pudo actualizar0", "error");
    });
  
    it("debería obtener datos personales con éxito", function() {
      spyOn($, "ajax").and.callFake(function(options) {
        options.success(JSON.stringify({
          paterno: "EjemploPaterno",
          materno: "EjemploMaterno",
          nombrePersona: "EjemploNombre",
          telefono: "EjemploTelefono",
          correo: "ejemplo@example.com",
          fechaNacimiento: "2000-01-01",
          imagen: "imagen.jpg"
        }));
      });
  
      // Llamar a la función obtenerDatosPersonalesInicio con un ID de usuario ficticio
      obtenerDatosPersonalesInicio(123);
  
      // Verificar que los campos se hayan llenado con los valores correctos
      expect($("#paternoInicio").val()).toBe("EjemploPaterno");
      expect($("#maternoInicio").val()).toBe("EjemploMaterno");
      expect($("#nombreInicio").val()).toBe("EjemploNombre");
      expect($("#telefonoInicio").val()).toBe("EjemploTelefono");
      expect($("#correoInicio").val()).toBe("ejemplo@example.com");
      expect($("#fechaNacInicio").val()).toBe("2000-01-01");
      expect($("#imagenInicio").val()).toBe("imagen.jpg");
    });
  
    it("debería manejar un error al obtener datos personales", function() {
      spyOn($, "ajax").and.callFake(function(options) {
        options.success("error_message"); // Simula un error en la respuesta
      });
  
      // Llamar a la función obtenerDatosPersonalesInicio con un ID de usuario ficticio
      obtenerDatosPersonalesInicio(456);
  
      // Verificar que los campos no se hayan llenado
      expect($("#paternoInicio").val()).toBe("");
      expect($("#maternoInicio").val()).toBe("");
      expect($("#nombreInicio").val()).toBe("");
      expect($("#telefonoInicio").val()).toBe("");
      expect($("#correoInicio").val()).toBe("");
      expect($("#fechaNacInicio").val()).toBe("");
      expect($("#imagenInicio").val()).toBe("");
    });
  });