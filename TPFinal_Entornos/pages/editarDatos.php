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
<title>Editar Datos</title>
<link rel="stylesheet" href="../styles/css/bootstrap.css" crossorigin="anonymous">
<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
	<?php include("cabecera.php"); ?>
	
	<script>
		function validar(){
			dni = document.formTabla.dni.value
			nombre = document.formTabla.nombre.value
			apellido = document.formTabla.apellido.value
			email = document.formTabla.email.value
			clave = document.formTabla.clave.value
			cClave = document.formTabla.confirmarClave.value
			
			if (!isNaN(nombre)){
				alert("El Nombre no puede ser un número"); return false;
			} else if (!isNaN(apellido)){
				alert("El Apellido no puede ser un número"); return false;		
			} else if (isNaN(dni)){
				alert("El dni no es un número"); return false;
			} else if(/\w+([-+.']\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)/.test(email)){
				alert("El mail no posee el formato adecuado"); return false;
			} else if(clave != cClave){
				alert("Las claves son distintas"); return false;
			} else return true
		}
	</script>
	<div class="col-sm-4 col-md-4">

		<h2 class="page-header">Editar Datos</h2>

		<br>

		<form role="form" action="../code/usuario.php" method="post" id="formTabla" name="formTabla" onSubmit="return validar()">
			<table>
				<tr>
					<td><b>Código:</b></td>
					<td>
						<input type="text" readonly class="form-control" id="idUsuario" name="idUsuario" value="<?php echo $_SESSION['usuario']['Id']?>"  />
					</td>
				</tr>
				<tr>
					<td><b>Nombre de Usuario:</b></td>
					<td>
						<input type="text" class="form-control" id="nombreUsuario" name="nombreUsuario" readonly value="<?php echo $_SESSION['usuario']['Usuario']?>" />
					</td>
				</tr>
				<tr>
					<td><b>Nombre:</b></td>
					<td>
						<input type="text" class="form-control" id="nombre" name="nombre" required="required" value="<?php echo $_SESSION['usuario']['Nombre']?>" />
					</td>
				</tr>
				<tr>
					<td><b>Apellido:</b></td>
					<td>
						<input type="text" class="form-control" id="apellido" name="apellido" required="required" value="<?php echo $_SESSION['usuario']['Apellido']?>"  />
					</td>
				</tr>
				<tr>
					<td><b>DNI:</b></td>
					<td>
						<input type="text" class="form-control" id="dni" name="dni" required="required" value="<?php echo $_SESSION['usuario']['DNI'] ?>" />
					</td>
				</tr>
				<tr>
					<td><b>Email:</b></td>
					<td>
						<input type="text" class="form-control" id="email" name="email" required="required" value="<?php echo $_SESSION['usuario']['Email'] ?>" />
					</td>
				</tr>
				<tr>
					<td><b>Clave:</b></td>
					<td>
						<input type="password" class="form-control" id="clave" name="clave" required="required" />
					</td>
				</tr>
				<tr>
					<td><b>Confirmar Clave:</b></td>
					<td>
						<input type="password" class="form-control" id="confirmarClave" name="confirmarClave" required="required" />
					</td>
				</tr>
				<tr><td><br /></td></tr>
				<tr>
					<td colspan="2" align="center">
						<input class="btn btn-success" type="submit" value="Editar" id="event" name="event" /> 
						<input class="btn btn-default" type="submit" value="Cancelar" id="event" name="event" />
					</td>
				</tr>
			</table>
		</form>

	<?php include("pie.php"); ?>
</body>
</html>
<?php } else header("location:login.php"); ?>