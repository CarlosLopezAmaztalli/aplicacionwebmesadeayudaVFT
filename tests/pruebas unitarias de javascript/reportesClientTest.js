describe("Pruebas para funciones relacionadas con reportes de clientes", function() {
    beforeEach(function() {
      // Configuración común antes de cada prueba, como cargar Jasmine, el DOM, etc.
    });
  
    afterEach(function() {
      // Limpieza común después de cada prueba
    });
  
    it("debería cargar la tabla de reportes de clientes al cargar el documento", function() {
      spyOn($.fn, "load"); // Espía el llamado a la función load de jQuery
  
      // Llamar a la función que se ejecuta en $(document).ready
      $(document).ready();
  
      // Verificar que se haya llamado a $.fn.load con la URL correcta
      expect($.fn.load).toHaveBeenCalledWith("reportesCliente/tablaReporteCliente.php");
    });
  
    it("debería agregar un nuevo reporte con éxito", function() {
      spyOn($, "ajax").and.callFake(function(options) {
        options.success("1");
      });
  
      spyOn(Swal, "fire"); // Espía el llamado a Swal.fire
      spyOn($.fn, "load"); // Espía el llamado a la función load de jQuery
      spyOn($.fn, "reset"); // Espía el llamado a la función reset del formulario
  
      // Llamar a la función agregarNuevoReporte
      var result = agregarNuevoReporte();
  
      // Verificar que se haya llamado a $.fn.load con la URL correcta
      expect($.fn.load).toHaveBeenCalledWith("reportesCliente/tablaReporteCliente.php");
      // Verificar que se haya llamado a $.fn.reset
      expect($.fn.reset).toHaveBeenCalled();
      // Verificar que se haya llamado a Swal.fire con los argumentos correctos
      expect(Swal.fire).toHaveBeenCalledWith(":)", "El reporte fue creado con exito", "success");
      // Verificar que la función retorne false
      expect(result).toBe(false);
    });
  
    it("debería manejar un error al agregar un nuevo reporte", function() {
      spyOn($, "ajax").and.callFake(function(options) {
        options.success("0");
      });
  
      spyOn(Swal, "fire"); // Espía el llamado a Swal.fire
  
      // Llamar a la función agregarNuevoReporte
      agregarNuevoReporte();
  
      // Verificar que se haya llamado a Swal.fire con los argumentos correctos
      expect(Swal.fire).toHaveBeenCalledWith(":/", "Error, el reporte no fue creado0", "error");
    });
  
    it("debería eliminar un reporte de cliente con éxito", function() {
      spyOn(Swal, "fire").and.callFake(function(options) {
        // Llamar a la función que se pasa a then con un objeto de resultado simulado
        options.then({ isConfirmed: true });
      });
  
      spyOn($, "ajax").and.callFake(function(options) {
        options.success("1");
      });
  
      spyOn($.fn, "load"); // Espía el llamado a la función load de jQuery
  
      // Llamar a la función eliminarReporteCliente con un ID de reporte ficticio
      var result = eliminarReporteCliente(123);
  
      // Verificar que se haya llamado a $.fn.load con la URL correcta
      expect($.fn.load).toHaveBeenCalledWith("reportesCliente/tablaReporteCliente.php");
      // Verificar que la función retorne false
      expect(result).toBe(false);
    });
  
    it("debería manejar un error al eliminar un reporte de cliente", function() {
      spyOn(Swal, "fire").and.callFake(function(options) {
        // Llamar a la función que se pasa a then con un objeto de resultado simulado
        options.then({ isConfirmed: true });
      });
  
      spyOn($, "ajax").and.callFake(function(options) {
        options.success("0");
      });
  
      // Llamar a la función eliminarReporteCliente con un ID de reporte ficticio
      eliminarReporteCliente(456);
  
      // Verificar que se haya llamado a Swal.fire con los argumentos correctos
      expect(Swal.fire).toHaveBeenCalledWith(":/", "Error, el sistema no fue eliminado0", "error");
    });
  });
  