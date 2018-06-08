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
<?php include("cabecera.php"); ?>

<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">

	<h2 class="page-header">Géneros</h2>

		<form role="form" action="srvGenero" method="post" id="formTabla" name="formTabla">
			<table>
				<tr>
					<td><b>Código:</b></td>
					<td>
						<div class="form-inline">
							<input type="text" class="form-control" id="idGenero" name="idGenero" readonly
								<?php if(isset($_COOKIE["idGenero"])) { ?> value="<?php echo $_COOKIE["idGenero"]; ?>" <?php } ?>
								size="43">
						</div>
					</td>
				</tr>
				<tr>
					<td><b>Nombre:</b></td>
					<td><input type="text" class="form-control" id="descGenero"
						name="descGenero"
						<?php if(isset($_COOKIE["descGenero"])) { ?> value="<?php echo $_COOKIE["descGenero"]; ?>" <?php } ?>></td>
				</tr>
				<tr>
					<td><b>Habilitado:</b></td>
					<td colspan="2">
						<input type="checkbox" class="checkbox" id="habilitado" name="habilitado" <?php if(isset($_COOKIE["eliminar"])) { ?> readonly="true" <?php }
							if(isset($_COOKIE["habilitado"])) { if($_COOKIE["habilitado"]) { ?> checked="checked" <?php } } ?> />
					</td>
				</tr>
				<tr>
					
					<td></td>
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
			if(isset($_COOKIE["idGenero"])) setcookie("idGenero", '', time()-3600, "/");
			if(isset($_COOKIE["descGenero"])) setcookie("descGenero", '', time()-3600, "/");
			if(isset($_COOKIE["habilitado"])) setcookie("habilitado", '', time()-3600, "/");
			if(isset($_COOKIE["modificar"])) setcookie("modificar", '', time()-3600, "/");
			if(isset($_COOKIE["eliminar"])) setcookie("eliminar", '', time()-3600, "/");
		?>
		<br> <br> <br>
</body>
</html>
<?php 
	} else header("Location: ../pages/login.php");
?>