<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Borrar Carro</title>
</head>
<body>

<?php
	//con session_start() creamos la sesi�n si no existe o la retomamos si ya ha sido creada
	session_start();
	extract($_GET);
	//Asignamos a la variable $carro los valores guardados en la sessi�n
	$carro=$_SESSION['carro'];
	//la funci�n unset borra el elemento de un array que le pasemos por par�metro. En este caso la usamos para borrar el elemento cuyo id le pasemos a la p�gina por la url
	unset($carro[md5($id)]);
	//Finalmente, actualizamos la sessi�n, como hicimos cuando agregamos un producto y volvemos al cat�logo
	$_SESSION['carro']=$carro;
	header("Location:catalogo.php?".SID);
?>
</body>
</html>
