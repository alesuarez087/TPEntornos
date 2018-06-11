<?php 
	session_start(); 
	$tipoUsuario = NULL;
	$vNRO = NULL;
	if(isset($_SESSION['usuario'])){
		$fila = $_SESSION['usuario'];
		$nombreUsuario = $fila['Usuario'];
		$tipoUsuario = $fila['TipoUsuario'];
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Generos</title>
<link rel="stylesheet" href="../styles/css/bootstrap.css" crossorigin="anonymous">
<meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<body>
	<script>
		function busqueda(){
			buscar = document.form.busqueda.value
			if(buscar == null){
				alert("Ingrese nombre a buscar"); return false;
			} else return true;
		}
	</script>
	<?php include("cabecera.php"); ?>

	<div class="col-sm-5 col-md-5">

	<h2 class="page-header">G&eacute;neros</h2>

		<form role="form" action="generoGUARDAR.php" method="post" id="formTabla" name="formTabla">
			<div class="form-group">
				<b>Código:</b>
				<input type="text" class="form-control" id="idGenero" name="idGenero" readonly="true" <?php if(isset($_COOKIE["idGenero"])) { ?> value="<?php echo $_COOKIE["idGenero"]; ?>" <?php } ?> />
			</div>
			<div class="form-group">
				<b>Nombre:</b>
				<input type="text" class="form-control" id="descGenero" name="descGenero" <?php if(isset($_COOKIE["descGenero"])) { ?> value="<?php echo $_COOKIE["descGenero"]; ?>" <?php } if(isset($_COOKIE["eliminar"])) { ?> readonly="true" <?php } ?> />
			</div>
			<div class="form-group">
				<b>Habilitado:</b>
				<input type="checkbox" class="checkbox" id="habilitado" name="habilitado" <?php if(isset($_COOKIE["eliminar"])) { ?> readonly="true" <?php } if(isset($_COOKIE["habilitado"])) { if($_COOKIE["habilitado"]) { ?> checked="checked" <?php } } ?> />
			</div>
			<br />
			<div class="form-group" align="center">
				<?php if(isset($_COOKIE["modificar"])) { ?> 
					<input class="btn btn-success" type="submit" value="Modificar" id="event" name="event" /> 
				<?php } else if(isset($_COOKIE["eliminar"])) { ?> 	
					<input class="btn btn-danger" type="submit" value="Eliminar" id="event" name="event" /> 
				<?php } else { ?>
					<input class="btn btn-success" type="submit" value="Guardar" id="event" name="event" /> 
				<?php } ?>
				  	<input class="btn btn-default" type="submit" value="Cancelar" id="event" name="event" />
			</div>
		</form>
		<?php 
			#elimnar las cookies
			if(isset($_COOKIE["idGenero"])) setcookie("idGenero", '', time()-3600, "/");
			if(isset($_COOKIE["descGenero"])) setcookie("descGenero", '', time()-3600, "/");
			if(isset($_COOKIE["habilitado"])) setcookie("habilitado", '', time()-3600, "/");
			if(isset($_COOKIE["modificar"])) setcookie("modificar", '', time()-3600, "/");
			if(isset($_COOKIE["eliminar"])) setcookie("eliminar", '', time()-3600, "/");
		?>
		<br> <br> <br>
		<form role="form" action="generoONE.php" method="post" id="busqueda" name="busqueda" onClick="return busqueda()">
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
		}// total de páginas
		if(isset($_COOKIE['busqueda'])) { 
			unset($link);
			$vBuscar = $_COOKIE['busqueda'];
			setcookie("busqueda", '', time()-3600, "/");
			$vSql = "CALL GenerosBusqueda('$vBuscar')"; 
			include("conexion.inc");
			$vResultado = mysqli_query($link, $vSql) or die("Falla la busqueda");
			
			$total_registros=mysqli_num_rows($vResultado);
			$total_paginas = ceil($total_registros/ $Cant_por_Pag);
			unset($link, $vResultado);
		
			include("conexion.inc");
			$vSql = "CALL GenerosGetAllLimitBusqueda('$inicio', '$Cant_por_Pag', '$vBuscar')";
			$vResultado = mysqli_query($link, $vSql) or die(mysqli_error());
		} else {
			$vSql = "CALL GenerosGetAll";
			$vResultado = mysqli_query($link, $vSql) or die("Falla la busqueda");
			
			$total_registros=mysqli_num_rows($vResultado);
			$total_paginas = ceil($total_registros/ $Cant_por_Pag);
			unset($link, $vResultado);
		
			include("conexion.inc");
			$vSql = "CALL GenerosGetAllLimit('$inicio', '$Cant_por_Pag')";
			$vResultado = mysqli_query($link, $vSql) or die(mysqli_error());
		}
	?>
	<table class="table table-hover">
		<thead>
			<th>Código</th>
			<th>Descripción</th>
			<th>Habilitado</th>
			<th></th>
			<th></th>
		</thead>

		<?php
			while ($fila = mysqli_fetch_array($vResultado))
			{
		?>
		<tr>
			<td><?php echo $fila['id_genero']; ?></td>
			<td><?php echo $fila['desc_genero']; ?></td>
			<td style="vertical-olign: middle">
				<input type="checkbox" readonly disabled <?php if($fila['habilitado']){ ?>  checked <?php } ?> > 
			</td>
			<td></td>
			<form role="form" action="generoONE.php" method="post" id="botonera" name="botonera">
				<td style="vertical-align: middle">
					<input type="hidden" name="idSelect" id="idSelect" value="<?php echo $fila['id_genero']; ?>" /> 
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
					//si muestro el índice de la página actual, no coloco enlace
					echo $pagina . " ";
				} else{
					//si la página no es la actual, coloco el enlace para ir a esa página
					echo "<a href='generos.php?pagina=" . $i ."'>" . $i . "</a> ";
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
	} else header("Location:login.php");
?>