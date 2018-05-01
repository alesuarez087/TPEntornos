<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
<title>Disco</title>
<link href="../styles/css/bootstrap.min.css" rel="stylesheet">
<link href="../styles/css/dashboard.css" rel="stylesheet">
<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>

	<nav class="navbar navbar-inverse navbar-fixed-top">
	<div class="container-fluid">
		<div class="navbar-header">
			<a class="navbar-brand">Luzbelito</a>
		</div>
		<div>
			<ul class="nav navbar-nav">
				<li><a href="home.php">Discos</a></li>
				<li class="active"><a href="adminInicio">Editar</a></li>
			</ul>
			<ul class="nav navbar-nav navbar-right">
				<li><a href="valid.jsp">Cerrar Sesión</a></li>			<!-- REVISAR -->
			</ul>
		</div>
	</div>
	</nav>

	<div class="container-fluid">
		<div class="row">
			<div class="col-sm-3 col-md-2 sidebar">
				<ul class="nav nav-sidebar">
<!--					<% if(user.getTipoUsuario() == Usuario.TiposUsuario.Administrador){ %>					REVISAR-->
					<li><a href="adminArtista.jsp">Artistas</a></li>
					<li><a href="adminGenero.jsp">Géneros</a></li>
					<li class="active"><a href="adminItem.jsp">Discos<span
							class="sr-only">(current)</span></a></li>
					<li><a href="adminUsuario.jsp">Usuarios</a></li>
<!--					<% } %>																		  REVISAR	-->
					<li><a href="adminStockPrecio.jsp">Remarcar</a></li>
			</div>
		</div>
	</div>

	<div class="col-sm-9 col-sm-offset-3 col-md-12 col-md-offset-2 main">

		<h2 class="page-header">Discos</h2>
		<br>
		<form role="form" action="../code/itemALTA.php" method="post" id="formTabla" name="formTabla">
			<table>
<!--			<% if(request.getSession().getAttribute("message")!=null){ %>									ESTE ERROR HAY QUE SACARLO DE OTRA MANERA Y PROBAR HACIENDO UN  MODAL
			<tr>
				<td>
					<font color="#FF0000"> <%=request.getSession().getAttribute("message") %></font>
				</td>
			</tr>
			<%
				request.getSession().setAttribute("message", null);}
			%> 																											-->
				<tr>
					<td><b>Código:</b></td>
					
					<td><input type="text" readonly class="form-control" id="idItem" name="idItem" size="43" /></td>
				</tr>
				<tr>
					<td><b>Título:</b></td>
					<td>
						<input type="text" class="form-control" id="tituloItem" name="tituloItem" size="55"  required="required" />
					</td>
				</tr>
				<tr>
					<td><b>Autor:</b></td>
					<td><select class="form-control" id="cmbArtista" name="cmbArtista"  required="required">
							<option>Seleccion Artista</option>
							<?php include("../code/conexion.inc"); $vSql = 'CALL ArtistasGetAllHabilitado'; $vResultado = mysqli_query($link, $vSql); while($artista = mysqli_fetch_array($vResultado)){?>
							<option value="<?php echo $artista['id_artista']; ?>">
								<?php echo $artista['nombre_artista']; ?>
							</option>
							<?php } ?>
					</select></td>
				</tr>
				<tr>
					<td><b>Género:</b></td>
					<td><select class="form-control" id="cmbGenero" name="cmbGenero"  required="required">
							<option>Seleccione Género</option>
							<?php include("../code/conexion.inc"); $vSql = 'CALL GenerosGetAllHabilitado'; $vResultado = mysqli_query($link, $vSql); while($genero = mysqli_fetch_array($vResultado)){?>
							<option value="<?php echo $genero['id_genero']; ?>">
								<?php echo $genero['desc_genero']; ?>
							</option>
							<?php } ?>
					</select></td>
				</tr>
				<tr>
					<td><b>Tipo de Disco:</b></td>
					<td><select class="form-control" id="cmbTipoDisco" name="cmbTipoDisco"  required="required">
							<option>Seleccione Tipo de Disco</option>
							<?php include("../code/conexion.inc"); $vSql = 'CALL TiposItemGetAllHabilitados'; $vResultado = mysqli_query($link, $vSql); while($tipos = mysqli_fetch_array($vResultado)){?>
							<option value="<?php echo $tipos['id_tipo_item']; ?>">
								<?php echo $tipos['desc_tipo_item']; ?>
							</option>
							<?php } ?>
					</select></td>
				</tr>
				<tr>
					<td><b>Año Lanzamiento: </b></td>
					<td><input type="text" class="form-control" id="anioLanzamiento" name="anioLanzamiento" required="required" /></td>
				</tr>
				<tr>
					<td><b>Precio:</b></td>
					<td><input type="text" class="form-control" id="precioItem" name="precioItem" required="required" /></td>
				</tr>
				<tr>
					<td><b>Stock:</b></td>
					<td><input type="text" class="form-control" id="stock" name="stock" required="required" /></td>
				</tr>
				<tr>
					<td><b>URL Portada:</b></td>
					<td><input type="text" class="form-control" id="urlPortada" name="urlPortada" required="required" /></td>
				</tr>
				<tr>
					<td><b>Habilitado:</b></td>
					<td>
						<input type="checkbox" class="checkbox" id="habilitado" name="habilitado" />
					</td>
				</tr>
				<tr><td> <br /> </td></tr>
			<tr>
				<td colspan="2" align="center">
					<input class="btn btn-success" type="submit" value="Guardar" id="event" name="event" />
					<input class="btn btn-default" type="submit" value="Cancelar" id="event" name="event" />
				</td>
			</tr>
			</table>
		</form>

		<br> <br> <br>


		<?php
			include("../code/conexion.inc");
			$vSql = 'CALL ItemsGetAll';
			$vResultado = mysqli_query($link, $vSql);
		?>
		<table class="table table-hover" style="background-color: #ffffff">
			<thead>
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
			</thead>
			<tbody>
				<?php 
        			while ($fila = mysqli_fetch_array($vResultado)){
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
					<form role="form" action="../code/itemModificar.php" method="post" id="botonera" name="botonera">
						<td style="vertical-align: middle">
							<input type="hidden" name="idSelect" id="idSelect" value="<?php echo $fila['id_item']; ?>" /> 
							<input class="btn btn-success btn-sm" type="submit" value="Modificar" id="event" name="event" /> 
							<input class="btn btn-danger btn-sm" type="submit" value="Eliminar" id="event" name="event" />
						</td>
					</form>
				</tr>
				<?php 	} ?>
			</tbody>
		</table>
		<?php
			function cookie(){
				setcookie('id_item', idSelect, 60);
				header("location:../pages/item.php");
			}
		?>

	</div>
</body>
</html>