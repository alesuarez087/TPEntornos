<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title> Listados completo con PAGINACI�N </title>
</head>

<body>

	<?php
		include("conexion.inc");
		$Cant_por_Pag = 2;
		$pagina = isset ( $_GET['pagina']) ? $_GET['pagina'] : null ;

		if (!$pagina) {
			$inicio = 0;
			$pagina=1;
		}
		else {
			$inicio = ($pagina - 1) * $Cant_por_Pag;
		}// total de p�ginas
		$vSql = "SELECT * FROM ciudades";
		$vResultado = mysqli_query($link, $vSql);
		$total_registros=mysqli_num_rows($vResultado);
		$total_paginas = ceil($total_registros/ $Cant_por_Pag);
		echo "Numero de registros encontrados: " . $total_registros . "<br>";
		echo "Se muestran paginas de " . $Cant_por_Pag . " registros cada una<br>";
		echo "Mostrando la pagina " . $pagina . " de " . $total_paginas . "<p>";
		$vSql = "SELECT * FROM ciudades"." limit " . $inicio . "," . $Cant_por_Pag;
		$vResultado = mysqli_query($link, $vSql);
		$total_registros=mysqli_num_rows($vResultado);

	?>
	<table border=1>
		<tr>
			<td><b>ID</b></td>
			<td><b>CIUDAD</b></td>
			<td><b>PAIS</b></td>
			<td><b>HABITANTES</b></td>
			<td><b>SUPERFICIE (m�)</b></td>
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
	<?php } ?>

		<tr><td colspan="6"><p align="center"><a href="Menu.html">Volver al men&uacute; del ABM</a></p></td></tr>
	</table>
	<?php
		// Liberar conjunto de resultados
		mysqli_free_result($vResultado);

		// Cerrar la conexion
		mysqli_close($link);
		if ($total_paginas > 1){
			for ($i=1;$i<=$total_paginas;$i++){
				if ($pagina == $i){
					//si muestro el �ndice de la p�gina actual, no coloco enlace
					echo $pagina . " ";
				} else{
					//si la p�gina no es la actual, coloco el enlace para ir a esa p�gina
					echo "<a href='Listado_pag.php?pagina=" . $i ."'>" . $i . "</a> ";
				}
			}
		}
	?>

</body>
</html>

