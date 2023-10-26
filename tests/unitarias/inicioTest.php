<?php

class InicioTest extends PHPUnit\Framework\TestCase {

    public function testActualizarPersonalesExitoso() {
        $inicio = new Inicio();
        $datos = [
            'idUsuario' => 16, 
            'paterno' => 'hernandez',
            'materno' => 'martinez',
            'nombre' => 'alejandro',
            'telefono' => '9213432423',
            'correo' => 'alejandro@correo.com',
            'fecha' => '2000-01-01',
            'imagen' => 'nueva_imagen.jpg',
        ];

       
        $result = $inicio->actualizarPersonales($datos);
        $this->assertTrue($result);

       
    }

    public function testActualizarPersonalesFallo() {
        $inicio = new Inicio();
        $datos = [
            'paterno' => 'tomy',
            'materno' => 'martinez',
            'nombre' => 'johnt',
            'telefono' => '9213430423',
            'correo' => 'jhon@correo.com',
            'fecha' => '1997-01-01',
            'imagen' => 'nueva_imagen.jpg',
        ];

        $result = $inicio->actualizarPersonales($datos);
        $this->assertFalse($result);

        
    }

}