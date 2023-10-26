describe("Pruebas para asignarSistema", function() {
  it("debería asignar un sistema con éxito", function() {
    // Simular una llamada Ajax exitosa
    spyOn($, "ajax").and.callFake(function(options) {
      options.success("1");
    });

    spyOn(Swal, "fire"); // Espía el llamado a Swal.fire

    // Llamar a la función y verificar el resultado
    var result = asignarSistema();

    expect($('#frmAsignaSistema')[0].reset).toHaveBeenCalled();
    expect($('#tablaAsignacionesLoad').load).toHaveBeenCalledWith('asignacion/tablaAsignacion.php');
    expect(Swal.fire).toHaveBeenCalledWith(":)", "Asignado el sistema con exito", "success");
    expect(result).toBe(false); // Verifica que la función retorne false
  });

  it("debería manejar un error en la asignación", function() {
    // Simular una llamada Ajax que devuelve un error
    spyOn($, "ajax").and.callFake(function(options) {
      options.success("0");
    });

    spyOn(Swal, "fire"); // Espía el llamado a Swal.fire

    // Llamar a la función y verificar el manejo del error
    var result = asignarSistema();

    expect(Swal.fire).toHaveBeenCalledWith(":/", "Error, el sistema no fue asignado0", "error");
    expect(result).toBe(false); // Verifica que la función retorne false
  });
});

describe("Pruebas para eliminarAsignacion", function() {
  it("debería eliminar una asignación con éxito", function() {
    // Simular una confirmación exitosa
    spyOn(Swal, "fire").and.callFake(function(options) {
      // Llamar a la función que se pasa a then con un objeto de resultado simulado
      options.then({ isConfirmed: true });
    });

    // Simular una llamada Ajax exitosa
    spyOn($, "ajax").and.callFake(function(options) {
      options.success("1");
    });

    spyOn($('#tablaAsignacionesLoad'), "load"); // Espía el llamado a load

    // Llamar a la función y verificar el resultado
    var result = eliminarAsignacion(123);

    expect($('#tablaAsignacionesLoad').load).toHaveBeenCalledWith('asignacion/tablaAsignacion.php');
    expect(Swal.fire).toHaveBeenCalledWith(":)", "Eliminado con exito", "success");
    expect(result).toBe(false); // Verifica que la función retorne false
  });

  it("debería manejar un error en la eliminación de asignación", function() {
    // Simular una confirmación exitosa
    spyOn(Swal, "fire").and.callFake(function(options) {
      // Llamar a la función que se pasa a then con un objeto de resultado simulado
      options.then({ isConfirmed: true });
    });

    // Simular una llamada Ajax que devuelve un error
    spyOn($, "ajax").and.callFake(function(options) {
      options.success("0");
    });

    spyOn(Swal, "fire"); // Espía el llamado a Swal.fire

    // Llamar a la función y verificar el manejo del error
    var result = eliminarAsignacion(456);

    expect(Swal.fire).toHaveBeenCalledWith(":/", "Error, el sistema no fue eliminado0", "error");
    expect(result).toBe(false); // Verifica que la función retorne false
  });
});