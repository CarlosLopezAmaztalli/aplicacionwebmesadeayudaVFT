<?php

class UsuariosIntegrationTest extends PHPUnit\Framework\TestCase {
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

    public function testLoginUsuarioExitoso() {
        // Insertar un usuario de prueba en la base de datos
        $query = "INSERT INTO t_usuarios (id_rol, id_persona, usuario, password, ubicacion)
                  VALUES (1,21,'cliente','sadasda','usbi34')";
        $this->assertTrue($this->db->query($query));

        $usuarios = new Usuarios();
        $idRol=1;
        $idPersona=21;
        $usuario = 'cliente'; 
        $password = 'sadasda'; 
        $ubicacion='usbi34';
        // Asegúrate de que el método devuelva 1 (éxito) al autenticar un usuario válido
        $result = $usuarios->loginUsuario($idRol,$idPersona,$usuario, $password,$ubicacion);
        $this->assertEquals(1, $result);

        // Limpiar los datos de prueba después de la prueba
        $this->db->query("DELETE FROM t_usuarios WHERE id_usuario = 'idUsuario'");
    }

    public function testLoginUsuarioUsuarioInactivo() {
        // Insertar un usuario de prueba inactivo en la base de datos
        $query = "INSERT INTO t_usuarios (id_rol, id_persona, usuario, password, ubicacion)
                  VALUES (1,21,'cliente','sadasda','usbi34')";
        $this->assertTrue($this->db->query($query));

        $usuarios = new Usuarios();
        $idRol=1;
        $idPersona=21;
        $usuario = 'cliente'; 
        $password = 'sadasda'; 
        $ubicacion='usbi34';

        // Asegúrate de que el método devuelva 0 (usuario inactivo) al autenticar un usuario inactivo
        $result = $usuarios->loginUsuario($idRol,$idPersona,$usuario, $password,$ubicacion);
        $this->assertEquals(0, $result);

        // Limpiar los datos de prueba después de la prueba
        $this->db->query("DELETE FROM t_usuarios WHERE id_usuario = 'idUsuario'");
    }

    public function testLoginUsuarioCredencialesIncorrectas() {
        // No se necesita insertar datos en la base de datos para esta prueba

        $usuarios = new Usuarios();
        $idRol=1;
        $idPersona=22;
        $usuario = 'cliente'; 
        $password = 'tgrthr'; 
        $ubicacion='usbi4';

        // Asegúrate de que el método devuelva 0 (credenciales incorrectas) al autenticar con credenciales incorrectas
        $result = $usuarios->loginUsuario($idRol,$idPersona,$usuario, $password,$ubicacion);
        $this->assertEquals(0, $result);
    }

    public function testAgregaNuevoUsuarioExitoso() {
        $usuarios = new Usuarios();
        $datos = [
            'idRol' => 1, 
            'usuario' => 'cliente',
            'password' => 'luisgerald01', 
            'ubicacion' => 'usbi03', 
            'paterno' => 'gerardo',
            'materno' => 'guillert',
            'nombre' => 'juan de la cruz', 
            'fechaNacimiento' => '1986-01-21', 
            'genero' => 'M', 
            'telefono' => '9213125343',
            'correo' => 'gerardo@hotmail.com',
        ];

        // Asegúrate de que el método devuelva true al agregar un nuevo usuario
        $result = $usuarios->agregaNuevoUsuario($datos);
        $this->assertTrue($result);

        // Limpiar los datos de prueba después de la prueba
        $this->db->query("DELETE FROM t_usuarios WHERE id_usuario = 'idUsuario'");
    }
}