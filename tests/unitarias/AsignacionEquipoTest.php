<?php declare(strict_types=1);
use PHPUnit\Framework\TestCase;

class AsignacionEquipoTest extends TestCase{

    public function testAgregarAsignacionExitoso() {
        $asignacion = new Asignacion();
        $datos = [
            'idPersona' => 2, 
            'idEquipo' => 2, 
            'marca' => 'dell', 
            'modelo' => 'ZSKI32JM39320', 
            'color' => 'Rojo', 
            'descripcion' => 'Laptop de sobremesa', 
            'memoria' => '8 GB', 
            'discoDuro' => '256 GB', 
            'procesador' => 'Intel Core i7', 
        ];

        // Asegúrate de que el método devuelva true al agregar una nueva asignación de equipo
        $result = $asignacion->agregarAsignacion($datos);
        $this->assertTrue($result);
    }

    public function testEliminarAsignacionExitoso() {
        $asignacion = new Asignacion();
        $idAsignacion = 1; 

        // Asegúrate de que el método devuelva true al eliminar una asignación de equipo existente
        $result = $asignacion->eliminarAsignacion($idAsignacion);
        $this->assertTrue($result);

        
    }

    public function testEliminarAsignacionInexistente() {
        $asignacion = new Asignacion();
        $idAsignacion = 9; 

        // Asegúrate de que el método devuelva false al intentar eliminar una asignación de equipo inexistente
        $result = $asignacion->eliminarAsignacion($idAsignacion);
        $this->assertFalse($result);
    }

    public function testObtenerAsignaciones(){
        $a=new Asignacion;
        $asignaciones=$a->agregarAsignacion($datos);
        $this->assertIsArray($asignaciones);
        $this->assertEquals(8,count($asignaciones));
        $first=$asignaciones[8];    //Previous assert tells us this is safe
        $this->assertInstanceOf('Asignacion',$first);
    }
    public function testEliminarAsignaciones(){
        $a=new Asignacion;
        $asignaciones=$a->eliminarAsignacion($idAsignacion);
        $this->assertIsArray($asignaciones);
        $this->assertEquals(1,count($asignaciones));
        $first=$asignaciones[0];    //Previous assert tells us this is safe
        $this->assertInstanceOf('Asignacion',$first);
    }
    
}

?>