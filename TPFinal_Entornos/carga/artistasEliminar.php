﻿<?php 
	if(isset($_COOKIE['idArtista'])){ 
		$vID = $_COOKIE['idArtista'];
		setcookie("idArtista", "", time()-3600, "/");
		session_start(); 
		$tipoUsuario = NULL;
		$vNRO = NULL;
		if(isset($_SESSION['usuario'])){
			$fila = $_SESSION['usuario'];
			$nombreUsuario = $fila['Usuario'];
			$tipoUsuario = $fila['TipoUsuario'];
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Eliminar Artista</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css"  type="text/css" />
<meta name="viewport" content="width=device-width, initial-scale=1" />
</head>

<body>
<?php include("cabecera.php"); ?>

<div class="col-sm-5 col-md-5">

	<h2 class="page-header">Eliminar Artista</h2>
		<?php
			include("conexion.inc");
			$vSql = "CALL ArtistasGetOne('$vID')"; //Arma la instrucci�n SQL y luego la ejecuta
			$vResultado = mysqli_query($link, $vSql) or die (mysqli_error());
			$fila = mysqli_fetch_row($vResultado);

		?>
		<form action="artistaGUARDAR.php" method="post" id="formTabla" name="formTabla">
			<div class="form-group">
				<b>Id artista:(*)</b>
				<input type="text" class="form-control" id="idArtista" name="idArtista" value="<?php echo $fila[0]; ?>" readonly="readonly" />
			</div>
			<div class="form-group">
				<b>Nombre:(*)</b>
				<input type="text" class="form-control" id="nombreArtista" name="nombreArtista" value="<?php echo $fila[1] ?>" readonly="readonly" />
			</div>
			<div class="form-group">
				<b>Habilitado:(*)</b>
				<input type="checkbox" class="checkbox" id="habilitado" name="habilitado" checked="checked" readonly="readonly" />
			</div>
			<br />
			<div class="form-group" align="center">
				<input class="btn btn-danger" type="submit" value="Eliminar" id="event" name="event" /> 
			  	<a class="btn btn-secondary" href="artistas.php">Cancelar</a>
			</div>
		</form>

		<br /> <br /> <br />

		<form  action="artistaONE.php" method="post" id="busqueda" name="busqueda" onclick="return busqueda()">
			<table>
				<tr>
					<td><b>Buscar</b></td>
					<td>&nbsp;</td>
					<td>
						<input type="text" class="form-control" id="buscar" name="buscar" placeholder = "Buscar" />
					</td>
					<td>&nbsp;</td>
					<td>
						<input class="btn btn-success btn-sm" type="submit" value="Buscar" id="event" name="event" />
					</td>
					<td>&nbsp;</td>
					<td>
						<input class="btn btn-default btn-sm" type="submit" value="Reiniciar" id="event" name="event" <?php if(!isset($_COOKIE['busqueda'])){ ?>disabled="disabled"<?php }?> />
					</td>
				</tr>
			</table>
		</form>
		</div>
		<br />	
	<?php
		include("conexion.inc");
		$Cant_por_Pag = 10;
		$pagina = isset ( $_GET['pagina']) ? $_GET['pagina'] : null ;

		if (!$pagina) {
			$inicio = 0;
			$pagina=1;
		}
		else {
			$inicio = ($pagina - 1) * $Cant_por_Pag;
		}// total de p�ginas
		if(isset($_COOKIE['busqueda'])) { 
			unset($link);
			$vBuscar = $_COOKIE['busqueda'];
			setcookie('busqueda','', time()-3600, "/");
			$vSql = "CALL ArtistasBusqueda('$vBuscar')"; 
			
			include("conexion.inc");
			$vResultado = mysqli_query($link, $vSql) or die("Falla la busqueda");
			
			$total_registros=mysqli_num_rows($vResultado);
			$total_paginas = ceil($total_registros/ $Cant_por_Pag);
			unset($link, $vResultado);
		
			include("conexion.inc");
			$vSql = "CALL ArtistasGetAllLimitBusqueda('$inicio', '$Cant_por_Pag', '$vBuscar')";
			$vResultado = mysqli_query($link, $vSql) or die(mysqli_error());
		} else {
			$vSql = "CALL ArtistasGetAll";
			$vResultado = mysqli_query($link, $vSql) or die("Falla la busqueda");
			
			$total_registros=mysqli_num_rows($vResultado);
			$total_paginas = ceil($total_registros/ $Cant_por_Pag);
			unset($link, $vResultado);
		
			include("conexion.inc");
			$vSql = "CALL ArtistasGetAllLimit('$inicio', '$Cant_por_Pag')";
			$vResultado = mysqli_query($link, $vSql) or die(mysqli_error($link));
		}
	?>
	<table class="table table-hover">
		<tr>
			<th>Id</th>
			<th>Nombre</th>
			<th>Habilitado</th>
			<th></th>
			<th></th>
		</tr>

		<?php
			while ($fila = mysqli_fetch_array($vResultado))
			{
		?>
		<tr>
			<td><?php echo $fila['id_artista']; ?></td>
			<td><?php echo $fila['nombre_artista']; ?></td>
			<td style="vertical-olign: middle">
				<input type="checkbox" readonly="readonly" disabled="disabled" <?php if($fila['habilitado']){ ?>  checked <?php } ?> > 
			</td>
			<td></td>
			<form action="artistaONE.php" method="post" id="botonera" name="botonera">
				<td style="vertical-align: middle">
					<input type="hidden" name="idSelect" id="idSelect" value="<?php echo $fila['id_artista']; ?>" /> 
					<input class="btn btn-success btn-sm" type="submit" value="Modificar" id="event" name="event" /> 
					<input class="btn btn-danger btn-sm" type="submit" <?php if(!$fila['habilitado']){ ?>  disabled="disabled" <?php } ?> value="Eliminar" id="event" name="event" />
				</td>
			</form>
		</tr>
	<?php } ?>
		<tr>
			<td colspan="10" style="text-align:center">
				<?php echo "Pagina ". $pagina . " de " . $total_paginas ; ?>
			</td>
		</tr>
		<tr>
			<td colspan="10" style="text-align:center">
	<?php
		// Liberar conjunto de resultados
		mysqli_free_result($vResultado);
		unset($vSql);
		// Cerrar la conexion
		mysqli_close($link);
		if ($total_paginas > 1){
			for ($i=1;$i<=$total_paginas;$i++){
				if ($pagina == $i){
					//si muestro el �ndice de la p�gina actual, no coloco enlace
					echo $pagina . " ";
				} else{
					//si la p�gina no es la actual, coloco el enlace para ir a esa p�gina
					echo "<a href='artistasEliminar.php?pagina=" . $i ."'>" . $i . "</a> ";
				}
			}
		}
	?>
		</td>
	</tr>
	</table>
	
	<?php include("pie.php"); ?>
</body>
</html>
<?php 

		} else header("Location: login.php");
	} else header("location:artistas.php");
?>