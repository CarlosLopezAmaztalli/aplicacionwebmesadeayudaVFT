<?php


class UsuariosTest extends PHPUnit\Framework\TestCase {

    public function testLoginUsuarioExitoso() {
        $usuarios = new Usuarios();
        $idRol=1;
        $idPersona=21;
        $usuario = 'cliente'; 
        $password = 'sadasda'; 
        $ubicacion='usbi34'; 

        // Asegúrate de que el método devuelva 1 (éxito) al autenticar un usuario válido
        $result = $usuarios->loginUsuario($idRol,$idPersona,$usuario, $password,$ubicacion);
        $this->assertEquals(1, $result);
    }

    public function testLoginUsuarioUsuarioInactivo() {
        $usuarios = new Usuarios();
        $idRol=1;
        $idPersona=21;
        $usuario = 'cliente'; 
        $password = 'sadasda'; 
        $ubicacion='usbi34';
 

        // Asegúrate de que el método devuelva 0 (usuario inactivo) al autenticar un usuario inactivo
        $result = $usuarios->loginUsuario($idRol,$idPersona,$usuario, $password,$ubicacion);
        $this->assertEquals(0, $result);
    }

    public function testLoginUsuarioCredencialesIncorrectas() {
        $usuarios = new Usuarios();
        $idRol=1;
        $idPersona=21;
        $usuario = 'cliente'; 
        $password = 'sadasda'; 
        $ubicacion='usbi34';

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
    }

}