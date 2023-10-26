
<?php 
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../publico/bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="../publico/css/plantilla.css">
    <link rel="stylesheet" href="../publico/datatable/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="../publico/datatable/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="../publico/fontawesome/css/all.css">
    <link rel="stylesheet" href="../publico/datatable/buttons.dataTables.min.css">
    
    <title>Mesa de ayuda</title>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light static-top mb-5 shadow">
  <div class="container">
    <a class="navbar-brand" href="#">Mesa de ayuda</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
      <ul class="navbar-nav ms-auto">
      <?php if($_SESSION['usuario']['rol'] == 1) { ?>
        <li class="nav-item active">
          <a class="nav-link" href="inicio.php">
            <span class="fas fa-home"></span>  Inicio
          </a> 
        </li>
        <li class="nav-item">
          <a class="nav-link" href="misSistemas.php">
          <span  class="fa fa-assistive-listening-systems" aria-hidden="true"></span>  Mis sistemas
          </a>  
        </li>
        <li class="nav-item">
          <a class="nav-link" href="misReportes.php">
            <span class="fas fa-file-alt"></span>  Reportes Soporte
          </a>
        </li>
      <?php } else if($_SESSION['usuario']['rol'] == 2) {?>
        <!--de aqui son las vistas del administrador-->
        <li class="nav-item active">
          <a class="nav-link" href="inicioAdmin.php">
            <span class="fas fa-home"></span>  Inicio
          </a> 
        </li>
        <li class="nav-item">
          <a class="nav-link" href="usuarios.php">
            <span class="fas fa-users"></span> Usuarios</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="asignacion.php">
            <span class="fas fa-assistive-listening-systems"></span> Asignacion de sistemas      
              </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="asignacionDispositivos.php">
            <span class="fas fa-cash-register"></span> Asignacion de equipos
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="reportes.php">
          <span class="fas fa-file-archive"></span> Reportes
          </a>
        </li>
        <?php } else if($_SESSION['usuario']['rol'] == 3) {?>
           <!--de aqui son las vistas del ingeniero-->
           <li class="nav-item active">
          <a class="nav-link" href="inicioAdmin.php">
            <span class="fas fa-home"></span>  Inicio
          </a> 
        </li>
        <li class="nav-item">
          <a class="nav-link" href="usuarios.php">
            <span class="fas fa-users"></span> Usuarios</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="asignacion.php">
            <span class="fas fa-assistive-listening-systems"></span> Asignacion de sistemas
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="asignacionDispositivos.php">
            <span class="fas fa-cash-register"></span> Asignacion de equipos
          </a>
        <li class="nav-item">
          <a class="nav-link" href="reportes.php">
          <span class="fas fa-file-archive"></span> Reportes
          </a>
        </li>
        <?php } else if($_SESSION['usuario']['rol'] == 4) {?>
          <!--de aqui son las vistas del director-->
          <li class="nav-item active">
          <a class="nav-link" href="inicio.php">
            <span class="fas fa-home"></span>  Inicio
          </a> 
        </li>
        <li class="nav-item active">
          <a class="nav-link" href="consultarDatosSistema.php">
          <span class="fas fa-database"></span>  Consultas
          </a> 
        </li>
        <li class="nav-item">
          <a class="nav-link" href="Dispositivos.php">
          <span  class="fa fa-laptop" aria-hidden="true"></span>  Mis Equipos
          </a>  
        </li>
        <li class="nav-item">
          <a class="nav-link" href="reportesGraficos.php">
          <span  class="fa fa-digital-tachograph" aria-hidden="true"></span>  Reportes del sistema
          </a>  
        </li>
        <li class="nav-item">
          <a class="nav-link" href="eventos.php">
          <span  class="fa fa-file-archive" aria-hidden="true"></span>  Eventos del sistema
          </a>  
        </li>
      <?php } ?>
        <li class="nav-item dropdown" >
        <a style="color:blue" class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <span class="fas fa-user"></span> Usuario: <?php echo $_SESSION['usuario']['nombre'];?>
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="#" 
          data-toggle="modal" 
          data-target="#modalActualizarDatosPersonales"  
          onclick="obtenerDatosPersonalesInicio('<?php echo $_SESSION['usuario']['id']; ?>')">
          <span class="fas fa-user-edit"></span> Editar Datos
          </a>

          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="../procesos/usuarios/login/salir.php">
          <span class="fas fa-sign-out-alt"></span> Salir
          </a>
        
        </div>
      </li>
      </ul>
    </div>
  </div>
</nav>

<?php 
  include "inicio/modalActualizarDatosPersonales.php";
?>