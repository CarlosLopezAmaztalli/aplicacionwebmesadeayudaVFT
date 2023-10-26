<?php


class EventosTest extends PHPUnit\Framework\TestCase {

    public function testMostrarEventos() {
        $eventos = new Eventos();
        $id_usuario = 1; 
        $fecha = '2023-10-17'; 

        $result = $eventos->mostrarEventos($id_usuario, $fecha);
        $this->assertIsArray($result);

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
    }

    public function testEditarEvento() {
        $eventos = new Eventos();
        $id_evento = 2; 
        $result = $eventos->editarEvento($id_evento);
        $this->assertIsArray($result);

    }

    public function testEliminarEvento() {
        $eventos = new Eventos();
        $id_evento = 1; 
        $result = $eventos->eliminarEvento($id_evento);
        $this->assertTrue($result);
    }

    public function testFullCalendar() {
        $eventos = new Eventos();
        $id_usuario = 1; 
        $result = $eventos->fullCalendar($id_usuario);
        $this->assertJson($result);

    }
}