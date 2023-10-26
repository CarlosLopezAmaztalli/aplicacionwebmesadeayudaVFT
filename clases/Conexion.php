<?php
    class Conexion {
        public function conectar(){
            $servidor = "localhost";
            $usuario = "root";
            $password = "1234";
            $db = "mesaayuda";
            $conexion= mysqli_connect($servidor, $usuario, $password, $db);
            return $conexion;
        }
    }
    ?>