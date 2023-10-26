<?php

/* include "../../../clases/Usuarios.php";
    $Usuarios =new Usuarios();
    print_r($_POST); 
    */
    $datos= array(
   "paterno" => $_POST['paterno'],
   "materno" => $_POST['materno'],
   "nombre" => $_POST['nombre'] ,
   "fechaNacimiento"=> $_POST['fechaNacimiento'],
   "genero"=> $_POST['genero'],
   "telefono"=> $_POST['telefono'], 
   "correo"=> $_POST['correo'], 
   "usuario"=> $_POST['usuario'],
   "password"=> sha1($_POST['password']),
   "idRol" => $_POST['idRol'], 
   "ubicacion"=> $_POST['ubicacion'] 
    );
    
    include "../../../clases/Usuarios.php";
    $Usuarios =new Usuarios();
    echo $Usuarios ->agregaNuevoUsuario($datos);
?>