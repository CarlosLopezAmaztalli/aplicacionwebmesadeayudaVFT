describe("Pruebas de integración para asignación y eliminación de equipo", function() {
    it("debería asignar un equipo y luego eliminarlo con éxito", function() {
      // Simular una llamada Ajax exitosa para asignar un equipo
      spyOn($, "ajax").and.callFake(function(options) {
        options.success("1");
      });
  
      spyOn(Swal, "fire"); // Espía el llamado a Swal.fire
  
      // Llamar a la función de asignación y verificar el resultado
      var result = asignarEquipo();
  
      expect($('#frmAsignaEquipo')[0].reset).toHaveBeenCalled();
      expect($('#tablaDispositivoLoad').load).toHaveBeenCalledWith('asignacion/tablaAsignacionDispositivo.php');
      expect(Swal.fire).toHaveBeenCalledWith(":)", "Asignado el equipo con exito", "success");
  
      // Simular una confirmación exitosa para eliminar la asignación de equipo
      spyOn(Swal, "fire").and.callFake(function(options) {
        // Llamar a la función que se pasa a then con un objeto de resultado simulado
        options.then({ isConfirmed: true });
      });
  
      // Simular una llamada Ajax exitosa para eliminar la asignación de equipo
      spyOn($, "ajax").and.callFake(function(options) {
        options.success("1");
      });
  
      spyOn($('#tablaDispositivoLoad'), "load"); // Espía el llamado a load
  
      // Llamar a la función de eliminación y verificar el resultado
      result = eliminarAsignacion(123);
  
      expect($('#tablaDispositivoLoad').load).toHaveBeenCalledWith('asignacion/tablaAsignacionDispositivo.php');
      expect(Swal.fire).toHaveBeenCalledWith(":)", "Eliminado con exito", "success");
    });
  });