<?php
	include "../clases/Conexion.php";
    $con = new Conexion();
    $conexion = $con->conectar();
	$sql="SELECT id_asignacion,nombre
    from t_asignacion order by id_asignacion";
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
<h4>Grafica de sistemas</h4>
<div id="graficaBarras"></div>

<script type="text/javascript">
	function crearCadenaBarras(json){
		var parsed = JSON.parse(json);
		var arr = [];
		for(var x in parsed){
			arr.push(parsed[x]);
		}
		return arr;
	}
</script>

<script type="text/javascript">

	datosX=crearCadenaBarras('<?php echo $datosX ?>');
	datosY=crearCadenaBarras('<?php echo $datosY ?>');

	var data = [
		{
			x: datosX,
			y: datosY,
			type: 'bar'
		}
	];

	Plotly.newPlot('graficaBarras', data);
</script>