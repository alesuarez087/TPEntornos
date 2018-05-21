<?php 
	session_start(); 
	$tipoUsuario = NULL;
	$vNRO = NULL;
	if(isset($_SESSION['usuario'])){
		$fila = $_SESSION['usuario'];
		$tipoUsuario = $fila['TipoUsuario'];
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
<title>Item</title>
<link rel="stylesheet" href="../styles/css/bootstrap.css" crossorigin="anonymous">
<meta name="viewport" content="width=device-width, initial-scale=1">
</head>	
<body>
	<script>
		function validar(){
			anio = document.form.anioLanzamiento.value
			precio = document.form.precioItem.value
			stock = document.form.stock.value
			indiceArtista = document.form.cmbArtista.selectedIndex
			indiceGenero = document.form.cmbGenero.selectedIndex
			indiceTipoDisco = document.form.cmbTipoDisco.selectedIndex
					
			if (isNaN(anio)){
				alert("El año no es un número"); return false;
			} else if (isNaN(stock)){
				alert("El stock no es un número"); return false;
			} else if(isNaN(precio)){
				alert("El precio no es un número"); return false;
			} else if(indiceArtista == null || indiceArtista == 0) {
				alert("Seleccione un Artista"); return false;
			} else if(indiceGenero == null || indiceGenero == 0) {
				alert("Seleccione un Genero"); return false;
			} else if(indiceTipoDisco == null || indiceTipoDisco == 0) {
				alert("Seleccione un Tipo de Item"); return false;
			} else return true
		}
		
		function busqueda(){
			buscar = document.form.busqueda.value
			if(buscar == null){
				alert("Ingrese nombre a buscar"); return false;
			} else return true;
		}
	</script>
	<?php 
		function error(){
			echo "<script type=\"text/javascript\">location.href='../pages/error.html';</script>";
		}	
		include_once("cabecera.php");
	?>

	

	<div class="col-sm-9 col-sm-offset-3 col-md-12 col-md-offset-2 main">
		<?php if(isset($_COOKIE["modificar"])) { ?> <h2 class="page-header">Modificar Item</h2> <?php }
			  else if(isset($_COOKIE["eliminar"])) { ?> <h2 class="page-header">Eliminar Item</h2> <?php }
			  else { ?> <h2 class="page-header">Nuevo Item</h2> <?php } ?>	
		<br>
		
		<form role="form" action="../code/itemGUARDAR.php" method="post" id="form" name="form" onSubmit="return validar()">
			<table>
				<tr>
					<td><b>Código:</b></td>
					
					<td>
						<input type="text" class="form-control" id="idItem" name="idItem" size="43" <?php if(isset($_COOKIE["id_item"])) { ?> value="<?php echo $_COOKIE["id_item"]; ?>" <?php } ?> readonly="true"/>
					</td>
				</tr>
				<tr>
					<td><b>Título:</b></td>
					<td>
						<input type="text" class="form-control" id="tituloItem" name="tituloItem" size="55" required="required" <?php if(isset($_COOKIE["eliminar"])) { ?> readonly="true" <?php }
							if(isset($_COOKIE["titulo"])) { ?> value="<?php echo $_COOKIE["titulo"]; ?>" <?php } ?> />
					</td>
				</tr>
				<tr>
					<td><b>Autor:</b></td>
					<td><select class="form-control" id="cmbArtista" name="cmbArtista"   required="required" <?php if(isset($_COOKIE["eliminar"])) { ?> readonly="true" <?php } ?> >
							<option>Seleccion Artista</option>
							<?php include("../code/conexion.inc"); $vSql = 'CALL ArtistasGetAllHabilitado'; $vResultado = mysqli_query($link, $vSql) or die (error()); while($artista = mysqli_fetch_array($vResultado)){?>
							<option <?php if(isset($_COOKIE["id_artista"])) { if($_COOKIE["id_artista"]==$artista['id_artista']) { ?> selected="selected" <?php } } ?> value="<?php echo $artista['id_artista']; ?>">
								<?php echo $artista['nombre_artista']; ?>
							</option>
							<?php } ?>
					</select></td>
				</tr>
				<tr>
					<td><b>Género:</b></td>
					<td><select class="form-control" id="cmbGenero" name="cmbGenero"  required="required" <?php if(isset($_COOKIE["eliminar"])) { ?> readonly="true" <?php } ?> >
							<option>Seleccione Género</option>
							<?php include("../code/conexion.inc"); $vSql = 'CALL GenerosGetAllHabilitado'; $vResultado = mysqli_query($link, $vSql) or die (error()); while($genero = mysqli_fetch_array($vResultado)){?>
							<option <?php if(isset($_COOKIE["id_genero"])) { if($_COOKIE["id_genero"]==$genero['id_genero']) { ?> selected="selected" <?php } } ?> value="<?php echo $genero['id_genero']; ?>">
								<?php echo $genero['desc_genero']; ?>
							</option>
							<?php } ?>
					</select></td>
				</tr>
				<tr>
					<td><b>Tipo de Disco:</b></td>
					<td><select class="form-control" id="cmbTipoDisco" name="cmbTipoDisco"  required="required" <?php if(isset($_COOKIE["eliminar"])) { ?> readonly="true" <?php } ?> >
							<option>Seleccione Tipo de Disco</option>
							<?php include("../code/conexion.inc"); $vSql = 'CALL TiposItemGetAllHabilitados'; $vResultado = mysqli_query($link, $vSql) or die (error()); while($tipos = mysqli_fetch_array($vResultado)){?>
							<option <?php if(isset($_COOKIE["id_tipo_item"])) { if($_COOKIE["id_tipo_item"]==$tipos['id_tipo_item']) { ?> selected="selected" <?php } } ?> value="<?php echo $tipos['id_tipo_item']; ?>">
								<?php echo $tipos['desc_tipo_item']; ?>
							</option>
							<?php } ?>
					</select></td>
				</tr>
				<tr>
					<td><b>Año Lanzamiento: </b></td>
					<td>
						<input type="text" class="form-control" id="anioLanzamiento" name="anioLanzamiento" required="required" <?php if(isset($_COOKIE["eliminar"])) { ?>  readonly="true" <?php }
							if(isset($_COOKIE["anio"])) { ?> value="<?php echo $_COOKIE["anio"]; ?>" <?php } ?> />
					</td>
				</tr>
				<tr>
					<td><b>Precio:</b></td>
					<td>
						<input type="text" class="form-control" id="precioItem" name="precioItem" required="required" <?php if(isset($_COOKIE["eliminar"])) { ?> readonly="true" <?php }
							if(isset($_COOKIE["precio"])) { ?> value="<?php echo $_COOKIE["precio"]; ?>" <?php } ?> />
					</td>
				</tr>
				<tr>
					<td><b>Stock:</b></td>
					<td>
						<input type="text" class="form-control" id="stock" name="stock" required="required" <?php if(isset($_COOKIE["eliminar"])) { ?> readonly="true" <?php } 
							if(isset($_COOKIE["stock"])) { ?> value="<?php echo $_COOKIE["stock"]; ?>" <?php } ?> />
					</td>
				</tr>
				<tr>
					<td><b>URL Portada:</b></td>
					<td>
						<input type="text" class="form-control" id="urlPortada" name="urlPortada" required="required" <?php if(isset($_COOKIE["eliminar"])) { ?> readonly="true" <?php }
							if(isset($_COOKIE["url"])) { ?> value="<?php echo $_COOKIE["url"]; ?>" <?php } ?> />
					</td>
				</tr>
				<tr>
					<td><b>Habilitado:</b></td>
					<td>
						<input type="checkbox" class="checkbox" id="habilitado" name="habilitado" <?php if(isset($_COOKIE["eliminar"])) { ?> readonly="true" <?php }
							if(isset($_COOKIE["habilitado"])) { if($_COOKIE["habilitado"]) { ?> checked="checked" <?php } } ?> />
					</td>
				</tr>
				<tr><td> <br /> </td></tr>
			<tr>
				<td colspan="2" align="center">
					<?php if(isset($_COOKIE["modificar"])) { ?> <input class="btn btn-success" type="submit" value="Modificar" id="event" name="event" /> <?php }
					else if(isset($_COOKIE["eliminar"])) { ?> 	<input class="btn btn-danger" type="submit" value="Eliminar" id="event" name="event" /> <?php }
					else { ?> 								  	<input class="btn btn-success" type="submit" value="Guardar" id="event" name="event" /> <?php } ?>
															  	<input class="btn btn-default" type="submit" value="Cancelar" id="event" name="event" />
				</td>
			</tr>
			</table>
		</form>
		
		<?php 
			#elimnar las cookies
			setcookie("id_item", '', time()-3600, "/");
			setcookie("titulo", '', time()-3600, "/");
			setcookie("anio", '', time()-3600, "/");
			setcookie("stock", '', time()-3600, "/");
			setcookie("habilitado", '', time()-3600, "/");
			setcookie("id_artista", '', time()-3600, "/");
			setcookie("id_genero", '', time()-3600, "/");
			setcookie("id_tipo_item", '', time()-3600, "/");
			setcookie("url", '', time()-3600, "/");
			setcookie("precio", '', time()-3600, "/");
			setcookie("modificar", '', time()-3600, "/");
			setcookie("eliminar", '', time()-3600, "/");
		?>
		
		<br> <br> <br>

		<form role="form" action="../code/itemONE.php" method="post" id="busqueda" name="busqueda" onClick="return busqueda()">
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
		
		<br />			
 
		<?php
		include("../code/conexion.inc");
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
			$vSql = "CALL ItemsBusqueda('$vBuscar')"; 
			include("../code/conexion.inc");
			$vResultado = mysqli_query($link, $vSql) or die("Falla la busqueda");
			
			$total_registros=mysqli_num_rows($vResultado);
			$total_paginas = ceil($total_registros/ $Cant_por_Pag);
			unset($link, $vResultado);
		
			include("../code/conexion.inc");
			$vSql = "CALL ItemsGetAllLimitBusqueda('$inicio', '$Cant_por_Pag', '$vBuscar')";
			$vResultado = mysqli_query($link, $vSql) or die(mysqli_error());
		} else {
			$vSql = "CALL ItemsGetAll";
			$vResultado = mysqli_query($link, $vSql) or die("Falla la busqueda");
			
			$total_registros=mysqli_num_rows($vResultado);
			$total_paginas = ceil($total_registros/ $Cant_por_Pag);
			unset($link, $vResultado);
		
			include("../code/conexion.inc");
			$vSql = "CALL ItemsGetAllLimit('$inicio', '$Cant_por_Pag')";
			$vResultado = mysqli_query($link, $vSql) or die(mysqli_error());
		}
#		else $vSql = "select * from items";
		
		
#		$total_registros=mysqli_num_rows($vResultado);
	?>
	<table class="table table-hover">
		<thead>
			<th>Código</th>
			<th>Título</th>
			<th>Autor</th>
			<th>Año Lanzamiento</th>
			<th>Género</th>
			<th>Precio</th>
			<th>Stock</th>
			<th>Habilitado</th>
			<th></th>
			<th></th>
		</thead>

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
					echo "<a href='item.php?pagina=" . $i ."'>" . $i . "</a> ";
				}
			}
		}
	?>
		</td>
	</tr>
	</table>

	</div>
</body>
</html>

<?php 
	} else header("Location: ../pages/login.php");
?>