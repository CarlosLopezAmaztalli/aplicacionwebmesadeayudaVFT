<?php

class ConexionIntegrationTest extends PHPUnit\Framework\TestCase {
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

    public function testInsercionYSeleccionDeDatos() {
        // Insertar datos de prueba en una tabla de la base de datos
        $query = "INSERT INTO t_cat_roles (id_rol, nombre,descripcion) VALUES (4,'actordesconocido','se eliminara como prueba')";
        $this->assertTrue($this->db->query($query));

        // Realizar una selección de datos y verificar si los datos insertados existen
        $selectQuery = "SELECT * FROM t_cat_roles WHERE id_rol = '1' AND nombre = 'cliente' and descripcion='Es cliente'";
        $result = $this->db->query($selectQuery);

        $this->assertTrue($result->num_rows > 0);

        // Limpiar los datos de prueba después de la prueba
        $this->db->query("DELETE FROM t_cat_roles WHERE id_rol = '1' AND nombre = 'cliente' and descripcion='Es cliente'");
    }

    public function tearDown(): void {
        // Cierra la conexión a la base de datos
        if ($this->db) {
            $this->db->close();
        }
    }
}