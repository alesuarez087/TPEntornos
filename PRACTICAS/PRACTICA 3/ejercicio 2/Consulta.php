<html>
<head>
<title> Listados completo </title>
</head>
<body>
	<?php
		include("conexion.inc");

		$vSql = "SELECT * FROM ciudades";
		$vResultado = mysqli_query($link, $vSql);
		$total_registros=mysqli_num_rows($vResultado);
	?>
	<table border=1>
		<tr>
			<td><b>ID</b></td>
			<td><b>CIUDAD</b></td>
			<td><b>PAIS</b></td>
			<td><b>HABITANTES</b></td>
			<td><b>SUPERFICIE (m²)</b></td>
			<td><b>METRO</b></td>
		</tr>
	<?php
	while ($fila = mysqli_fetch_array($vResultado))
	{
	?>
		<tr>
			<td><?php echo ($fila['id_ciudad']); ?></td>
			<td><?php echo ($fila['nombre']); ?></td>
			<td><?php echo ($fila['pais']); ?></td>
			<td><?php echo ($fila['habitantes']); ?></td>
			<td><?php echo ($fila['superficie']); ?></td>
			<td><?php echo ($fila['metro']); ?></td>
		</tr>
		
			<?php
				}
			?>
		<tr>
			<td colspan="6">
				<p>&nbsp;</p>
				<p align="center"><a href="Menu.html">Volver al men&uacute; del ABM</a></p>
			</td>
		</tr>
	</table>
	<?php 

		// Liberar conjunto de resultados

		mysqli_free_result($vResultado);

		// Cerrar la conexion
		mysqli_close($link);
	?>

	

</body>
</html>