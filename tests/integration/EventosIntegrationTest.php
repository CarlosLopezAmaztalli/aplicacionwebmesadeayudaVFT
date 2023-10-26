<?php

class EventosIntegrationTest extends PHPUnit\Framework\TestCase {

    protected $db;

    public function setUp(): void {
        // Configura la conexión a la base de datos de prueba
        $this->db = new mysqli('localhost', 'root', '1234', 'mesaayuda');
    }

    public function tearDown(): void {
        // Cierra la conexión a la base de datos
        if ($this->db) {
            $this->db->close();
        }
    }

    public function testMostrarEventos() {
        // Insertar datos de prueba en la base de datos
        $query = "INSERT INTO t_eventos (id_usuario, evento, hora_inicio, hora_fin, fecha) 
                  VALUES (1, 'Evento de prueba', '09:00:00', '10:00:00', '2023-10-17')";
        $this->assertTrue($this->db->query($query));

        $eventos = new Eventos();
        $id_usuario = 1;
        $evento='Evento de prueba';
        $horaInicio='09:00:00';
        $horaFinal='10:00:00';
        $fecha = '2023-10-17';

        $result = $eventos->mostrarEventos($id_usuario, $evento,$horaInicio,$horaFinal,$fecha);
        $this->assertIsArray($result);

        // Limpiar los datos de prueba después de la prueba
        $this->db->query("DELETE FROM t_eventos WHERE id_usuario = 1 AND fecha = '2023-10-17'");
    }

    public function testAgregarEvento() {
        $eventos = new Eventos();
        $data = [
            'id_usuario' => 1,
            'evento' => 'Evento de prueba',
            'hora_inicio' => '09:00:00',
            'hora_fin' => '10:00:00',
            'fecha' => '2023-10-28'
        ];

        $result = $eventos->agregarEvento($data);
        $this->assertTrue($result);

        // Limpiar los datos de prueba después de la prueba
        $this->db->query("DELETE FROM t_eventos WHERE id_usuario = 1 AND fecha = '2023-10-28'");
    }

    public function testEditarEvento() {
        // Insertar un evento de prueba en la base de datos
        $query = "INSERT INTO eventos (id_usuario, evento, hora_inicio, hora_fin, fecha) 
                  VALUES (1, 'Evento de prueba', '09:00:00', '10:00:00', '2023-10-28')";
        $this->assertTrue($this->db->query($query));

        $id_usuario = 1;
        $evento='Evento de prueba';
        $horaInicio='09:00:00';
        $horaFinal='10:00:00';
        $fecha = '2023-10-17';

        $result = $eventos->editarEvento($id_usuario, $evento,$horaInicio,$horaFinal,$fecha);
        $this->assertIsArray($result);

        // Limpiar los datos de prueba después de la prueba
        $this->db->query("DELETE FROM t_eventos WHERE id_evento = 1");
    }

    public function testEliminarEvento() {
        // Insertar un evento de prueba en la base de datos
        $query = "INSERT INTO t_eventos (id_usuario, evento, hora_inicio, hora_fin, fecha) 
                  VALUES (1, 'Evento de prueba', '09:00:00', '10:00:00', '2023-10-17')";
        $this->assertTrue($this->db->query($query));

        $eventos = new Eventos();
        $id_evento = 1;
        $result = $eventos->eliminarEvento($id_evento);
        $this->assertTrue($result);
    }

    public function testFullCalendar() {
        // Insertar eventos de prueba en la base de datos
        $query1 = "INSERT INTO t_eventos (id_usuario, evento, hora_inicio, hora_fin, fecha) 
                   VALUES (1, 'Evento 1', '09:00:00', '10:00:00', '2023-10-17')";
        $query2 = "INSERT INTO eventos (id_usuario, evento, hora_inicio, hora_fin, fecha) 
                   VALUES (1, 'Evento 2', '11:00:00', '12:00:00', '2023-10-18')";
        $this->assertTrue($this->db->query($query1));
        $this->assertTrue($this->db->query($query2));

        $eventos = new Eventos();
        $id_usuario = 1;
        $result = $eventos->fullCalendar($id_usuario);
        $this->assertJson($result);

        // Limpiar los datos de prueba después de la prueba
        $this->db->query("DELETE FROM eventos WHERE id_usuario = 1");
    }
}