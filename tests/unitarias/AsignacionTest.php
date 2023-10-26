<?php declare(strict_types=1);
use PHPUnit\Framework\TestCase;

class AsignacionTest extends PHPUnit\Framework\TestCase {

    public function testAgregarAsignacionExitoso() {
        $asignacion = new Asignacion();
        $datos = [
            'idPersona' => 3, 
            'idSistema' => 2, 
            'aplicacion' => 'Aplicación movil', 
            'funcion' => 'aplicacion que modula una aplicacion web de mesa de ayuda', 
            'direccion' => 'kotlin', 
            'descripcion' => 'aplicacion de ayuda', 
            'nombre' => 'kit mesa 1.0',
            'protocolo' => 'android', 
        ];

        // Asegúrate de que el método devuelva true al agregar una nueva asignación
        $result = $asignacion->agregarAsignacion($datos);
        $this->assertTrue($result);
    }

    public function testEliminarAsignacionExitoso() {
        $asignacion = new Asignacion();
        $idAsignacion = 1; 

        // Asegúrate de que el método devuelva true al eliminar una asignación existente
        $result = $asignacion->eliminarAsignacion($idAsignacion);
        $this->assertTrue($result);
    }

    public function testEliminarAsignacionInexistente() {
        $asignacion = new Asignacion();
        $idAsignacion = 9; 

        // Asegúrate de que el método devuelva false al intentar eliminar una asignación inexistente
        $result = $asignacion->eliminarAsignacion($idAsignacion);
        $this->assertFalse($result);
    }

    public function testObtenerAsignaciones(){
        $a=new Asignacion;
        $asignaciones=$a->agregarAsignacion($datos);
        $this->assertIsArray($asignaciones);
        $this->assertEquals(8,count($asignaciones));
        $first=$asignaciones[8];    
        $this->assertInstanceOf('Asignacion',$first);
    }
    public function testEliminarAsignaciones(){
        $a=new Asignacion;
        $asignaciones=$a->eliminarAsignacion($idAsignacion);
        $this->assertIsArray($asignaciones);
        $this->assertEquals(1,count($asignaciones));
        $first=$asignaciones[0];   
        $this->assertInstanceOf('Asignacion',$first);
    }
}
?>