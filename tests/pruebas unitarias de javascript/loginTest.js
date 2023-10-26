describe("Pruebas para la función loginUsuario", function() {
    beforeEach(function() {
      // Configuración común antes de cada prueba, como cargar Jasmine, el DOM, etc.
    });
  
    afterEach(function() {
      // Limpieza común después de cada prueba
    });
  
    it("debería redirigir a 'vistas/inicio.php' al iniciar sesión como usuario regular", function() {
      spyOn($, "ajax").and.callFake(function(options) {
        options.success("1");
      });
  
      spyOn(window.location, "href").and.callFake(function(url) {
        // Simula el redireccionamiento
      });
  
      // Llamar a la función loginUsuario
      var result = loginUsuario();
  
      // Verificar que se haya redirigido a 'vistas/inicio.php'
      expect(window.location.href).toBe("vistas/inicio.php");
      // Verificar que la función retorne false
      expect(result).toBe(false);
    });
  
    it("debería redirigir a 'vistas/inicioAdmin.php' al iniciar sesión como administrador", function() {
      spyOn($, "ajax").and.callFake(function(options) {
        options.success("2");
      });
  
      spyOn(window.location, "href").and.callFake(function(url) {
        // Simula el redireccionamiento
      });
  
      // Llamar a la función loginUsuario
      var result = loginUsuario();
  
      // Verificar que se haya redirigido a 'vistas/inicioAdmin.php'
      expect(window.location.href).toBe("vistas/inicioAdmin.php");
      // Verificar que la función retorne false
      expect(result).toBe(false);
    });
  
    it("debería redirigir a 'vistas/inicioAdmin.php' al iniciar sesión como otro tipo de administrador", function() {
      spyOn($, "ajax").and.callFake(function(options) {
        options.success("3");
      });
  
      spyOn(window.location, "href").and.callFake(function(url) {
        // Simula el redireccionamiento
      });
  
      // Llamar a la función loginUsuario
      var result = loginUsuario();
  
      // Verificar que se haya redirigido a 'vistas/inicioAdmin.php'
      expect(window.location.href).toBe("vistas/inicioAdmin.php");
      // Verificar que la función retorne false
      expect(result).toBe(false);
    });
  
    it("debería redirigir a 'vistas/inicio.php' al iniciar sesión con otro valor de respuesta", function() {
      spyOn($, "ajax").and.callFake(function(options) {
        options.success("4");
      });
  
      spyOn(window.location, "href").and.callFake(function(url) {
        // Simula el redireccionamiento
      });
  
      // Llamar a la función loginUsuario
      var result = loginUsuario();
  
      // Verificar que se haya redirigido a 'vistas/inicio.php'
      expect(window.location.href).toBe("vistas/inicio.php");
      // Verificar que la función retorne false
      expect(result).toBe(false);
    });
  
    it("debería manejar un error y mostrar un mensaje de error al iniciar sesión", function() {
      spyOn($, "ajax").and.callFake(function(options) {
        options.success("0");
      });
  
      spyOn(Swal, "fire"); // Espía el llamado a Swal.fire
  
      // Llamar a la función loginUsuario
      loginUsuario();
  
      // Verificar que se haya llamado a Swal.fire con los argumentos correctos
      expect(Swal.fire).toHaveBeenCalledWith(":(", "Error al entrar!0", "error");
    });
  });
  