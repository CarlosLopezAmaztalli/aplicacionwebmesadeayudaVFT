<?php

class ReportesTest extends PHPUnit\Framework\TestCase {

    public function testAgregarReporteClienteExitoso() {
        $reportes = new Reportes();
        $datos = [
            'idUsuario' => 13, 
            'idSistema' => 6, 
            'problema' => 'Problema de prueba',
        ];


        $result = $reportes->agregarReporteCliente($datos);
        $this->assertTrue($result);

    }

    public function testEliminarReporteClienteExitoso() {
        $reportes = new Reportes();
        $idReporte = 1; 
        $result = $reportes->eliminarReporteCliente($idReporte);
        $this->assertTrue($result);
    }

    public function testObtenerSolucion() {
        $reportes = new Reportes();
        $idReporte = 1; 
        $result = $reportes->obtenerSolucion($idReporte);
        $this->assertIsArray($result);
    }

    public function testActualizarSolucion() {
        $reportes = new Reportes();
        $datos = [
            'idUsuario' => 1, 
            'solucion' => 'Solución de prueba',
            'estatus' => 1, 
            'idReporte' => 1, 
        ];

     
        $result = $reportes->actualizarSolucion($datos);
        $this->assertTrue($result);
    }

}