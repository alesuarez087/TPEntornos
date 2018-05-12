<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title> Listados completo con PAGINACIÓN </title>
</head>

<body>

	<?php
		include("conexion1.inc");
		$Cant_por_Pag = 10;
		$pagina = isset ( $_GET['pagina']) ? $_GET['pagina'] : null ;

		if (!$pagina) {
			$inicio = 0;
			$pagina=1;
		}
		else {
			$inicio = ($pagina - 1) * $Cant_por_Pag;
		}// total de páginas
		$vSql = "SELECT * FROM items";
		$vResultado = mysqli_query($link, $vSql);
		$total_registros=mysqli_num_rows($vResultado);
		$total_paginas = ceil($total_registros/ $Cant_por_Pag);
		
		$vSql = "CALL ItemsGetAllLimit('$inicio', '$Cant_por_Pag')";
		$vResultado = mysqli_query($link, $vSql);
		$total_registros=mysqli_num_rows($vResultado);

	?>
	<table border=1>
		<tr>
			<th>Código</th>
					<th>Título</th>
					<th>Autor</th>
					<th>Año Lanzamiento</th>
					<th>Género</th>
					<th>Precio</th>
					<th>Stock</th>
					<th>Habilitado</th>
					<th></th>
		</tr>

		<?php
			while ($fila = mysqli_fetch_array($vResultado))
			{
		?>
		<tr>
			<td><?php echo $fila['id_item']; ?></td>
					<td><?php echo $fila['titulo']; ?></td>
					<td><?php echo $fila['nombre_artista']; ?></td>
					<td><?php echo $fila['anio_lanzamiento']; ?></td>
					<td><?php echo $fila['desc_genero']; ?></td>
					<td><?php echo $fila['monto']; ?></td>
					<td><?php echo $fila['stock']; ?></td>
					<td style="vertical-olign: middle">
						<input type="checkbox" readonly disabled <?php if($fila['habilitado']){ ?>  checked <?php } ?> > 
					</td>
					<td></td>
					<form role="form" action="../code/itemONE.php" method="post" id="botonera" name="botonera">
						<td style="vertical-align: middle">
							<input type="hidden" name="idSelect" id="idSelect" value="<?php echo $fila['id_item']; ?>" /> 
							<input class="btn btn-success btn-sm" type="submit" value="Modificar" id="event" name="event" /> 
							<input class="btn btn-danger btn-sm" type="submit" <?php if(!$fila['habilitado']){ ?>  disabled="disabled" <?php } ?> value="Eliminar" id="event" name="event" />
						</td>
					</form>
		</tr>
	<?php } ?>
		<tr>
			<td colspan="9" style="text-align:center">
				<?php echo "Pagina ". $pagina . " de " . $total_paginas ; ?>
			</td>
		</tr>
		<tr>
			<td colspan="9" style="text-align:center">
	<?php
		// Liberar conjunto de resultados
		mysqli_free_result($vResultado);

		// Cerrar la conexion
		mysqli_close($link);
		if ($total_paginas > 1){
			for ($i=1;$i<=$total_paginas;$i++){
				if ($pagina == $i){
					//si muestro el índice de la página actual, no coloco enlace
					echo $pagina . " ";
				} else{
					//si la página no es la actual, coloco el enlace para ir a esa página
					echo "<a href='Listado_pag.php?pagina=" . $i ."'>" . $i . "</a> ";
				}
			}
		}
	?>
		</td>
	</tr>
	</table>
</body>
</html>

