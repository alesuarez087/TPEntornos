<html>
<head>
<title> Listados completo </title>
</head>
<body>
	<?php
		include("conexion.inc");
		$vSql = "SELECT * FROM noticias";
		$vResultado = mysqli_query($link, $vSql);
		$total_registros=mysqli_num_rows($vResultado);
		
		$Cant_por_Pag = 4;
		$pagina = isset ( $_GET['pagina']) ? $_GET['pagina'] : null ;
		if (!$pagina) {
			$inicio = 0;
			$pagina=1;
		}
		else {
			$inicio = ($pagina - 1) * $Cant_por_Pag;
		}// total de páginas
		include("conexion.inc");
		$vSql = "SELECT * FROM noticias";
		$vResultado = mysqli_query($link, $vSql);
		$total_registros=mysqli_num_rows($vResultado);
		$total_paginas = ceil($total_registros/ $Cant_por_Pag);
		mysqli_close($link); unset($vResultado);
		include("conexion.inc");
		$vSql = "SELECT * FROM noticias" . " limit " . $inicio . "," . $Cant_por_Pag;
	
		$vResultado = mysqli_query($link, $vSql);
		$total_registros=mysqli_num_rows($vResultado);
		if ($total_paginas > 1){
			for ($i=1;$i<=$total_paginas;$i++){
				if ($pagina == $i) echo $pagina . " "; //si muestro el índice de la página actual, no coloco enlace
				else echo "<tr><td colspan='5'><a href='listado.php?pagina=" . $i ."'>" . $i . "</a></td></tr>"; //si la página no es la actual, coloco el enlace para ir a esa página
			}
		}
	?>
		<table border=1>
			<tr>
				<td><b>Titulo</b></td>
				<td><b>Texto</b></td>
				<td><b>Categoria</b></td>
				<td><b>Fecha</b></td>
			</tr>
	<?php
		while ($fila = mysqli_fetch_array($vResultado)){
	?>
			<tr>
				<td><?php echo $fila['titulo'] ?></td>
				<td><?php echo ($fila['texto']); ?></td>
				<td><?php echo ($fila['categoria']); ?></td>
				<td><?php echo ($fila['fecha']); ?></td>
			</tr>
	<?php
		}
		// Liberar conjunto de resultados
		mysqli_free_result($vResultado);
		// Cerrar la conexion
		mysqli_close($link);
	?>			
				
<?php
	?> 

			<tr>
				<td colspan="5">
					<p align="center"><a href="index.html">Volver al men&uacute; del ABM</a></p>
				</td>
			</tr>
		</table>
</body>
</html>