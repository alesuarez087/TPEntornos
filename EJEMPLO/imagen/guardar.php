<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Documento sin título</title>
</head>
	<?php
		include("conexion.php");
		$nombre = $_POST["nombre"];
		$imagen = addslashes(file_get_contents($_FILES['imagen']['tmp_name']));
		
		$query = "insert into imagen(nombre, imagen) values('$nombre', '$imagen')";
		$resultado = $conexion->query($query);
		
		if($resultado){
			echo "insertado";}
			else{ echo "error";}
	?>
<body>
</body>
</html>