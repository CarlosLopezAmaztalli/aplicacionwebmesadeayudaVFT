
<?php
	include "../clases/Conexion.php";
    $con = new Conexion();
    $conexion = $con->conectar();
	$sql="SELECT id_asignacion_Equipo,marca
    from t_equipo_asignado order by id_asignacion_Equipo";
	$result=mysqli_query($conexion,$sql);
	$valoresY=array();//descripcion
	$valoresX=array();//nombres

	while ($ver=mysqli_fetch_row($result)) {
		$valoresY[]=$ver[1];
		$valoresX[]=$ver[0];
	}

	$datosX=json_encode($valoresX);
	$datosY=json_encode($valoresY);

 ?>
<h4>Grafica de equipos</h4>
<div id="graficaLineal"></div>

<script type="text/javascript">
	function crearCadenaLineal(json){
		var parsed = JSON.parse(json);
		var arr = [];
		for(var x in parsed){
			arr.push(parsed[x]);
		}
		return arr;
	}
</script>


<script type="text/javascript">

	datosX=crearCadenaLineal('<?php echo $datosX ?>');
	datosY=crearCadenaLineal('<?php echo $datosY ?>');

	var trace1 = {
		x: datosX,
		y: datosY,
		type: 'scatter'
	};

	var data = [trace1];

	Plotly.newPlot('graficaLineal', data);
</script>

