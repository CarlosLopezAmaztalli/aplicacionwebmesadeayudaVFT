<?php

class InicioIntegrationTest extends PHPUnit\Framework\TestCase {
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

    public function testActualizarPersonalesExitoso() {
        // Insertar datos de prueba en la base de datos
        $query = "INSERT INTO t_persona (id_persona, paterno, materno, nombre, telefono, correo, fecha, imagen) 
                  VALUES (16, 'hernandez', 'martinez', 'alejandro', '9213432423', 'alejandro@correo.com', '2000-01-01', 'nueva_imagen.jpg')";
        $this->assertTrue($this->db->query($query));

        $inicio = new Inicio();
        $datos = [
            'idPersona' => 16,
            'paterno' => 'nuevo_paterno',
            'materno' => 'nuevo_materno',
            'nombre' => 'nuevo_nombre',
            'telefono' => '9213432423', // Mismo número de teléfono
            'correo' => 'nuevo@correo.com',
            'fecha' => '2000-01-01', // Misma fecha de nacimiento
            'imagen' => 'nueva_imagen.jpg', // Mismo nombre de imagen
        ];

        $result = $inicio->actualizarPersonales($datos);
        $this->assertTrue($result);

        // Verificar que los datos se hayan actualizado en la base de datos
        $selectQuery = "SELECT * FROM t_usuarios WHERE id_usuario = 16";
        $result = $this->db->query($selectQuery);
        $usuario = $result->fetch_assoc();

        $this->assertEquals('nuevo_paterno', $usuario['paterno']);
        $this->assertEquals('nuevo_materno', $usuario['materno']);
        $this->assertEquals('nuevo_nombre', $usuario['nombre']);
        $this->assertEquals('nuevo@correo.com', $usuario['correo']);

        // Limpiar los datos de prueba después de la prueba
        $this->db->query("DELETE FROM t_usuarios WHERE id_usuario = 16");
    }

    public function testActualizarPersonalesFallo() {
        // Insertar datos de prueba en la base de datos
        $query = "INSERT INTO t_persona (id_persona, paterno, materno, nombre, telefono, correo, fecha, imagen) 
                  VALUES (16, 'hernandez', 'martinez', 'alejandro', '9213432423', 'alejandro@correo.com', '2000-01-01', 'nueva_imagen.jpg')";
        $this->assertTrue($this->db->query($query));

        $inicio = new Inicio();
        $datos = [
            'paterno' => 'nuevo_paterno',
            'materno' => 'nuevo_materno',
            'nombre' => 'nuevo_nombre',
            'telefono' => '9213432423', // Mismo número de teléfono
            'correo' => 'nuevo@correo.com',
            'fecha' => '2000-01-01', // Misma fecha de nacimiento
            'imagen' => 'nueva_imagen.jpg', // Mismo nombre de imagen
        ];

        $result = $inicio->actualizarPersonales($datos);
        $this->assertFalse($result);

        // Verificar que los datos no se hayan actualizado en la base de datos
        $selectQuery = "SELECT * FROM t_usuarios WHERE id_usuario = 16";
        $result = $this->db->query($selectQuery);
        $usuario = $result->fetch_assoc();

        $this->assertEquals('hernandez', $usuario['paterno']);
        $this->assertEquals('martinez', $usuario['materno']);
        $this->assertEquals('alejandro', $usuario['nombre']);
        $this->assertEquals('alejandro@correo.com', $usuario['correo']);

        // Limpiar los datos de prueba después de la prueba
        $this->db->query("DELETE FROM usuarios WHERE id = 16");
    }
}
