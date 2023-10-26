<?php 
  include "header.php";
  if(isset($_SESSION['usuario']) && $_SESSION['usuario']['rol'] == 4 ){      
    include "../clases/Conexion.php";
    $con = new Conexion();
    $conexion = $con->conectar();
    
 ?>

<head>
	<title>Graficos con plotly</title>
	<link rel="stylesheet" type="text/css" href="../publico/bootstrap/bootstrap.css">
	<script src="../publico/bootstrap/jquery-3.3.1.min.js"></script>
	<script src="../publico/bootstrap/plotly-latest.min.js"></script>
</head>
<!-- Sidebar Navigation end-->
<div class="page-content bg-light">
    <div class="page-header bg-light">
        <div class="container-fluid">
            <h2 class="h5 no-margin-bottom">Panel de reportes</h2>
        </div>
    </div>
    <section class="no-padding-bottom">
        <div class="container-fluid">
            <div class="row">

                <!-- Earnings (Monthly) Card Example -->
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-0 bg-success shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-dark text-uppercase mb-1">Usuarios</div>
                                    <div class="h5 mb-0 font-weight-bold text-white"></div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-user fa-2x text-white"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Earnings (Monthly) Card Example -->
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card bg-secondary border-0 shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-dark text-uppercase mb-1">Sistemas</div>
                                    <div class="h5 mb-0 font-weight-bold text-white"></div>
                                </div>
                                <div class="col-auto">
                                    <i class="fab fa-steam-symbol fa-2x text-white"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Earnings (Monthly) Card Example -->
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-0 bg-warning shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-dark text-uppercase mb-1">Clientes</div>
                                    <div class="row no-gutters align-items-center">
                                        <div class="col-auto">
                                            <div class="h5 mb-0 mr-3 font-weight-bold text-white"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-users fa-2x text-white"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Pending Requests Card Example -->
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-0 bg-primary shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-dark text-uppercase mb-1">Equipos</div>
                                    <div class="h5 mb-0 font-weight-bold text-white"></div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-laptop fa-2x text-white"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-0 bg-primary shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-dark text-uppercase mb-1">Eventos</div>
                                    <div class="h5 mb-0 font-weight-bold text-white"></div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-evernote fa-2x text-white"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Content Row -->
            <div class="container">
		<div class="row">
			<div class="col-sm-12">
				<div class="panel panel-primary">
					<div class="panel panel-heading">
						Graficas de reportes
					</div>
					<div class="panel panel-body">
						<div class="row">
							<div class="col-sm-6">
								<div id="cargaLineal"></div>
							</div>
							<div class="col-sm-6">
								<div id="cargaLineal2"></div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
        <div class="row">
			<div class="col-sm-12">
				<div class="panel panel-primary">
					<div class="panel panel-heading">
						Graficas de reportes
					</div>
					<div class="panel panel-body">
						<div class="row">
							<div class="col-sm-6">
								<div id="cargaBarras"></div>
							</div>
							<div class="col-sm-6">
								<div id="cargaBarras2"></div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
        <div class="row">
			<div class="col-sm-12">
				<div class="panel panel-primary">
					<div class="panel panel-heading">
						Graficas de reportes
					</div>
					<div class="panel panel-body">
						<div class="row">
							<div class="col-sm-6">
								<div id="cargaBarras3"></div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

<script type="text/javascript">
	$(document).ready(function(){
		$('#cargaLineal').load('lineal.php');
        $('#cargaLineal2').load('linealUsuarios.php');
		$('#cargaBarras').load('barras.php');
        $('#cargaBarras2').load('barrasClientes.php');
        $('#cargaBarras3').load('barrasEventos.php');
	});
</script>

<?php
 include "footer.php";
    
}else{
  header("location:../index.html");
}
 ?>
