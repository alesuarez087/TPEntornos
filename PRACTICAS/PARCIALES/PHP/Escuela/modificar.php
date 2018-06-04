<?php
	$vDni = $_POST['dni'];
	
	include("conexion.inc");
	$vSQL = "select * from profesores where dni = '$vDni'";
	$vResultado = mysqli_query($link, $vSQL) or die ("Error al ejecutar la consulta");
	$fila = mysqli_fetch_row($vResultado);
	mysqli_close($link);
	unset($vResultado);
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Modificar</title>
</head>
<body>
	<table>
		<form action="confirmar.php" method="post">
			<tr>
				<td>DNI: </td>
				<td><input name="dni" value="<?php echo $fila[1]; ?>" /><td>
			<tr>
			<tr>
				<td>Nombre y Apellido: </td>
				<td><input name="nombreApellido" value="<?php echo $fila[2]; ?>" /><td>
			<tr>
			<tr>
				<td>Materia: </td>
				<td><input name="materia" value="<?php echo $fila[3]; ?>" /><td>
			<tr>
			<tr>
				<td>Año de Ingreso: </td>
				<td><input name="anioIngreso" value="<?php echo $fila[4]; ?>" /><td>
			<tr>
			<tr>
				<td colspan="2">
					<input type="hidden" value="<?php echo $fila[0]; ?>" name="idProfesor" />
					<input name="btnModificar" type="submit" />
				</td>
			</tr>
		</form>
	</table>
</body>
</html>
