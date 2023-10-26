<?php declare(strict_types=1);

use PHPUnit\Framework\TestCase;

class AsignacionIntegrationTest extends PHPUnit\Framework\TestCase {

    public function testAgregarYEliminarAsignacion() {
        // Conectar a la base de datos de prueba
        $database = new PDO("mysql:host=localhost;dbname=mesaayuda", "root", "1234");

        // Limpiar la base de datos de prueba antes de ejecutar la prueba
        $database->exec("DELETE FROM t_asignacion");

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

        // Obtener la asignación recién agregada desde la base de datos
        $stmt = $database->prepare("SELECT * FROM t_asignacion");
        $stmt->execute();
        $asignaciones = $stmt->fetchAll();

        // Asegúrate de que haya una asignación en la base de datos
        $this->assertEquals(1, count($asignaciones));

        // Eliminar la asignación recién agregada
        $result = $asignacion->eliminarAsignacion($asignaciones[0]['id_asignacion']);
        $this->assertTrue($result);

        // Verificar que no haya asignaciones en la base de datos después de eliminar
        $stmt = $database->prepare("SELECT * FROM t_asignacion");
        $stmt->execute();
        $asignaciones = $stmt->fetchAll();

        $this->assertEquals(0, count($asignaciones));
    }
}