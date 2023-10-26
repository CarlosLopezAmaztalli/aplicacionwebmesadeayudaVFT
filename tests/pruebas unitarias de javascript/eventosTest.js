describe("Pruebas para el manejo de eventos", function() {
    beforeAll(function() {
      // Configuración común antes de las pruebas, como cargar Jasmine, el DOM, etc.
    });
  
    afterAll(function() {
      // Limpieza común después de todas las pruebas
    });
  
    it("debería cargar la tabla de eventos al cargar el documento", function() {
      spyOn($.fn, "load"); // Espía el llamado a la función load de jQuery
  
      // Llamar a la función que se ejecuta en $(document).ready
      $(document).ready();
  
      // Verificar que se haya llamado a $.fn.load con la URL correcta
      expect($.fn.load).toHaveBeenCalledWith("eventos/tabla_eventos.php");
    });
  
    it("debería buscar eventos por fecha", function() {
      spyOn($.fn, "load"); // Espía el llamado a la función load de jQuery
  
      // Llamar a la función buscarPorFecha con una fecha de ejemplo
      buscarPorFecha("2023-10-18");
  
      // Verificar que se haya llamado a $.fn.load con la URL que incluye la fecha
      expect($.fn.load).toHaveBeenCalledWith("eventos/tabla_eventos.php?fecha=2023-10-18");
    });
  
    it("debería agregar un evento con éxito", function() {
      spyOn($, "ajax").and.callFake(function(options) {
        options.success("1");
      });
  
      spyOn($.fn, "load"); // Espía el llamado a la función load de jQuery
      spyOn($.fn, "reset"); // Espía el llamado a la función reset del formulario
  
      spyOn(Swal, "fire"); // Espía el llamado a Swal.fire
  
      // Llamar a la función agregarEvento
      agregarEvento();
  
      // Verificar que se haya llamado a $.fn.load con la URL correcta
      expect($.fn.load).toHaveBeenCalledWith("eventos/tabla_eventos.php");
      // Verificar que se haya llamado a $.fn.reset
      expect($.fn.reset).toHaveBeenCalled();
      // Verificar que se haya llamado a Swal.fire con los argumentos correctos
      expect(Swal.fire).toHaveBeenCalledWith({
        title: "Exito!",
        text: "Agregado",
        icon: "success",
      });
    });
  
    it("debería manejar un error al agregar un evento", function() {
      spyOn($, "ajax").and.callFake(function(options) {
        options.success("0");
      });
  
      spyOn(Swal, "fire"); // Espía el llamado a Swal.fire
  
      // Llamar a la función agregarEvento
      agregarEvento();
  
      // Verificar que se haya llamado a Swal.fire con los argumentos correctos
      expect(Swal.fire).toHaveBeenCalledWith({
        title: "Error!",
        text: "Fallo con 0",
        icon: "error",
      });
    });
  
    // Pruebas para eliminarEvento, editarEvento y actualizarEvento pueden seguir un enfoque similar.
  });