<?php 
    include "Conexion.php";   //conexion ala base de datos
    class Asignacion extends Conexion {
        public function agregarAsignacion($datos)
        {
            $conexion = Conexion::conectar();
            $sql="INSERT INTO t_asignacion (id_persona,
                                id_sistema,
                                aplicacion,
                                funcion,
                                direccion,
                                descripcion,
                                nombre,
                                protocolo)
                                VALUES (?,?,?,?,?,?,?,?)";
            $query = $conexion->prepare($sql);
            $query->bind_param('iissssss', $datos['idPersona'],
                                            $datos['idSistema'],   
                                            $datos['aplicacion'],
                                            $datos['funcion'],
                                            $datos['direccion'],
                                            $datos['descripcion'],
                                            $datos['nombre'],
                                            $datos['protocolo']  );
                                            $respuesta = $query->execute();
                                            $query->close();
                                            return $respuesta;
        }
        public function eliminarAsignacion($idAsignacion){
            $conexion = Conexion::conectar();
            $sql = "DELETE FROM  t_asignacion WHERE id_asignacion = ?";
            $query = $conexion->prepare($sql);
            $query->bind_param('i', $idAsignacion);
            $respuesta = $query->execute();
            $query->close();
            return $respuesta;
        }
    }
    ?>