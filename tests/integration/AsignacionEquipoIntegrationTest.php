<?php declare(strict_types=1);
use PHPUnit\Framework\TestCase;

class AsignacionEquipoIntegrationTest extends TestCase {
    private $conexion;
    private $tablaAsignacion = 't_equipo_asignado';

    protected function setUp(): void {
        parent::setUp();

        // Conecta a la base de datos o al servidor de pruebas (asegúrate de configurar tu conexión en tu archivo de configuración).
        $this->conexion = new mysqli('localhost', 'root', '1234', 'mesaayuda');

        // Asegúrate de que la conexión sea exitosa
        if ($this->conexion->connect_error) {
            die('Error de conexión: ' . $this->conexion->connect_error);
        }
    }

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

        // Verifica que la inserción se haya realizado correctamente en la base de datos
        $this->assertTrue($result);

        // Ahora, verifica que los datos de la asignación existan en la base de datos
        $idAsignacion = $this->conexion->insert_id;
        $sql = "SELECT * FROM $this->tablaAsignacion WHERE id_asignacion_Equipo = $idAsignacion";
        $resultado = $this->conexion->query($sql);
        $this->assertTrue($resultado->num_rows > 0);
    }

    public function testEliminarAsignacionExitoso() {
        $asignacion = new Asignacion();
        $idAsignacion = 3; 

        $result = $asignacion->eliminarAsignacion($idAsignacion);

        // Verifica que la eliminación se haya realizado correctamente en la base de datos
        $this->assertTrue($result);

        // Ahora, verifica que los datos de la asignación ya no existan en la base de datos
        $sql = "SELECT * FROM $this->tablaAsignacion WHERE id_asignacion_Equipo = $idAsignacion";
        $resultado = $this->conexion->query($sql);
        $this->assertTrue($resultado->num_rows == 0);
    }

    protected function tearDown(): void {
        // Cierra la conexión a la base de datos después de las pruebas
        $this->conexion->close();
        parent::tearDown();
    }
}