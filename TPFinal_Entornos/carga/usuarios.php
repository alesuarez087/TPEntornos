<?php 
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
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Usuarios</title>
<link rel="stylesheet" href="../styles/css/bootstrap.css" crossorigin="anonymous">
<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
		<script>
		function validar(){
			dni = document.form.dni.value
			nombre = document.form.nombre.value
			apellido = document.form.apellido.value
			email = document.form.email.value
			clave = document.form.clave.value
			cClave = document.form.confirmarClave.value
			indiceTipo = document.form.cmbTipo.selectedIndex
			
			if (!isNaN(nombre)){
				alert("El Nombre no puede ser un n�mero"); return false;
			} else if (!isNaN(apellido)){
				alert("El Apellido no puede ser un n�mero"); return false;		
			} else if (isNaN(dni)){
				alert("El dni no es un n�mero"); return false;
			} else if(!(/\w+([-+.']\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)/.test(email))){
				alert("El mail no posee el formato adecuado"); return false;
			} else if(indiceTipo == null || indiceTipo == 0) {
				alert("Seleccione un Tipo de Usuario"); return false;
			} else if(clave != cClave){
				alert("Las claves son distintas"); return false;
			} else return true
		}
		
		function busqueda(){
			buscar = document.form.busqueda.value
			if(buscar == null){
				alert("Ingrese nombre a buscar"); return false;
			} else return true;
		}
	</script>

	
	<?php include("cabecera.php"); ?>
	<div class="col-sm-5 col-md-5">

		<h2 class="page-header">Usuarios</h2><br />

		<form role="form" action="usuario.php" method="post" id="form" name="form" onSubmit="return validar()">
			<div class="form-group">
				<b>C�digo:</b>
				<input type="text" class="form-control" id="idUsuario" name="idUsuario" <?php if(isset($_COOKIE["idUsuario"])) { ?> value="<?php echo $_COOKIE["idUsuario"]; ?>" <?php } ?> readonly="true">
			</div>
			<div class="form-group">
				<b>Nombre de Usuario:</b>
				<input type="text" class="form-control" required="required" id="nombreUsuario" name="nombreUsuario"
<?php if(isset($_COOKIE["eliminar"])||isset($_COOKIE["modificar"])) { ?> readonly="true" <?php } if(isset($_COOKIE["nombreUsuario"])) { ?> value="<?php echo $_COOKIE["nombreUsuario"]; ?>" <?php } ?> />
			</div>
			<div class="form-group">
				<b>Nombre:</b>
				<input type="text" class="form-control" required="required" id="nombre" name="nombre" <?php if(isset($_COOKIE["eliminar"])) { ?> readonly="true" <?php } if(isset($_COOKIE["nombre"])) { ?> value="<?php echo $_COOKIE["nombre"]; ?>" <?php } ?> />
			</div>
			<div class="form-group">
				<b>Apellido:</b>
				<input type="text" class="form-control" required="required" id="apellido" name="apellido" <?php if(isset($_COOKIE["eliminar"])) { ?> readonly="true" <?php } if(isset($_COOKIE["apellido"])) { ?> value="<?php echo $_COOKIE["apellido"]; ?>" <?php } ?> />
			</div>
			<div class="form-group">
				<b>DNI:</b>
				<input type="text" class="form-control" required="required" id="dni" name="dni" <?php if(isset($_COOKIE["eliminar"])) { ?> readonly="true" <?php } if(isset($_COOKIE["dni"])) { ?> value="<?php echo $_COOKIE["dni"]; ?>" <?php } ?> />
			</div>
			<div class="form-group">
				<b>Email:</b>
				<input type="text" class="form-control" required="required" id="email" name="email" <?php if(isset($_COOKIE["eliminar"])) { ?> readonly="true" <?php } if(isset($_COOKIE["email"])) { ?> value="<?php echo $_COOKIE["email"]; ?>" <?php } ?> />
			</div>
			<div class="form-group">
				<b>Clave:</b>
				<input type="password" class="form-control" required="required" id="clave" name="clave" <?php if(isset($_COOKIE["eliminar"])) { ?> readonly="true" <?php } ?> />
			</div>
			<div class="form-group">
				<b>Confirmar Clave:</b>
				<input type="password" class="form-control" required="required" id="confirmarClave" name="confirmarClave" <?php if(isset($_COOKIE["eliminar"])) { ?> readonly="true" <?php } ?> />
			</div>
			<div class="form-group">
				<b>Tipo de Usuario:</b>
				<select class="form-control" id="cmbTipo" name="cmbTipo" required="required" <?php if(isset($_COOKIE["eliminar"])) { ?> readonly="true" <?php } ?>>
					<option value="0">Seleccione un Tipo</option>
					<?php  
						include("conexion.inc"); 
						$vSql = 'CALL TiposUsuarioGetAll'; 
						$vResultado = mysqli_query($link, $vSql) or die (error()); 
						while($tipo = mysqli_fetch_array($vResultado)){?>
					<option <?php if(isset($_COOKIE["cmbTipo"])) { if($_COOKIE["cmbTipo"]==$tipo['id_tipo_usuario']) { ?> selected="selected" <?php } } ?> value="<?php echo $tipo['id_tipo_usuario']; ?>">
					<?php echo $tipo['desc_tipo_usuario']; ?>
					</option>
					<?php } ?>
				</select>
			</div>
			<div class="form-group">
				<b>Habilitado:</b>
				<input type="checkbox" class="checkbox" id="habilitado"  name="habilitado" <?php if(isset($_COOKIE["eliminar"])) { ?> readonly="true" <?php } if(isset($_COOKIE["habilitado"])) { if($_COOKIE["habilitado"]) { ?> checked="checked" <?php } } ?> />
			</div><br />
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
			if(isset($_COOKIE['idUsuario'])) setcookie("idUsuario", '', time()-3600, "/");
			if(isset($_COOKIE['apellido'])) setcookie("apellido", '', time()-3600, "/");
			if(isset($_COOKIE['nombre'])) setcookie("nombre", '', time()-3600, "/");
			if(isset($_COOKIE['dni'])) setcookie("dni", '', time()-3600, "/");
			if(isset($_COOKIE['email'])) setcookie("email", '', time()-3600, "/");
			if(isset($_COOKIE['nombreUsuario'])) setcookie("nombreUsuario", '', time()-3600, "/");
			if(isset($_COOKIE['habilitado'])) setcookie("habilitado", '', time()-3600, "/");
			if(isset($_COOKIE['cmbTipo'])) setcookie("cmbTipo", '', time()-3600, "/");
			if(isset($_COOKIE['eliminar'])) setcookie("eliminar", '', time()-3600, "/");
			if(isset($_COOKIE['modificar'])) setcookie("modificar", '', time()-3600, "/");
		?>
		
		<br> <br> <br>
	
		<form role="form" action="usuario.php" method="post" id="busqueda" name="busqueda" onClick="return busqueda()">
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
			setcookie("busqueda", '', time()-3600, "/");
			$vSql = "CALL UsuariosBusqueda('$vBuscar')"; 
			include("conexion.inc");
			$vResultado = mysqli_query($link, $vSql) or die("Falla la busqueda");
			
			$total_registros=mysqli_num_rows($vResultado);
			$total_paginas = ceil($total_registros/ $Cant_por_Pag);
			unset($link, $vResultado);
		
			include("conexion.inc");
			$vSql = "CALL UsuariosGetAllLimitBusqueda('$inicio', '$Cant_por_Pag', '$vBuscar')";
			$vResultado = mysqli_query($link, $vSql) or die(mysqli_error());
		} else {
			$vSql = "CALL UsuariosGetAll";
			$vResultado = mysqli_query($link, $vSql) or die("Falla la busqueda");
			
			$total_registros=mysqli_num_rows($vResultado);
			$total_paginas = ceil($total_registros/ $Cant_por_Pag);
			unset($link, $vResultado);
		
			include("conexion.inc");
			$vSql = "CALL UsuariosGetAllLimit('$inicio', '$Cant_por_Pag')";
			$vResultado = mysqli_query($link, $vSql) or die(mysqli_error());
		}
	?>
	<table class="table table-hover">
		<thead>
			<th>C�digo</th>
			<th>Usuario</th>
			<th>Apellido</th>
			<th>Nombre</th>
			<th>DNI</th>
			<th>Email</th>
			<th>Tipo Usuario</th>
			<th>Habilitado</th>
			<th></th>
			<th></th>
		</thead>

		<?php
			while ($fila = mysqli_fetch_array($vResultado))
			{
		?>
		<tr>
			<td><?php echo $fila['id_usuario']; ?></td>
			<td><?php echo $fila['nombre_usuario']; ?></td>
			<td><?php echo $fila['apellido']; ?></td>
			<td><?php echo $fila['nombre']; ?></td>
			<td><?php echo $fila['dni']; ?></td>
			<td><?php echo $fila['email']; ?></td>
			<td><?php echo $fila['desc_tipo_usuario']; ?></td>
			<td style="vertical-olign: middle">
				<input type="checkbox" readonly="true" disabled="disabled" <?php if($fila['habilitado']==1){ ?> checked="checked" <?php } ?> />
			</td>
			<td></td>
			<form role="form" action="usuario.php" method="post" id="botonera" name="botonera">
				<td style="vertical-align: middle">
					<input type="hidden" name="idSelect" id="idSelect" value="<?php echo $fila['id_usuario']; ?>" /> 
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
					echo "<a href='usuarios.php?pagina=" . $i ."'>" . $i . "</a> ";
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
?>