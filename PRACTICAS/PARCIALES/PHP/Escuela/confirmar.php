<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Confirmar</title>
</head>
<body>
	<?php
		$vDni = $_POST['dni'];
		$vApeNom = $_POST['nombreApellido'];
		$vMateria = $_POST['materia'];
		$vAnio = $_POST['anioIngreso'];
		$vId = $_POST['idProfesor'];
		
		include("conexion.inc");
		$vSQL = "update profesores set dni='$vDni', nombre_apellido='$vApeNom', materia='$vMateria', anio_ingreso='$vAnio' where id_profesor = '$vId'";
		mysqli_query($link, $vSQL) or die("Error al ejecutar la consulta");
		echo("Modificació realizada con éxito <br />");
		echo("<a href=index.html>Volver al Menú</a>");
		mysqli_close($link);
	?>
</body>
</html>
