<?php

class ConexionTest extends PHPUnit\Framework\TestCase {
    private $db;

    public function setUp(): void {
        // Establece la conexión a la base de datos en esta función
        $this->db = new mysqli('localhost', 'root', '1234', 'mesaayuda');
    }

    public function testConexionExitosa() {
        // Verifica si la conexión a la base de datos es exitosa
        $this->assertInstanceOf(mysqli::class, $this->db);
        $this->assertTrue(empty($this->db->connect_error));
    }

    public function testSeleccionarBaseDeDatos() {
        // Verifica si la base de datos seleccionada es la correcta
        $this->assertEquals('mesaayuda', $this->db->query("SELECT DATABASE()")->fetch_row()[0]);
    }

    public function tearDown(): void {
        // Cierra la conexión a la base de datos
        if ($this->db) {
            $this->db->close();
        }
    }
}