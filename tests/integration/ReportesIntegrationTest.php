<?php

class ReportesIntegrationTest extends PHPUnit\Framework\TestCase {
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

    public function testAgregarReporteClienteExitoso() {
        // Insertar datos de prueba en la base de datos
        $query = "INSERT INTO reportes (id_usuario, id_sistema, problema) 
                  VALUES (13, 6, 'Problema de prueba')";
        $this->assertTrue($this->db->query($query));

        $reportes = new Reportes();
        $datos = [
            'idUsuario' => 13,
            'idSistema' => 6,
            'problema' => 'Problema de prueba',
        ];

        $result = $reportes->agregarReporteCliente($datos);
        $this->assertTrue($result);

        // Limpiar los datos de prueba después de la prueba
        $this->db->query("DELETE FROM reportes WHERE id_usuario = 13 AND id_sistema = 6 AND problema = 'Problema de prueba'");
    }

    public function testEliminarReporteClienteExitoso() {
        // Insertar un reporte de prueba en la base de datos
        $query = "INSERT INTO reportes (id_usuario, id_sistema, problema) 
                  VALUES (13, 6, 'Problema de prueba')";
        $this->assertTrue($this->db->query($query));

        $reportes = new Reportes();
        $idReporte = 1;
        $result = $reportes->eliminarReporteCliente($idReporte);
        $this->assertTrue($result);
    }

    public function testObtenerSolucion() {
        // Insertar un reporte de prueba en la base de datos
        $query = "INSERT INTO reportes (id_usuario, id_sistema, problema) 
                  VALUES (13, 6, 'Problema de prueba')";
        $this->assertTrue($this->db->query($query));

        $reportes = new Reportes();
        $idReporte = 1;
        $result = $reportes->obtenerSolucion($idReporte);
        $this->assertIsArray($result);

        // Limpiar los datos de prueba después de la prueba
        $this->db->query("DELETE FROM reportes WHERE id_usuario = 13 AND id_sistema = 6 AND problema = 'Problema de prueba'");
    }

    public function testActualizarSolucion() {
        // Insertar un reporte de prueba en la base de datos
        $query = "INSERT INTO t_reportes (id_usuario, id_sistema, problema) 
                  VALUES (13, 6, 'Problema de prueba')";
        $this->assertTrue($this->db->query($query));

        $reportes = new Reportes();
        $datos = [
            'idUsuario' => 13,
            'solucion' => 'Solución de prueba',
            'estatus' => 1,
            'idReporte' => 1,
        ];

        $result = $reportes->actualizarSolucion($datos);
        $this->assertTrue($result);

        // Verificar que los datos se hayan actualizado en la base de datos
        $selectQuery = "SELECT * FROM t_reportes WHERE id_reporte = 1";
        $result = $this->db->query($selectQuery);
        $reporte = $result->fetch_assoc();

        $this->assertEquals('Solución de prueba', $reporte['solucion']);
        $this->assertEquals(1, $reporte['estatus']);

        // Limpiar los datos de prueba después de la prueba
        $this->db->query("DELETE FROM t_reportes WHERE id_usuario = 13 AND id_sistema = 6 AND problema = 'Problema de prueba'");
    }
}