describe("Pruebas para funciones relacionadas con reportes administrativos", function() {
    beforeEach(function() {
      // Configuración común antes de cada prueba, como cargar Jasmine, el DOM, etc.
    });
  
    afterEach(function() {
      // Limpieza común después de cada prueba
    });
  
    it("debería cargar la tabla de reportes administrativos al cargar el documento", function() {
      spyOn($.fn, "load"); // Espía el llamado a la función load de jQuery
  
      // Llamar a la función que se ejecuta en $(document).ready
      $(document).ready();
  
      // Verificar que se haya llamado a $.fn.load con la URL correcta
      expect($.fn.load).toHaveBeenCalledWith("reportesAdmin/tablaReportesAdmin.php");
    });
  
    it("debería eliminar un reporte administrativo con éxito", function() {
      spyOn(Swal, "fire").and.callFake(function(options) {
        // Llamar a la función que se pasa a then con un objeto de resultado simulado
        options.then({ isConfirmed: true });
      });
  
      spyOn($, "ajax").and.callFake(function(options) {
        options.success("1");
      });
  
      spyOn($.fn, "load"); // Espía el llamado a la función load de jQuery
  
      // Llamar a la función eliminarReporteAdmin con un ID de reporte ficticio
      var result = eliminarReporteAdmin(123);
  
      // Verificar que se haya llamado a $.fn.load con la URL correcta
      expect($.fn.load).toHaveBeenCalledWith("reportesCliente/tablaReporteCliente.php");
      // Verificar que la función retorne false
      expect(result).toBe(false);
    });
  
    it("debería manejar un error al eliminar un reporte administrativo", function() {
      spyOn(Swal, "fire").and.callFake(function(options) {
        // Llamar a la función que se pasa a then con un objeto de resultado simulado
        options.then({ isConfirmed: true });
      });
  
      spyOn($, "ajax").and.callFake(function(options) {
        options.success("0");
      });
  
      // Llamar a la función eliminarReporteAdmin con un ID de reporte ficticio
      eliminarReporteAdmin(456);
  
      // Verificar que se haya llamado a Swal.fire con los argumentos correctos
      expect(Swal.fire).toHaveBeenCalledWith(":/", "Error, el sistema no fue eliminado0", "error");
    });
  
    it("debería obtener datos de solución de un reporte administrativo con éxito", function() {
      spyOn($, "ajax").and.callFake(function(options) {
        options.success(JSON.stringify({
          idReporte: 123,
          solucion: "EjemploSolucion",
          estatus: "EjemploEstatus"
        }));
      });
  
      // Llamar a la función obtenerDatosSolucion con un ID de reporte ficticio
      obtenerDatosSolucion(123);
  
      // Verificar que los campos se hayan llenado con los valores correctos
      expect($("#idReporte").val()).toBe("123");
      expect($("#solucion").val()).toBe("EjemploSolucion");
      expect($("#estatus").val()).toBe("EjemploEstatus");
    });
  
    it("debería manejar un error al obtener datos de solución de un reporte administrativo", function() {
      spyOn($, "ajax").and.callFake(function(options) {
        options.success("error_message"); // Simula un error en la respuesta
      });
  
      // Llamar a la función obtenerDatosSolucion con un ID de reporte ficticio
      obtenerDatosSolucion(456);
  
      // Verificar que los campos no se hayan llenado
      expect($("#idReporte").val()).toBe("");
      expect($("#solucion").val()).toBe("");
      expect($("#estatus").val()).toBe("");
    });
  
    it("debería agregar una solución de reporte administrativo con éxito", function() {
      spyOn($, "ajax").and.callFake(function(options) {
        options.success("1");
      });
  
      spyOn(Swal, "fire").and.callFake(function(options) {
        // Llamar a la función que se pasa a then con un objeto de resultado simulado
        options.then({ isConfirmed: true });
      });
  
      spyOn($.fn, "load"); // Espía el llamado a la función load de jQuery
  
      // Llamar a la función agregarSolucionReporte
      var result = agregarSolucionReporte();
  
      // Verificar que se haya llamado a $.fn.load con la URL correcta
      expect($.fn.load).toHaveBeenCalledWith("reportesAdmin/tablaReportesAdmin.php");
      // Verificar que se haya llamado a Swal.fire con los argumentos correctos
      expect(Swal.fire).toHaveBeenCalledWith(":)", "Agregado con exito", "success");
      // Verificar que la función retorne false
      expect(result).toBe(false);
    });
  
    it("debería manejar un error al agregar una solución de reporte administrativo", function() {
      spyOn($, "ajax").and.callFake(function(options) {
        options.success("0");
      });
  
      spyOn(Swal, "fire"); // Espía el llamado a Swal.fire
  
      // Llamar a la función agregarSolucionReporte
      agregarSolucionReporte();
  
      // Verificar que se haya llamado a Swal.fire con los argumentos correctos
      expect(Swal.fire).toHaveBeenCalledWith(":/", "Fallo el agregado0", "error");
    });
  });