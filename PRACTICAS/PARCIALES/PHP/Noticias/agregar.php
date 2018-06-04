<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Documento sin t&iacute;tulo</title>
</head>

<body>
<?php
	include("conexion.inc");
	//Captura datos desde el Form anterior
	$vTitulo = $_POST['titulo'];
	$vTexto = $_POST['texto'];
	$vCategoria = $_POST['categoria'];
	
	$vSql = "insert into noticias(titulo, texto, categoria, fecha) values ('$vTitulo', '$vTexto', '$vCategoria', CURDATE())";
	mysqli_query($link, $vSql) or die ("error al ejecutar la sentencia sql");
	// Cerrar la conexion
	mysqli_close($link);
	
	echo("Noticia registrada correctamente<br>");
	echo ("<A href='index.html'>VOLVER AL MENU</A>");
?>
</body>
</html>
